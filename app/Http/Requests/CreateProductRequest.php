<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:products,name',
            'price' => 'required|numeric|min:0.01',
            'quantity' => 'required|integer|min:1',
            'description' => 'nullable',
            'categories' => 'required|array|min:1', // Categories field is required and should have at least one item
            'categories.*' => Rule::exists('categories', 'id'), // Each category should exist in the categories table
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'name.unique' => 'The name has already been taken.',
            'price.required' => 'The price field is required.',
            'price.numeric' => 'The price must be a valid number.',
            'price.min' => 'The price must be at least 0.01.',
            'quantity.required' => 'The quantity field is required.',
            'quantity.integer' => 'The quantity must be a valid integer.',
            'quantity.min' => 'The quantity must be at least 1.',
        ];
    }
}
