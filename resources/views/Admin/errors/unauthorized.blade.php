@extends('Admin.layouts.app')

@section('content')
    <div class="container">

        <div class="alert alert-danger" role="alert">
            Bạn không có quyền truy cập vào trang này.
        </div>
        <a href="{{ url()->previous() }}" class="btn btn-primary">Quay lại</a>


    </div>
@endsection
