<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'images' => 'sometimes',
            'name' => 'required|max:255',
            'category_id' => 'required',
            'qty' => 'required',
            'sku' => 'required',
            'regular_price' => 'required|numeric',
            'discount_price' => 'required|numeric|lt:regular_price',
            'short_description' => 'required|max:350',
            'long_description' => 'sometimes'
        ];
    }

    public function messages() : array {
        return [
            'category_id.required' => 'The Category field is required.',
            'sku.required' => 'The Stock keeping unit (SKU) field is required.',
            'discount_price.lt' => 'The discount price must be less than the regular price.'
        ];
    }
}
