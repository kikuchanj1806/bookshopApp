<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use App\Http\Services\UploadService;

class UploadController extends Controller
{
    protected $upload;

    public function __construct(UploadService $upload)
    {
        $this->upload = $upload;
    }

    public function store(Request $request)
    {
        $type = $request->input('type');
        switch ($type) {
            case 2:
                $arrThumb = $this->upload->storeMultiUpload($request);
                if ($arrThumb !== false) {
                    // Tìm sản phẩm và cập nhật thông tin ảnh vào cột thumbnails
                    $productId = $request->input('product_id');
                    $product = ProductModel::find($productId);
                    if ($product) {
                        $product->thumbnails = json_encode($arrThumb);
                        $product->save();
                    }
                    $url = $arrThumb;
                }
                break;
            default:
                $url = $this->upload->storeSignUpload($request);
                break;
        }

        if ($url !== false) {
            return response()->json([
                'error' => false,
                'data' => $url,
            ]);
        }



        return response()->json(['error' => true]);
    }
}
