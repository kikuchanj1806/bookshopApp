<?php

namespace App\Http\Controllers\Admin;

use App\Http\Services\OrderService;
use App\Models\City;
use App\Models\OrderModel;
use App\Models\ProductModel;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }
    public function orderindex(Request $request)
    {
        $user = Auth::user();
        $isAdmin = $user->role == 'admin';
        // Lấy các bộ lọc từ request
        $filters = [
            'fromDate' => $request->input('fromDate'),
            'toDate' => $request->input('toDate'),
            'createdBy' => $request->input('createdBy'),
            'customerPhone' => $request->input('customerPhone'),
        ];

        $orders = $this->orderService->getOrdersByUser($user, $filters);

        foreach ($orders as $order) {
            $order->productDetails = $this->orderService->getOrderProducts($order);
        }

        $users = User::all(); // Lấy danh sách tất cả người dùng để hiển thị trong dropdown bộ lọc

        return view('admin.order.orderindex', compact('orders', 'users', 'filters', 'isAdmin'));
    }

    public function create()
    {
        $cities = City::all();
        return view('admin.order.add', compact('cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'cityId' => 'required|integer',
            'districtId' => 'required|integer',
            'wardId' => 'required|integer',
            'products' => 'required|array',
        ]);

        $this->orderService->createOrder($request->all());

        return redirect()->route('admin.order.index')->with('success', 'Order created successfully.');
    }

    public function edit($id)
    {
        $order = $this->orderService->find($id);
        if($order->is_locked) {
            return redirect()->route('admin.order.index')->with('error', 'Order is locked.');
        }
        return view('admin.order.edit', compact('order'));
    }

    public function update(Request $request, OrderModel $order)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'cityId' => 'required|integer',
            'districtId' => 'required|integer',
            'wardId' => 'required|integer',
            'products' => 'required|array',
        ]);

        try {
            $this->orderService->updateOrder($order, $request->all());
        } catch (\Exception $e) {
            return redirect()->route('orders.index')->with('error', $e->getMessage());
        }

        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->orderService->deleteOrderById($request);
//        dd($result);
        return response()->json($result);
    }

    public function lockOrder($id)
    {
        $order = OrderModel::find($id);
        if (!$order) {
            return response()->json(['message' => 'Đơn hàng không tồn tại.'], 404);
        }

        $order->is_locked = true;
        $order->save();

        return response()->json(['message' => 'Đơn hàng đã được khóa.']);
    }

    public function unlockOrder($id)
    {
        $order = OrderModel::find($id);
        if (!$order) {
            return response()->json(['message' => 'Đơn hàng không tồn tại.'], 404);
        }

        $order->is_locked = false;
        $order->save();

        return response()->json(['message' => 'Đơn hàng đã được mở khóa.']);
    }

    public function addBillOfLading(Request $request)
    {
        $request->validate([
            'order_id' => 'required|integer|exists:order_models,id',
            'billOfLading' => 'required|string|max:255',
        ]);

        try {
            $this->orderService->addBillOfLading($request->order_id, $request->billOfLading);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
