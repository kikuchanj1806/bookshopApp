@extends('admin.layouts.app')

@section('title', 'Banner List Page')

@section('content')
    @include('admin.partials.header', [
    'level1' => 'website',
    'route1' => 'javascript:void(0)',
    'level2' => 'Danh sách banner',
    'route2' => '/admin/website/banners/index',
    ])
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="card-title">{{ $title }}</div>
            <a href="/admin/website/banners/add" class="btn btn-success">
                        <span class="btn-label">
                          <i class="fa fa-plus"></i>
                        </span>
                Thêm banner
            </a>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th class="text-center low">#</th>
                    <th class="text-center">ID</th>
                    <th class="text-center">Tên banner</th>
                    <th class="text-center">Vị trí banner</th>
                    <th class="text-center">Ảnh</th>
                    <th class="text-center">Trạng thái</th>
                    <th class="text-center">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @foreach($banners as $index => $b)
                    <tr>
                        <td class="text-center">{{ $loop->iteration + ($banners->currentPage() - 1) * $banners->perPage() }}</td>
                        <td class="text-center">{{ $b->id }}</td>
                        <td class="text-center">{{ $b->title }}</td>
                        <td class="text-center">{{ $b->position }}</td>
                        <td class="text-center">
                            @if($b->image)
                                <a data-fancybox="gallery" href="{{ asset($b->image) }}">
                                    <img src="{{ asset($b->image) }}" alt="{{ $b->title }}"
                                         style="width: 40px; height: auto;">
                                </a>
                            @else
                                <!-- Nếu không có ảnh, hiển thị chuỗi rỗng -->
                                <span></span>
                            @endif
                        </td>
                        <td class="text-center">{{ $b->status == 1 ? 'Hiển thị' : 'Ẩn' }}</td>
                        <td class="text-center">
                            <div class="btn-group dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                    <i class="fas fa-cog"></i>
                                </button>
                                <ul class="dropdown-menu" role="menu" style="">
                                    <li>
                                        <a class="dropdown-item btn"
                                           href="{{ route('admin.banners.edit', $b->id) }}">
                                            <i class="fal fa-edit me-2"></i> Sửa
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="dropdown-item btn removeBanner" data-id="{{ $b->id }}">
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
