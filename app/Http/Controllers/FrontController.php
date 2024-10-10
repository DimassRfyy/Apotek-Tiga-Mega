<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Models\category;
use App\Models\product;
use App\Models\productTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index() {
        $categories = category::all();
        $latest_products = product::latest()->take(7)->get();
        $random_products = product::inRandomOrder()->take(7)->get();
        return view('front.index',compact('categories','latest_products','random_products'));
    }

    public function transactions() {
        return view('front.transactions');
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
        // Validasi data (karena menggunakan StoreTransactionRequest, validasi sudah dilakukan di sini)
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
        'trx_id' => ['required','string','max:255'],
        'phone_number' => ['required','string','max:255'],
    ]);

    $trx_id = $request->input('trx_id');
        $phone_number = $request->input('phone_number');
        $details = productTransaction::where('trx_id', $trx_id)->where('phone_number', $phone_number)->first();
        if (!$details) {
            return redirect()->back()->withErrors(['error' => 'transaction not found']);
        }

        $quantity = $details->quantity;
        $subTotal = $details->product->price * $quantity;

        return view('front.transactions_details', compact('details','subTotal'));
}

}
