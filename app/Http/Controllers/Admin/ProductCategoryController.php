<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\FormFilter\Category\CategoryInputFilter;
use App\Http\Services\CategoryService;
use App\Models\MediaUpload;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ProductCategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function create()
    {
        return view('admin.category.addcategory', [
            'title' => 'Thêm danh mục mới',
            'categories' => $this->categoryService->getParent()
        ]);
    }

    public function store(CategoryInputFilter $request)
    {
        $this->categoryService->create($request);

        return redirect()->back();
    }

    public function index()
    {
        return view('admin.category.categoryindex', [
            'title' => 'Danh sách danh mục',
            'categories' => $this->categoryService->getAll()
        ]);
    }

    public function show(ProductCategory $category)
    {
        return view('admin.category.editcategory', [
            'title' => 'Chỉnh Sửa Danh Mục: ' . $category->name,
            'cate' => $category,
            'categories' => $this->categoryService->getParent()
        ]);
    }

    public function update(ProductCategory $category, CategoryInputFilter $request)
    {
        $this->categoryService->update($request, $category);

        return redirect('/admin/category/index');
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->categoryService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công danh mục'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }
}
