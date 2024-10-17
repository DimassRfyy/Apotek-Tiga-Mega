<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UploadRecipeRequest;
use App\Models\category;
use App\Models\product;
use App\Models\productTransaction;
use App\Models\RecipeTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index() {
        $categories = category::oldest()->take(3)->get();
        $latest_products = product::latest()->take(7)->get();
        $random_products = product::inRandomOrder()->take(7)->get();
        return view('front.index',compact('categories','latest_products','random_products'));
    }
    
    public function search_product (Request $request) {
        
        $query = $request->input('query');

        $products = Product::where('name', 'like', "%{$query}%")->get();
        
        return view('front.search', ['products' => $products]);
    }
    public function transactions() {
        return view('front.transactions');
    }

    public function recipe() {
        return view('front.recipe');
    }
    public function recipe_upload() {
        return view('front.recipe_upload');
    }
    
    public function recipe_store(UploadRecipeRequest $request) {
        $transaction = DB::transaction(function () use ($request) {
           
            $validatedData = $request->validated();
            
            if ($request->hasFile('photo_recipe')) {
                $photo_recipePath = $request->file('photo_recipe')->store('photo_recipes', 'public'); 
                $validatedData['photo_recipe'] = $photo_recipePath;
            }
    
            
            return RecipeTransaction::create([
                'name' => $validatedData['name'],
                'photo_recipe' => $validatedData['photo_recipe'],
                'trx_id' => RecipeTransaction::generateUniqueTrxId(),
                'phone_number' => $validatedData['phone_number'],
                'address' => $validatedData['address'],
                'note' => $validatedData['note'] ?? null, // Jika note kosong, maka set null
                'is_paid' => false,
                'is_confirm' => false,
                'proof' => null,
                'total_amount' => null,
            ]);
        });

        return redirect()->route('front.success.upload_recipe', ['transaction' => $transaction->id]);
    }

    public function success_upload_recipe(RecipeTransaction $transaction) {
        return view('front.success_upload_recipe', compact('transaction'));
    }

    public function checkout_recipe(Request $request, $id) {
       
        $validated = $request->validate([
            'proof' => 'required|file|mimes:jpg,jpeg,png',
        ]);
    
        if ($request->hasFile('proof')) {
            $proofPath = $request->file('proof')->store('proofs', 'public'); 
        }
    
        // Cari transaksi berdasarkan id
        $transaction = RecipeTransaction::findOrFail($id);
    
        $transaction->update([
            'proof' => $proofPath,
            'is_paid' => false,
        ]);
    
        return redirect()->route('front.success.checkout_recipe', ['transaction' => $transaction->id]);
    }

    public function success_checkout_recipe (RecipeTransaction $transaction) {
        return view('front.success_checkout_recipe', compact('transaction'));
    }
    
    
    public function all_categories () {
        $categories = category::all();
        return view('front.all_categories',compact('categories'));
    }

    public function category (category $category) {
        $products = Product::where('category_id', $category->id)->get();
        return view('front.medicine', compact('products','category'));
    }

    public function details(product $product) {
        return view('front.product', compact('product'));
    }

    public function checkout (product $product) {
        return view('front.checkout', compact('product'));
    }

    public function checkout_store(StoreTransactionRequest $request, Product $product)
{
    // Gunakan DB::transaction untuk memastikan bahwa semua operasi berhasil dilakukan atau di-rollback jika ada yang gagal
    $transaction = DB::transaction(function () use ($request, $product) {
        
        $validatedData = $request->validated(); // Menggunakan data yang sudah divalidasi

        // Jika ada file yang diunggah, simpan file tersebut dan dapatkan path-nya
        if ($request->hasFile('proof')) {
            $proofPath = $request->file('proof')->store('proofs', 'public'); // Simpan di folder storage/app/public/proofs
            $validatedData['proof'] = $proofPath;
        }

        // Hitung totalAmount
        $totalAmount = $product->price * $validatedData['quantity'];

        // Buat dan simpan transaksi produk di tabel ProductTransaction
        return ProductTransaction::create([
            'name' => $validatedData['name'],
            'trx_id' => productTransaction::generateUniqueTrxId(),
            'phone_number' => $validatedData['phone_number'],
            'quantity' => $validatedData['quantity'],
            'address' => $validatedData['address'],
            'proof' => $validatedData['proof'], // Path dari file yang diunggah
            'note' => $validatedData['note'] ?? null, // Jika note kosong, maka set null
            'is_paid' => false,
            'product_id' => $product->id,
            'total_amount' => $totalAmount,
        ]);
    });

    // Redirect ke front.success.booking dengan meneruskan transaction->id
    return redirect()->route('front.success.booking', ['transaction' => $transaction->id]);
}

public function success_booking(ProductTransaction $transaction)
{
    return view('front.success_booking', compact('transaction'));
}

public function transactions_details(Request $request){
    $request->validate([
        'trx_id' => ['required', 'string', 'max:255'],
        'phone_number' => ['required', 'string', 'max:255'],
    ]);

    $trx_id = $request->input('trx_id');
    $phone_number = $request->input('phone_number');

    // Check if transaction exists in productTransaction
    $productDetails = productTransaction::where('trx_id', $trx_id)->where('phone_number', $phone_number)->first();

    if ($productDetails) {
        $quantity = $productDetails->quantity;
        $subTotal = $productDetails->product->price * $quantity;
        return view('front.transactions_details', compact('productDetails', 'subTotal'));
    }

    // Check if transaction exists in RecipeTransaction
    $recipeDetails = RecipeTransaction::where('trx_id', $trx_id)->where('phone_number', $phone_number)->first();

    if ($recipeDetails) {
        $subTotal = $recipeDetails->total_amount;
        return view('front.recipe_details', compact('recipeDetails','subTotal'));
    }

    // If no transaction is found
    return redirect()->back()->withErrors(['error' => 'transaction not found']);
}


}
