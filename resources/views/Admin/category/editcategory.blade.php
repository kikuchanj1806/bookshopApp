@extends('Admin.layouts.app')

@section('title', 'Edit Category Page')

@section('content')
    @include('Admin.partials.header', [
    'level1' => 'Danh sách danh mục',
    'level2' => 'Sửa danh mục',
    'route1' => '/admin/category/index',
    'route2' => '/admin/category/edit/' . $cate->id
    ])

    <div class="row">
        <div class="col-12">
            <form action="{{ route('admin.category.edit', $cate->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Thêm danh mục sản phẩm</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="fw-bold" for="exampleFormControlSelect1">Danh mục</label>
                                    <select class="form-select" id="exampleFormControlSelect1" name="parent_id">
                                        <option value="0" {{ $cate->parent_id == 0 ? 'selected' : '' }}>Chọn danh mục
                                            cha
                                        </option>
                                        @foreach($categories as $parent)
                                            <option
                                                value="{{ $parent->id }}" {{ $parent->id == $cate->parent_id ? 'selected' : '' }}>
                                                {{ $parent->name }}
                                            </option>
                                            @if($parent->children)
                                                @foreach($parent->children as $child)
                                                    @include('admin.partials.childOption', ['child' => $child, 'prefix' => '--', 'selected' => $cate->parent_id])
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="fw-bold" for="name">Tên danh mục</label>
                                    <input type="text" class="form-control" name="name" value="{{ $cate->name }}"
                                           placeholder="Tên danh mục">
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="fw-bold" for="code">Mã danh mục</label>
                                    <input type="text" class="form-control" name="code" value="{{ $cate->code }}"
                                           placeholder="Mã danh mục">
                                    @error('code')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="fw-bold" for="exampleFormControlSelect1">Trạng thái</label>
                                    <select class="form-select" name="status" id="exampleFormControlSelect1">
                                        <option value="1" {{ $cate->status == 1 ? 'selected' : '' }}>Hiển thị</option>
                                        <option value="0" {{ $cate->status == 0 ? 'selected' : '' }}>Ẩn</option>
                                    </select>
                                    @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="fw-bold" for="order">Thứ tự</label>
                                    <input type="number" class="form-control" name="order" value="{{ $cate->order }}"
                                           placeholder="Thứ tự">
                                    @error('order')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="fw-bold" for="code">Ảnh đại diện</label>
                                    <div class="d-flex mt-0">
                                        <div id="image_show">
                                            @if($cate->image)
                                                <a href="{{$cate->image}}" target="_blank">
                                                    <img src="{{$cate->image}}" alt="{{$cate->name}}" width="60px" class="me-3"/>
                                                </a>
                                            @endif
                                        </div>
                                        <input type="hidden" name="image" id="thumb" value="{{ $cate->image ?? '' }}">
                                        <div class="me-3 imageArea1 {{ $cate->image ? 'd-none' : '' }}"><i class="fal fa-camera-alt fa-2x"></i></div>
                                        <div class="media-body">
                                            <div class="uniform-uploader" id="uniform-imageUpload">
                                                <input type="file" class="form-input-styled" accept="image/*" id="upload">
                                                <span class="filename" style="user-select: none;">Chọn file</span>
                                                <span class="action btn bg-pink-400" style="user-select: none;">File</span>
                                            </div>
                                            <div class="error"></div>
                                            <span class="form-text text-muted">File: gif, png, jpg, bmp (Tối đa 3MB)</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="fw-bold" for="code">Icon</label>
                                    <div class="d-flex mt-0">
                                        <div id="icon_show">
                                            @if($cate->icon)
                                            <a href="{{$cate->icon}}" target="_blank">
                                                <img src="{{$cate->icon}}" alt="{{$cate->name}}" width="60px" class="me-3"/>
                                            </a>
                                            @endif
                                        </div>
                                        <input type="hidden" name="icon" id="icon_thumb" value="{{ $cate->icon ?? '' }}">
                                        <div class="me-3 imageArea2 {{ $cate->icon ? 'd-none' : '' }} "><i class="fal fa-camera-alt fa-2x"></i></div>
                                        <div class="media-body">
                                            <div class="uniform-uploader" id="uniform-imageUpload">
                                                <input type="file" class="form-input-styled businessFileUpload" accept="image/*" id="imageUpload">
                                                <span class="filename" style="user-select: none;">Chọn file</span>
                                                <span class="action btn bg-pink-400" style="user-select: none;">File</span>
                                            </div>
                                            <div class="error"></div>
                                            <span class="form-text text-muted">File: gif, png, jpg, bmp (Tối đa 4MB)</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="fw-bold" for="exampleFormControlSelect2">Hiển thị trang chủ</label>
                                    <select class="form-select" name="status_display_index" id="exampleFormControlSelect2">
                                        <option value="0" {{ $cate->status_display_index == 0 ? 'selected' : '' }}>Ẩn</option>
                                        <option value="1" {{ $cate->status_display_index == 1 ? 'selected' : '' }}>Hiển thị</option>
                                    </select>
                                    @error('status_display_index')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="fw-bold" for="description">Mô tả chi tiết</label>
                                <textarea name="description" id="description" rows="10"
                                          cols="80">{{ $cate->description }}</textarea>
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
        CKEDITOR.replace('description');
    </script>
@endsection
