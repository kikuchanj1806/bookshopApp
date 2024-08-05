<?php

namespace App\Http\Services;

use App\Http\FormFilter\Order\OrderRequestFilter;
use App\Models\OrderModel;
use App\Models\ProductModel;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\FormFilter\Product\ProductRequestFilter;


class OrderService extends AppService
{

    public function getOrdersByUser($user, $filters = [])
    {
        $query = OrderModel::with('user');

        // Áp dụng bộ lọc từ ngày
        if (isset($filters['fromDate']) && $filters['fromDate']) {
            $query->whereDate('created_at', '>=', $filters['fromDate']);
        }

        // Áp dụng bộ lọc đến ngày
        if (isset($filters['toDate']) && $filters['toDate']) {
            $query->whereDate('created_at', '<=', $filters['toDate']);
        }

        // Áp dụng bộ lọc người tạo đơn
        if (isset($filters['createdBy']) && $filters['createdBy']) {
            $query->where('created_by', $filters['createdBy']);
        }

        // Áp dụng bộ lọc theo số điện thoại khách hàng
        if (isset($filters['customerPhone']) && $filters['customerPhone']) {
            $query->where('phone', 'LIKE', "%{$filters['customerPhone']}%");
        }

        if ($user->hasRole('admin')) {
            return $query->paginate(20);
        }

        return $query->where('created_by', $user->id)->paginate(20);
    }

    public function getOrderProducts($order)
    {
        // Giải mã JSON từ cột products
        $products = $order->products;

        if (is_array($products)) {
            return collect($products)->map(function ($product) {
                $productDetails = ProductModel::find($product['id']);
                return [
                    'id' => $productDetails->id,
                    'name' => $productDetails->name,
                    'code' => $productDetails->code,
                    'price' => $product['price'],
                    'quantity' => $product['quantity'],
                    'total' => $product['price'] * $product['quantity']
                ];
            });
        }

        return collect();
    }

    public function createOrder($data)
    {
        $order = new OrderModel($data);
        $order->created_by = Auth::id();
        $order->save();

        return $order;
    }

    public function find($id)
    {
        return OrderModel::findOrFail($id);
    }


    public function updateOrder($order, $data)
    {
        if ($order->is_locked) {
            throw new \Exception('Order is locked and cannot be edited.');
        }

        try {
            $order->update($data);
            return true;
        } catch (\Exception $exception) {
            throw new \Exception('Failed to update order: ' . $exception->getMessage());
        }
    }

    public function deleteOrderById(Request $request)
    {
        try {
            $id = (int)$request->input('id');
            $order = OrderModel::findOrFail($id);

            // Kiểm tra trạng thái khóa
            if ($order->is_locked) {
                // Trả về false và thông báo lỗi
                return [
                    'error' => false,
                    'message' => 'Đơn hàng đang bị khóa và không thể xóa.'
                ];
            }

            $order->delete();
            return [
                'error' => true,
                'message' => 'Xóa đơn hàng thành công'
            ];
        } catch (\Exception $err) {
            // Xử lý lỗi và trả lại thông báo lỗi
            return [
                'error' => false,
                'message' => $err->getMessage()
            ];
        }
    }

    public function lockOrder($order)
    {
        $order->update(['is_locked' => true]);
    }

    public function addBillOfLading(int $orderId, string $billOfLading)
    {
        // Validate inputs
        if (!OrderModel::where('id', $orderId)->exists()) {
            throw ValidationException::withMessages([
                'order_id' => 'Order not found.',
            ]);
        }

        // Update order
        $order = OrderModel::find($orderId);
        $order->billOfLading = $billOfLading;
        $order->save();
    }
}
