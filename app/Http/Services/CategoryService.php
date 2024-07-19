<?php

namespace App\Http\Services;

use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryService extends AppService
{
    public function getParent()
    {
        return ProductCategory::where('parent_id', 0)->get();
    }

    public function show()
    {
        return ProductCategory::select('name', 'id')
            ->where('parent_id', 0)
            ->orderbyDesc('id')
            ->get();
    }

    public function getAll()
    {
        $categories = ProductCategory::all();
        $nestedCategories = $this->buildTree($categories);
        return $this->paginate($nestedCategories, 5);
    }

    public function create(Request $request)
    {
        try {
            $data = $request->only(['name', 'code', 'status', 'order', 'description']);
            $data['status'] = (int)$request->input('status'); // Chuyển đổi sang số nguyên
            // Kiểm tra và gán giá trị cho parent_id
            if ($request->has('parent_id') && !$request->input('parent_id') == null) {
                $data['parent_id'] = $request->input('parent_id');
            } else {
                $data['parent_id'] = 0; // Đặt mặc định là 0 nếu không có giá trị
            }

            if ($request->input('image')) {
                $data['image'] = $request->input('image');
            }

            if ($request->input('icon')) {
                $data['icon'] = $request->input('icon');
            }

            ProductCategory::create($data);

            Session::flash('success', 'Tạo danh mục thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }

    public function update(Request $request, ProductCategory $category): bool
    {
        try {
            $data = $request->only(['name', 'code', 'status', 'order', 'description']);
            $data['status'] = (int)$request->input('status'); // Chuyển đổi sang số nguyên
            // Kiểm tra và gán giá trị cho parent_id
            if ($request->has('parent_id') && !$request->input('parent_id') == null) {
                $data['parent_id'] = $request->input('parent_id');
            } else {
                $data['parent_id'] = 0; // Đặt mặc định là 0 nếu không có giá trị
            }

            if ($request->input('image')) {
                $data['image'] = $request->input('image');
            }

            if ($request->input('icon')) {
                $data['icon'] = $request->input('icon');
            }
            $category->update($data);

            Session::flash('success', 'Cập nhật thành công Danh mục');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }

    public function destroy(Request $request)
    {
        try {
            $id = (int)$request->input('id');
            $category = ProductCategory::findOrFail($id);
            $category->delete();

            // Xóa các danh mục con
            ProductCategory::where('parent_id', $id)->delete();

            Session::flash('success', 'Xóa Danh Mục Thành Công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }

    public function getId($id)
    {
        return ProductCategory::where('id', $id)->where('status', 1)->firstOrFail();
    }

    public function getProduct($category, Request $request)
    {
        $query = $category->products()
            ->select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', 1);

        if ($request->input('price')) {
            $query->orderBy('price', $request->input('price'));
        }

        return $query
            ->orderByDesc('id')
            ->paginate(12)
            ->withQueryString();
    }
}
