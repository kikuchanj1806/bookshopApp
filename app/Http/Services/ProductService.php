<?php

namespace App\Http\Services;

use App\Helpers\AppFormat;
use App\Models\ProductModel;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\FormFilter\Product\ProductRequestFilter;


class ProductService extends AppService
{
    public function getAll($filters = [])
    {
        $query = ProductModel::query();

        // Áp dụng bộ lọc theo tên hoặc mã sản phẩm
        if (isset($filters['code']) && $filters['code']) {
            $query->where(function($q) use ($filters) {
                $q->where('name', 'LIKE', "%{$filters['code']}%")
                    ->orWhere('code', 'LIKE', "%{$filters['code']}%");
            });
        }

        return $query->paginate(10);
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
        $data['slug'] = AppFormat::slugifyText($data['name']);

        try {
            $product = ProductModel::create($data);
            $product->tags()->sync($request->input('tags', []));
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
        $data['slug'] = AppFormat::slugifyText($data['name']);

        try {
            $product = ProductModel::findOrFail($id);
            $product->update($data);
            $product->tags()->sync($request->input('tags', []));
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

    /**
     * Lấy danh sách tất cả các tags.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllTags()
    {
        return Tag::all();
    }
}
