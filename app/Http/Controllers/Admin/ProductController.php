<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\CategoryService;
use App\Http\Services\ProductService;
use App\Models\ProductModel;
use Faker\Factory as Faker;
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
//        $faker = Faker::create();
//
//        $data = [
//            'typeId' => $faker->numberBetween(1, 10),
//            'code' => $faker->unique()->bothify('PRD###'),
//            'price' => $faker->randomFloat(2, 100, 1000),
//            'oldPrice' => $faker->randomFloat(2, 100, 1000),
//            'quantity' => $faker->numberBetween(1, 100),
//            'status' => $faker->boolean,
//            'categoryId' => $faker->numberBetween(1, 10),
//            'brand' => $faker->word,
//            'weight' => $faker->randomFloat(2, 1, 100),
//            'width' => $faker->randomFloat(2, 1, 100),
//            'length' => $faker->randomFloat(2, 1, 100),
//            'height' => $faker->randomFloat(2, 1, 100),
//            'thumbnail' => $faker->imageUrl(200, 200, 'product'),
//            'image' => $faker->imageUrl(400, 400, 'product'),
//            'unit' => $faker->randomElement(['kg', 'pcs']),
//            'description' => $faker->paragraph,
//            'content' => $faker->text,
//            'video' => $faker->url,
//            'showNew' => $faker->boolean,
//            'showHot' => $faker->boolean,
//            'showHome' => $faker->boolean,
//            'promotionContent' => $faker->sentence,
//            'promotionValue' => $faker->randomFloat(2, 1, 50),
//        ];
//        ProductModel::create($data);
        return view('admin.product.addproduct', [
            'title' => 'Thêm sản phẩm mới',
            'categories' => $this->categoryService->getParent()
        ]);
    }

    public function store(Request $request)
    {
        $this->productService->store($request);
//        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        $product = $this->productService->find($id);
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $this->productService->update($request, $id);
        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $this->productService->delete($id);
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}
