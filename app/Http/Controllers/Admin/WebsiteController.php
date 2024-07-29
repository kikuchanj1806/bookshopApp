<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\WebsiteService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\BannerModel;


class WebsiteController extends Controller
{
    protected $websiteService;
    public function __construct(WebsiteService $websiteService)
    {
        $this->websiteService = $websiteService;
    }

    //    Module banner
    public function bannerIndex()
    {
        $banners = $this->websiteService->getAllBanner();
        return view('admin.website.banners.index', [
            'title' => 'Danh sách banner',
            'banners' => $banners
        ]);
    }

    public function createBanner()
    {
        return view('admin.website.banners.add');
    }

    public function storeBanner(Request $request)
    {
        $result = $this->websiteService->storeBanner($request);
        if ($result) {
            if ($request->input('afterSubmit') === 'continue') {
                return redirect()->route('admin.banners.add')->with('success', 'Banner được tạo thành công. Bạn có thể thêm một banner khác.');
            } else {
                return redirect()->route('admin.banners.index')->with('success', 'Banner được tạo thành công.');
            }
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to create banner.');
        }
    }

    public function editBanner($id)
    {
        $banner = $this->websiteService->findBanner($id);
        return view('admin.website.banners.edit', [
            'banner' => $banner,
        ]);
    }

    public function updateBanner(Request $request, $id)
    {
        $result = $this->websiteService->updateBanner($request, $id);
        if ($result) {
            return redirect()->route('admin.banners.index')->with('success', 'Banner được cập nhật thành công.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to update banner.');
        }
    }

    public function destroyBanner(Request $request): JsonResponse
    {
        $result = $this->websiteService->destroyBanner($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công banner'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }
}
