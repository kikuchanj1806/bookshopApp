<?php

namespace App\Http\Controllers\Admin;

use App\Http\Services\OrderService;
use App\Models\City;
use App\Models\OrderModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }
    public function orderindex()
    {
        $orders = $this->orderService->getOrderIndex();
        return view('admin.order.orderindex', compact('orders'));
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

    public function edit(OrderModel $order)
    {
        return view('orders.edit', compact('order'));
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

    public function destroy(OrderModel $order)
    {
        try {
            $this->orderService->deleteOrder($order);
        } catch (\Exception $e) {
            return redirect()->route('orders.index')->with('error', $e->getMessage());
        }

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }

    public function lock(OrderModel $order)
    {
        $this->orderService->lockOrder($order);

        return redirect()->route('orders.index')->with('success', 'Order locked successfully.');
    }
}
