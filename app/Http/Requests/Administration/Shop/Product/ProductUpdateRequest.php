<?php

namespace App\Http\Requests\Administration\Shop\Product;

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
     * Get the validation rules that apply to the request for creating a product.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'quantity' => ['required', 'integer', 'min:1'],
            'purchase_price' => ['required', 'numeric', 'min:0'],
            'price' => ['required', 'numeric', 'min:0'],
            'colors' => ['nullable', 'array'],
            'sizes' => ['nullable', 'array'],
            'description' => ['required', 'string'],
            'status' => ['required', 'in:Active,Inactive'],

            'images' => ['nullable', 'array'],
            'images.*' => ['image', 'mimes:jpeg,png,gif', 'max:2048'], // Max size: 2MB
        ];
    }

    /**
     * Get the error messages for the defined validation rules for creating a product.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'quantity.min' => 'The Quantity must be at least 1.',
            'purchase_price.min' => 'The Purchase Price must be at least 0.',
            'price.min' => 'The Price must be at least 0.',
            'colors.array' => 'The colors must be in valid array format if provided.',
            'sizes.array' => 'The sizes must be in valid array format if provided.',
            'status.in' => 'The Status should be either Active or Inactive.',
            
            'images.array' => 'Invalid data provided for images.',
            'images.*.image' => 'The uploaded file must be an image.',
            'images.*.mimes' => 'Only JPEG, PNG, and GIF image formats are allowed.',
            'images.*.max' => 'Each image should not exceed 2MB in size.',
        ];
    }
}
