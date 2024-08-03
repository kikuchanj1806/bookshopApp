@php
    use App\Helpers\AppFormat;
@endphp

@extends('Admin.layouts.app')

@section('title', 'Order List Page')

@section('content')
    @include('Admin.partials.header', [
        'level1' => 'Danh sách đơn hàng',
        'route1' => '/admin/order/index',
        ])

    <div class="card">
        <div class="card-header">
        </div>
    </div>
@endsection
