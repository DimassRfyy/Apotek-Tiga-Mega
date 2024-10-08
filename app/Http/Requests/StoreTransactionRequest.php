<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255', // Wajib diisi, berupa string, maksimal 255 karakter
            'phone_number' => 'required|numeric|digits_between:10,15', // Wajib diisi, berupa angka, panjang 10-15 digit
            'quantity' => 'required|integer|min:1', // Wajib diisi, berupa angka bulat, minimal 1
            'address' => 'required|string|max:500', // Wajib diisi, berupa string, maksimal 500 karakter
            'proof' => 'required|file|mimes:jpg,jpeg,png', // Wajib diisi, berupa file, format jpg/jpeg/png/pdf, maksimal 2MB
            'note' => 'nullable|string|max:1000', // Boleh kosong, berupa string, maksimal 1000 karakter
        ];
    }
}
