<?php

namespace App\Http\Controllers\admin;

use App\Http\FormFilter\Order\OrderRequestFilter;
use App\Http\Services\OrderService;
use App\Models\City;
use App\Models\OrderModel;
use App\Models\ProductModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Exports\OrdersExport;
use Maatwebsite\Excel\Facades\Excel;
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

    public function store(OrderRequestFilter $request)
    {
        $result = $this->orderService->createOrder($request->validated());

        if ($result) {
            if ($request->input('afterSubmit') === 'continue') {
                return redirect()->route('admin.order.add')->with('success', 'Đơn hàng được tạo thành công. Bạn có thể thêm một đơn hàng khác.');
            } else {
                return redirect()->route('admin.order.index')->with('success', 'Đơn hàng được tạo thành công.');
            }
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to create order.');
        }
    }

    public function edit($id)
    {
        $order = $this->orderService->find($id);
        $cities = City::all();
        $orderList = $this->orderService->getOrderProducts($order);
        if($order->is_locked) {
            return redirect()->route('admin.order.index')->with('error', 'Order is locked.');
        }
        return view('admin.order.edit', compact('order', 'cities', 'orderList'));
    }

    public function update(OrderRequestFilter $request, OrderModel $order)
    {
        try {
            $this->orderService->updateOrder($order, $request->validated());
            return redirect()->route('admin.order.index')->with('success', 'Đơn hàng được cập nhật thành công.');
        } catch (\Exception $e) {
            return redirect()->route('admin.order.index')->with('error', $e->getMessage());
        }
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->orderService->deleteOrderById($request);
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

    public function detail($id)
    {
        $order = OrderModel::with('user')->findOrFail($id);
        $order->productDetails = $this->orderService->getOrderProducts($order);

        return view('admin.order.detail', compact('order'));
    }

//    public function export()
//    {
//        return Excel::download(new OrdersExport, 'orders.xlsx');
//    }

    public function exportSelected(Request $request)
    {
        $request->validate([
            'orders' => 'required|array',
        ]);

        $orderIds = $request->input('orders');
        if (empty($orderIds)) {
            return redirect()->back()->with('error', 'Chưa chọn đơn hàng để xuất.');
        }
        // Lấy các đơn hàng từ danh sách ID
        $orders = OrderModel::whereIn('id', $orderIds)->get();

        // Tạo dữ liệu cho từng đơn hàng
        $exportData = $orders->map(function($order) {
            // Lấy danh sách ID sản phẩm từ đơn hàng
            $productIds = collect($order->products)->pluck('id');

            // Truy vấn thông tin sản phẩm từ bảng sản phẩm
            $products = ProductModel::whereIn('id', $productIds)->get();

            // Tạo chuỗi mã sách với số lượng
            $productCodes = $products->map(function($product) use ($order) {
                $productOrder = collect($order->products)->where('id', $product->id)->first();
                $quantity = $productOrder['quantity'];

                // Nếu số lượng là 1 thì chỉ hiển thị mã sách, không có số lượng
                return $quantity > 1 ? $product->code . '(' . $quantity . ')' : $product->code;
            })->implode(', ');

            $shippingFee = 35000;
            $productsOrder = collect($order->products);
            $totalPrice = $productsOrder->sum(function($product) {
                // Lấy giá và số lượng của sản phẩm từ $product
                return $product['price'] * $product['quantity'];
            });
            $totalWithShipping = $totalPrice + $shippingFee;

            return [
                $order->creator ? $order->creator->name : 'N/A',
                $order->customer_name,
                $order->phone,
                $order->address,
                $productCodes,
                $order->gift_code, // Mã sách tặng tạm thời để rỗng
                $totalWithShipping . 'đ',
                $order->note,
            ];
        });

        // Xuất file Excel
        $date = Carbon::now()->format('d-m-Y');
        $filename = "orders_{$date}.xlsx";

        // Truyền dữ liệu đã chuẩn bị vào lớp OrdersExport
        return Excel::download(new OrdersExport($exportData), $filename);
    }
}
