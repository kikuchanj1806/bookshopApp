@extends('Admin.layouts.app')

@section('title', 'Category List Page')

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
                    <th class="text-center">Tên danh mục</th>
                    <th class="text-center">Mã danh mục</th>
                    <th class="text-center">Ảnh</th>
                    <th class="text-center">Trạng thái</th>
                    <th class="text-center">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $index => $category)
                    <tr>
                        <td class="text-center">{{ $loop->iteration + ($categories->currentPage() - 1) * $categories->perPage() }}</td>
                        <td class="text-center">{{ $category->id }}</td>
                        <td>{{ str_repeat('--', $category->level) . ' ' . $category->name }}</td>
                        <td>{{ $category->code }}</td>
                        <td class="text-center">
                            @if($category->image)
                                <a data-fancybox="gallery" href="{{ asset($category->image) }}">
                                    <img src="{{ asset($category->image) }}" alt="{{ $category->name }}"
                                         style="width: 30px; height: auto;">
                                </a>
                            @else
                                <!-- Nếu không có ảnh, hiển thị chuỗi rỗng -->
                                <span></span>
                            @endif
                        </td>
                        <td class="text-center">{{ $category->status == 1 ? 'Hiển thị' : 'Ẩn' }}</td>
                        <td class="text-center">
                            <div class="btn-group dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                    <i class="fas fa-cog"></i>
                                </button>
                                <ul class="dropdown-menu" role="menu" style="">
                                    <li>
                                        <a class="dropdown-item"
                                           href="{{ route('admin.category.edit', $category->id) }}">
                                            <i class="fal fa-edit me-2"></i> Sửa
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="dropdown-item removeCate" data-id="{{ $category->id }}">
                                            <i class="fas fa-trash me-2"></i>
                                            Xóa
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!-- Hiển thị phân trang -->
            <div class="d-flex justify-content-center">
                {{ $categories->links('pagination::bootstrap-4') }}
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
