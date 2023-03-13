<?php

namespace App\Http\Requests\Novel;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'judul' => 'required|string|min:3|max:250',
            'penulis' => 'required|string|min:3|max:250',
            'sinopsis' => 'required|string|min:3|max:6000',
            'gambar' => 'nullable|image|max:1024|mimes:jpg,jpeg,png',
        ];
    }
}
