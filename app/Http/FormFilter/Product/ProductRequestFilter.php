<?php

namespace App\Http\FormFilter\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequestFilter extends FormRequest
{
    public function authorize()
    {
        return true; // Thay đổi thành true để cho phép tất cả người dùng gửi request
    }

    public function rules()
    {
        return [
            'name' => 'required|string|unique:products,name',
            'typeId' => 'integer',
            'code' => 'required|string|unique:products,code',
            'price' => 'required|numeric',
            'oldPrice' => 'nullable|numeric',
            'quantity' => 'required|integer',
            'status' => 'required|integer',
            'categoryId' => 'required|integer',
            'brand' => 'nullable|string',
            'weight' => 'nullable|numeric',
            'width' => 'nullable|numeric',
            'length' => 'nullable|numeric',
            'height' => 'nullable|numeric',
            'thumbnail' => 'nullable|string',
            'image' => 'nullable|string',
            'unit' => 'string',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'video' => 'nullable|string',
            'showNew' => 'boolean',
            'showHot' => 'boolean',
            'showHome' => 'boolean',
            'promotionContent' => 'nullable|string',
            'promotionValue' => 'nullable|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Trường tên là bắt buộc.',
            'name.unique' => 'Tên này đã tồn tại.',
            'code.required' => 'Trường mã là bắt buộc.',
            'code.unique' => 'Mã này đã tồn tại.',
        ];
    }
}
