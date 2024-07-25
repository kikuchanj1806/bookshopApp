<?php

namespace App\Http\Services;

use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\FormFilter\Product\ProductRequestFilter;
use Faker\Factory as Faker;


class ProductService extends AppService
{
    public function getAll()
    {
        $products = ProductModel::paginate(10);
        return $products;
    }

    public function store(ProductRequestFilter $request)
    {
        $data = $request->validated();
        if ($request->input('image')) {
            $data['image'] = $request->input('image');
        }

        $data['showHome'] = $request->has('showHome');
        $data['showNew'] = $request->has('showNew');
        $data['showHot'] = $request->has('showHot');

        try {
            ProductModel::create($data);
            Session::flash('success', 'Tạo sản phẩm thành công');
            return true;
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
    }

    public function find($id)
    {
        return ProductModel::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        if ($request->filled('image')) {
            $data['image'] = $request->input('image');
        }

        $data['showHome'] = $request->boolean('showHome');
        $data['showNew'] = $request->boolean('showNew');
        $data['showHot'] = $request->boolean('showHot');

        try {
            $product = ProductModel::findOrFail($id);
            $product->update($data);
            Session::flash('success', 'Cập nhật sản phẩm thành công');
            return true;
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
    }
    public function destroy(Request $request)
    {
        try {
            $id = (int)$request->input('id');
            $product = ProductModel::findOrFail($id);
            $product->delete();
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }
}
