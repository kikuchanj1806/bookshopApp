@php
    use App\Helpers\AppFormat;
@endphp
@extends('Admin.layouts.app')

@section('title', 'Edit Order Page')

@section('content')
    @include('Admin.partials.header', [
 'level1' => 'Danh sách đơn hàng',
 'level2' => 'Sửa đơn hàng',
 'route1' => '/admin/order/index',
 'route2' => '/admin/order/edit/' . $order->id
    ])

@endsection
