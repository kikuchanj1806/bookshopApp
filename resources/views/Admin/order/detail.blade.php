@extends('Admin.layouts.app')

@section('title', 'Detai Order Page')

@section('content')
    @include('Admin.partials.header', [
 'level1' => 'Danh sách đơn hàng',
 'level2' => 'Chi tiết đơn hàng',
 'route1' => '/admin/order/index',
 'route2' => '/admin/order/detail/' . $order->id
    ])
    <div class="container">
        <h1>Chi tiết đơn hàng</h1>
        <div class="card">
            <div class="card-header">
                <h3>Thông tin khách hàng</h3>
            </div>
            <div class="card-body">
                <p><strong>Tên khách hàng:</strong> {{ $order->customer_name }}</p>
                <p><strong>Người tạo đơn:</strong> {{ $order->user->name }}</p>
                <p><strong>Mã vận đơn:</strong> {{ $order->billOfLading }}</p>
                <p><strong>Số điện thoại:</strong> {{ $order->phone }}</p>
                <p><strong>Địa chỉ:</strong> {{ $order->address }}</p>
                <p><strong>Ghi chú:</strong> {{ $order->note }}</p>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h3>Thông tin sản phẩm</h3>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="text-center">STT</th>
                            <th class="text-center">Tên sản phẩm</th>
                            <th class="text-center">Mã sản phẩm</th>
                            <th class="text-center">Số lượng</th>
                            <th class="text-center">Giá</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $totalQuantity = 0;
                            $totalPrice = 0;
                            $shippingFee = 35000;
                        @endphp
                        @foreach ($order->productDetails as $index => $product)
                            @php
                                $totalQuantity += $product['quantity'];
                                $totalPrice += $product['quantity'] * $product['price'];
                            @endphp
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td class="text-center">{{ $product['name'] }}</td>
                                <td class="text-center">{{ $product['code'] }}</td>
                                <td class="text-center">{{ $product['quantity'] }}</td>
                                <td class="text-center">{{ number_format($product['price'], 0, ',', '.') }} đ</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="3" class="text-end fw-bold">Tổng</td>
                            <td class="text-center fw-bold">{{ $totalQuantity }}</td>
                            <td class="text-center fw-bold">{{ number_format($totalPrice, 0, ',', '.') }} đ</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-end fw-bold">Phí ship</td>
                            <td colspan="2" class="text-center fw-bold">{{ number_format($shippingFee, 0, ',', '.') }} đ</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-end fw-bold">Tổng cộng</td>
                            <td colspan="2" class="text-center fw-bold">{{ number_format($totalPrice + $shippingFee, 0, ',', '.') }} đ</td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
