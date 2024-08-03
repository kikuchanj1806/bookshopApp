<?php

namespace App\Http\Services;

use App\Models\OrderModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\FormFilter\Product\ProductRequestFilter;


class OrderService extends AppService
{
    public function getOrderIndex()
    {
        $user = Auth::user();
        $orders = $user->hasRole('admin')
            ? OrderModel::with('creator')->paginate(10)
            : OrderModel::with('creator')->where('created_by', $user->id)->paginate(10);
        return $orders;
    }

    public function createOrder($data)
    {
        $order = new OrderModel($data);
        $order->created_by = Auth::id();
        $order->save();

        return $order;
    }

    public function updateOrder($order, $data)
    {
        if ($order->is_locked) {
            throw new \Exception('Order is locked and cannot be edited.');
        }

        $order->update($data);
        return $order;
    }

    public function deleteOrder($order)
    {
        if ($order->is_locked) {
            throw new \Exception('Order is locked and cannot be deleted.');
        }

        $order->delete();
    }

    public function lockOrder($order)
    {
        $order->update(['is_locked' => true]);
    }
}
