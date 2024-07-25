@php
    use App\Helpers\AppFormat;
@endphp

@extends('Admin.layouts.app')

@section('title', 'Product List Page')

@section('content')
    @include('Admin.partials.header', [
        'level1' => 'Danh sách sản phẩm',
        'route1' => '/admin/category/index',
        ])
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
                    <th class="text-center">Thao tác</th>
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
                                         style="width: 40px; height: auto;">
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
                        <td class="text-center">{{ AppFormat::getStatus($p->status) }}</td>
                        <td class="text-center">
                            <div class="btn-group dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                    <i class="fas fa-cog"></i>
                                </button>
                                <ul class="dropdown-menu" role="menu" style="">
                                    <li>
                                        <a class="dropdown-item btn"
                                           href="{{ route('admin.product.edit', $p->id) }}">
                                            <i class="fal fa-edit me-2"></i> Sửa
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="dropdown-item btn removeProduct" data-id="{{ $p->id }}">
                                            <i class="fas fa-trash me-2"></i>
                                            Xóa
                                        </a>
                                    </li>
                                    <li>
                                        <button id="uploadThumbProduct" type="button" class="btn" data-id="{{ $p->id }}" data-bs-toggle="modal"
                                                data-bs-target="#uploadModal">
                                            <i class="fal fa-upload mr-1"></i> Upload ảnh
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!-- Hiển thị phân trang -->
            <div class="d-flex justify-content-end">
                {{ $products->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>

    <!-- Modal remove -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
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

    <!-- Modal upload image -->
    <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalLabel">Upload ảnh</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="file" class="form-label">Chọn ảnh</label>
                        <input type="file" id="file" name="files[]" class="form-control" multiple data-max_length="20" accept="image/*">
                    </div>
                    <div id="previewContainer" class="row"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" id="saveChanges" class="btn btn-primary">Lưu thay đổi</button>
                </div>
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

        toastr.options = {
            'progressBar': true,
            'closeButton': true
        }

        @if (Session::has('error'))
        toastr.error('{{ Session::get('error') }}');
        @elseif (Session::has('success'))
        toastr.success('{{ Session::get('success') }}');
        @endif
    </script>
@endsection
