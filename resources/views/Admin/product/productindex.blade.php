@php
    use App\Helpers\AppFormat;
@endphp

@extends('Admin.layouts.app')

@section('title', 'Product List Page')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">{{ $title }}</div>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th class="text-center low">#</th>
                    <th class="text-center">ID</th>
                    <th class="text-center">Ảnh</th>
                    <th class="text-center">Mã sản phẩm</th>
                    <th class="text-center">Tên sản phẩm</th>
                    <th class="text-center">Giá bán</th>
                    <th class="text-center">Giá cũ</th>
                    <th class="text-center">Trạng thái</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $index => $p)
                    <tr>
                        <td class="text-center">{{ $loop->iteration + ($products->currentPage() - 1) * $products->perPage() }}</td>
                        <td class="text-center">{{ $p->id }}</td>
                        <td class="text-center">
                            @if($p->image)
                                <a data-fancybox="gallery" href="{{ asset($p->image) }}">
                                    <img src="{{ asset($p->image) }}" alt="{{ $p->name }}"
                                         style="width: 30px; height: auto;">
                                </a>
                            @else
                                <!-- Nếu không có ảnh, hiển thị chuỗi rỗng -->
                                <span></span>
                            @endif
                        </td>
                        <td class="text-center">{{ $p->code }}</td>
                        <td class="text-start">{{ $p->name }}</td>
                        <td class="text-end">{{ AppFormat::toNumber($p->price) }}</td>
                        <td class="text-end">{{ AppFormat::toNumber($p->oldPrice) }}</td>
                        <td class="text-center">{{ $p->status }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!-- Hiển thị phân trang -->
            <div class="d-flex justify-content-center">
                {{ $products->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            Fancybox.bind("[data-fancybox='gallery']", {
                Toolbar: false, // Ẩn thanh công cụ
                animated: false, // Tắt hiệu ứng
                showClass: false, // Tắt hiệu ứng xuất hiện
                hideClass: false, // Tắt hiệu ứng ẩn
                closeButton: "outside", // Hiển thị nút đóng ở bên ngoài
                dragToClose: false, // Tắt tính năng kéo để đóng
                Image: {
                    zoom: false, // Tắt tính năng zoom
                    click: false, // Tắt tính năng click để zoom
                    wheel: false // Tắt tính năng cuộn để zoom
                },
                Thumbs: false, // Tắt tính năng thumbnails
                Hash: false, // Tắt tính năng hash
                fullScreen: false, // Tắt tính năng fullscreen
                slideShow: false, // Tắt tính năng slideshow
                Panzoom: {
                    disableZoom: true, // Tắt tính năng zoom
                    disablePan: true // Tắt tính năng pan
                }
            });
        });
    </script>
@endsection
