<?php
namespace App\Http\Services;

use App\Models\BannerModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WebsiteService extends AppService
{

    public function getAllBanner()
    {
        $banners = BannerModel::paginate(10);
        return $banners;
    }

    public function findBanner($id)
    {
        return BannerModel::findOrFail($id);
    }

    public function storeBanner(Request $request)
    {
        $data = $request->all();
        if ($request->input('image')) {
            $data['image'] = $request->input('image');
        }
        try {
            BannerModel::create($data);
            Session::flash('success', 'Tạo banner thành công');
            return true;
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
    }

    public function updateBanner($request, $id)
    {
        $data = $request->all();
        if ($request->input('image')) {
            $data['image'] = $request->input('image');
        }
        try {
            $banner = BannerModel::findOrFail($id);
            $banner->update($data);
            Session::flash('success', 'Cập nhật banner thành công');
            return true;
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
    }
    public function destroyBanner(Request $request)
    {
        try {
            $id = (int)$request->input('id');
            $product = BannerModel::findOrFail($id);
            $product->delete();
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }

}
