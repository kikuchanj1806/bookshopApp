<?php

namespace App\Http\Services;

use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Faker\Factory as Faker;


class ProductService extends AppService
{
    public function getAll()
    {
        $products = ProductModel::paginate(10);
        return $products;
    }
    public function store(Request $request)
    {
        $faker = Faker::create();
        $data = $request->only([
            'name',
            'typeId',
            'code',
            'price',
            'oldPrice',
            'quantity',
            'status',
            'categoryId',
            'brand',
            'weight',
            'width',
            'length',
            'height',
            'thumbnail',
            'image',
            'unit',
            'description',
            'content',
            'video',
            'showNew',
            'showHot',
            'showHome',
            'promotionContent',
            'promotionValue']);

        $data['typeId'] = $faker->numberBetween(1, 10);
        if ($request->input('image')) {
            $data['image'] = $request->input('image');
        }
        try {
            ProductModel::create($data);
            Session::flash('success', 'Tạo sản phẩm thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }

    public function find($id)
    {
        return ProductModel::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'typeId' => 'required|integer',
            'code' => 'required|string|unique:products,code,' . $id,
            'price' => 'required|numeric',
            'oldPrice' => 'nullable|numeric',
            'quantity' => 'required|integer',
            'status' => 'required|boolean',
            'categoryId' => 'required|integer',
            'brand' => 'nullable|string',
            'weight' => 'nullable|numeric',
            'dimensions' => 'nullable|string',
            'thumbnail' => 'nullable|string',
            'image' => 'nullable|string',
            'unit' => 'required|string',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'video' => 'nullable|string',
            'showNew' => 'boolean',
            'showHot' => 'boolean',
            'showHome' => 'boolean',
            'promotionContent' => 'nullable|string',
            'promotionValue' => 'nullable|numeric',
        ]);

        $product = ProductModel::findOrFail($id);
        $product->update($data);
    }

    public function delete($id)
    {
        $product = ProductModel::findOrFail($id);
        $product->delete();
    }
}
