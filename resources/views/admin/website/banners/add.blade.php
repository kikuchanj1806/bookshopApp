@extends('admin.layouts.app')

@section('title', 'Banner List Page')

@section('content')
    @include('admin.partials.header', [
    'level1' => 'Danh sách banner',
    'route1' => '/admin/website/banners/index',
    'level2' => 'Thêm mới banner',
    'route2' => '/admin/website/banners/add',
    ])
    <div class="row">
        <div class="col-12">
            <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Thêm banner</div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="fw-bold" for="title">Tên banner<span
                                                class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="title" placeholder="Tên sản phẩm">
                                    @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="fw-bold" for="position">Vị trí banner
                                        <span
                                                class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="position" placeholder="Tên sản phẩm">
                                    @error('position')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="fw-bold" for="statusFormControlSelect">Trạng thái</label>
                                    <select class="form-select form-control-lg" id="statusFormControlSelect"
                                            name="status">
                                        <option value="1">Hiển thị</option>
                                        <option value="2">Ẩn</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="fw-bold">Ảnh đại diện banner</label>
                                    <div class="d-flex mt-0">
                                        <div id="image_show"></div>
                                        <input type="hidden" name="image" id="thumbBanner" value="">
                                        <div class="me-3 imageArea3"><i class="fal fa-camera-alt fa-2x"></i></div>
                                        <div class="media-body">
                                            <div class="uniform-uploader" id="uniform-imageUpload">
                                                <input type="file" class="form-input-styled" accept="image/*"
                                                       id="uploadBanner">
                                                <span class="filename" style="user-select: none;">Chọn file</span>
                                                <span class="action btn bg-pink-400"
                                                      style="user-select: none;">File</span>
                                            </div>
                                            <div class="error"></div>
                                            <span
                                                    class="form-text text-muted">File: gif, png, jpg, bmp (Tối đa 3MB)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-8">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                    <span class="uniform-choice">
                        <span class="checked">
                            <input value="continue" type="radio" class="form-check-input-styled" name="afterSubmit"
                                   checked="checked" data-fouc="">
                        </span>
                    </span>
                                    Tiếp tục thêm
                                </label>
                            </div>

                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                    <span class="uniform-choice">
                        <span class="">
                            <input value="showList" type="radio" class="form-check-input-styled" name="afterSubmit"
                                   data-fouc="">
                        </span>
                    </span>
                                    Hiện danh sách sản phẩm
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-success">Lưu</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
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
