<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\FormFilter\Product\ProductRequestFilter;
use App\Http\Services\CategoryService;
use App\Http\Services\ProductService;
use App\Models\ProductModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;
    protected $categoryService;

    public function __construct(ProductService $productService, CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $products = $this->productService->getAll();
        return view('admin.product.productindex', [
            'title' => 'Danh sách sản phẩm',
            'products' => $products
        ]);
    }
    public function create()
    {
        return view('admin.product.addproduct', [
            'title' => 'Thêm sản phẩm mới',
            'categories' => $this->categoryService->getParent(),
            'tags' => $this->productService->getAllTags()
        ]);
    }

    public function store(ProductRequestFilter $request)
    {
        $result = $this->productService->store($request);

        if ($result) {
            if ($request->input('afterSubmit') === 'continue') {
                return redirect()->route('admin.product.add')->with('success', 'Sản phẩm được tạo thành công. Bạn có thể thêm một sản phẩm khác.');
            } else {
                return redirect()->route('admin.product.index')->with('success', 'Sản phẩm được tạo thành công.');
            }
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to create product.');
        }
    }

    public function edit($id)
    {
        $product = $this->productService->find($id);
        return view('admin.product.editproduct', [
            'product' => $product,
            'categories' => $this->categoryService->getParent()
        ]);
    }

    public function update(Request $request, $id)
    {
        $result = $this->productService->update($request, $id);

        if ($result) {
            return redirect()->route('admin.product.index')->with('success', 'Sản phẩm được cập nhật thành công.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to update product.');
        }
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->productService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công sản phẩm'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }

    public function getProductThumbnails($productId)
    {
        $product = ProductModel::find($productId);
        if ($product) {
            return response()->json([
                'error' => false,
                'data' => [
                    'thumbnails' => json_decode($product->thumbnails)
                ]
            ]);
        }

        return response()->json(['error' => true]);
    }
}
