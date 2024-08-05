<?php

namespace App\Http\FormFilter\Order;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequestFilter extends FormRequest
{
    public function authorize()
    {
        return true; // Cho phép tất cả người dùng gửi request
    }

    public function rules()
    {
        return [
            'customer_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'cityId' => 'nullable|integer',
            'districtId' => 'nullable|integer',
            'wardId' => 'nullable|integer',
            'products' => 'required|array',
            'gift_code' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'customer_name.required' => 'Vui lòng nhập tên khách hàng.',
            'customer_name.string' => 'Tên khách hàng phải là chuỗi ký tự.',
            'customer_name.max' => 'Tên khách hàng không được vượt quá 255 ký tự.',
            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'phone.string' => 'Số điện thoại phải là chuỗi ký tự.',
            'phone.max' => 'Số điện thoại không được vượt quá 20 ký tự.',
            'address.required' => 'Vui lòng nhập địa chỉ.',
            'address.string' => 'Địa chỉ phải là chuỗi ký tự.',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự.',
            'products.required' => 'Vui lòng thêm ít nhất một sản phẩm.',
            'products.array' => 'Danh sách sản phẩm không hợp lệ.'
        ];
    }
}
