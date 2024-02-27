<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
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
            'name' => ['required','string','max:250'],
            'nameAr' => ['required','string','max:250'],
            'quantityPerPacket' => 'required|integer|min:1|max:1000',
            'description' => ['nullable','string'],
            'descriptionAr' => ['nullable','string'],
            'size' => 'required','string','max:50',
            'bestSelling' => 'required|string',
            'category' => 'required|string'

        ];
    }
}
