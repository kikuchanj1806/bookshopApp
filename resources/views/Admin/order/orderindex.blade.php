@php
    use App\Helpers\AppFormat;
@endphp

@extends('Admin.layouts.app')

@section('title', 'Order List Page')

@section('content')
    @include('Admin.partials.header', [
        'level1' => 'Đơn hàng',
        'route1' => '/admin/order/index',
         'level2' => 'Danh sách đơn hàng',
        'route2' => '/admin/order/index',
        ])
    <form method="GET" action="{{ route('admin.order.index') }}" class="mb-2">
        <div class="row justify-content-end align-items-end">
            <div class="col-2">
                <div class="form-group">
                    <label for="customerPhone">SĐT khách hàng</label>
                    <input type="text" name="customerPhone" class="form-control form-control-sm"
                           placeholder="SĐT khách hàng" value="{{ $filters['customerPhone'] ?? '' }}">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="from_date">Từ ngày</label>
                    <input type="text" id="fromDate" name="fromDate" class="form-control form-control-sm datepicker"
                           value="{{ request('fromDate') }}">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="to_date">Đến ngày</label>
                    <input type="text" id="toDate" name="toDate" class="form-control form-control-sm datepicker"
                           value="{{ request('toDate') }}">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="createdBby">Người tạo đơn</label>
                    <select id="createdBby" name="createdBy" class="form-control form-control-sm">
                        <option value="">Chọn người tạo đơn</option>
                        @foreach($users as $user)
                            <option
                                value="{{ $user->id }}" {{ request('createdBy') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-1">
                <div class="form-group">
                    <label>&nbsp;</label>
                    <button type="submit" class="btn btn-primary btn-sm btn-block">Lọc</button>
                </div>
            </div>
        </div>
    </form>
    <div class="card">
        <div class="card-header">
            <div class="card-title">Danh sách đơn hàng</div>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th class="text-center"><input type="checkbox" id="check_all"></th>
                    <th class="text-center">ID</th>
                    <th class="text-center">Khách hàng</th>
                    <th class="text-center">Sản phẩm</th>
                    <th class="text-center">Số lượng</th>
                    <th class="text-center">Giá sản phẩm</th>
                    <th class="text-center">Giá trị đơn</th>
                    <th class="text-center">Ghi chú</th>
                    <th class="text-center">Hành động</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    @php
                        // Giả sử $order->products đã là một mảng, không cần json_decode
                       $products = $order->productDetails; // Không dùng json_decode

                       $totalProductPrice = collect($products)->sum(function($product) {
                           return $product['price'] * $product['quantity'];
                       });
                    @endphp

                    @foreach($products as $index => $product)
                        <tr>
                            @if($index == 0)
                                <td rowspan="{{ count($products) }}" class="text-center"><input type="checkbox"></td>
                                <td rowspan="{{ count($products) }}">
                                    {{ $order->id }} <br>
                                    {{ \Carbon\Carbon::parse($order->created_at)->format('H:i d/m') }} <br>
                                    <span data-toggle="tooltip"
                                          title="Nguời tạo đơn">
                                        {{ $order->user->name }}
                                    </span> <br>
                                    <span data-toggle="tooltip"
                                          title="Mã vận đơn"
                                          class="fw-bold">
                                        ({{ $order->billOfLading ?? 'Chưa có mvđ' }})
                                    </span>
                                </td>
                                <td rowspan="{{ count($products) }}">
                                    {{ $order->customer_name }} <br>
                                    {{ $order->phone }} <br>
                                    {{ $order->address }}
                                </td>
                            @endif
                            <td>
                                {{ htmlspecialchars($product['name']) }} - <span>({{ htmlspecialchars($product['code']) }})</span>
                            </td>
                            <td class="text-end">
                                {{ $product['quantity'] }}
                            </td>
                            <td class="text-end">
                                {{ \App\Helpers\AppFormat::toNumber($product['price']) }} đ
                            </td>
                            @if($index == 0)
                                <td rowspan="{{ count($products) }}" class="text-end">
                                    <span data-toggle="tooltip"
                                          title="Giá trị đơn = Tổng giá trị đơn hàng + phí ship"
                                          class="fw-bold">
                                            {{ \App\Helpers\AppFormat::toNumber($totalProductPrice + 35000) }} đ
                                    </span>
                                </td>
                                <td rowspan="{{ count($products) }}">
                                    {{ $order->note }}
                                </td>
                                <td rowspan="{{ count($products) }}" class="text-center">
                                    <div class="btn-group dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                            <i class="fas fa-cog"></i>
                                        </button>
                                        <ul class="dropdown-menu" role="menu" style="">
                                            <!-- Sửa đơn hàng -->
                                            <li>
                                                <a class="dropdown-item btn {{ ($order->is_locked && !$isAdmin) ? 'text-muted' : '' }}"
                                                   href="{{ ($order->is_locked && !$isAdmin) ? 'javascript:void(0)' : route('admin.order.edit', $order->id) }}">
                                                    <i class="fal fa-edit me-2"></i> Sửa
                                                </a>
                                            </li>
                                            <!-- Khóa/ mở khóa đơn hàng -->
                                            @if($isAdmin)
                                                <li>
                                                    @if($order->is_locked)
                                                        <a href="#" class="dropdown-item btn toggle-lock" data-order-id="{{ $order->id }}" data-action="unlock">
                                                            <i class="fas fa-lock me-2"></i> Mở khóa
                                                        </a>
                                                    @else
                                                        <a href="#" class="dropdown-item btn toggle-lock" data-order-id="{{ $order->id }}" data-action="lock">
                                                            <i class="fas fa-lock me-2"></i> Khóa
                                                        </a>
                                                    @endif
                                                </li>
                                                <li>
                                                    <a href="#" class="dropdown-item btn" data-bs-toggle="modal"
                                                       data-bs-target="#addBillOfLadingModal"
                                                       data-order-id="{{ $order->id }}">
                                                        <i class="fas fa-plus me-2"></i> Thêm mã vận đơn
                                                    </a>
                                                </li>
                                            @endif
                                            <!-- Xóa đơn hàng -->
                                            <li>
                                                <a class="dropdown-item btn {{ ($order->is_locked && !$isAdmin) ? 'text-muted' : 'removeOrder' }}"
                                                   href="javascript:void(0)"
                                                   data-id="{{ $order->id }}"
                                                    {{ ($order->is_locked && !$isAdmin) ? 'onclick="return false;"' : '' }}>
                                                    <i class="fas fa-trash me-2 text-danger"></i> Xóa
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>

            <!-- Hiển thị phân trang -->
            <div class="d-flex justify-content-end">
                {{ $orders->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>

    <!-- Modal Thêm mã vận đơn -->
    <div class="modal fade" id="addBillOfLadingModal" tabindex="-1" aria-labelledby="addBillOfLadingModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBillOfLadingModalLabel">Thêm mã vận đơn</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="billOfLading" class="form-label">Mã vận đơn</label>
                        <input type="text" class="form-control" id="billOfLading" name="billOfLading" required>
                    </div>
                    <button id="saveBillOfLadingBtn" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal remove -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog"
         aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Xác nhận xóa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Xóa mà không thể khôi phục. Bạn có chắc ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Xóa</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();

            $('.datepicker').datepicker({
                format: 'dd/mm/yyyy',
                autoclose: true,
                todayHighlight: true
            });
        });
    </script>
@endsection
