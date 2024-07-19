@extends('Admin.layouts.app')

@section('title', 'Add Product Page')

@section('content')
    @include('Admin.partials.header', [
 'level1' => 'Danh sách sản phẩm',
 'level2' => 'Thêm sản phẩm',
 'route1' => '/admin/product/index',
 'route2' => '/admin/product/add'
    ])
    <div class="row">
        <div class="col-12">
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Thêm sản phẩm</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="fw-bold" for="name">Tên sản phẩm</label>
                                    <input type="text" class="form-control" name="name" placeholder="Tên sản phẩm">
                                    @error('promotionContent')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="fw-bold" for="code">Mã sản phẩm</label>
                                            <input type="text" class="form-control" name="code"
                                                   placeholder="Mã sản phẩm">
                                            @error('code')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="fw-bold" for="price">Giá bán</label>
                                            <input type="text" class="form-control" name="price" placeholder="Giá bán">
                                            @error('price')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="fw-bold" for="oldPrice">Giá cũ</label>
                                            <input type="text" class="form-control" name="oldPrice"
                                                   placeholder="Giá cũ">
                                            @error('oldPrice')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="fw-bold" for="quantity">Số lượng sản phẩm</label>
                                            <input type="text" class="form-control" name="quantity"
                                                   placeholder="Số lượng sản phẩm">
                                            @error('quantity')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="fw-bold" for="brand">Thương hiệu</label>
                                            <input type="text" class="form-control" name="brand"
                                                   placeholder="Thương hiệu">
                                            @error('brand')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="fw-bold" for="statusFormControlSelect">Trạng thái</label>
                                            <select class="form-select form-control-lg" id="statusFormControlSelect"
                                                    name="status">
                                                <option value="1">Mới</option>
                                                <option value="2">Đang bán</option>
                                                <option value="3">Ngừng bán</option>
                                                <option value="4">Hết hàng</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="fw-bold" for="categoryFormControlSelect">Danh mục</label>
                                    <select class="form-select form-control-lg" id="categoryFormControlSelect"
                                            name="categoryId">
                                        <option value="">Chọn danh mục</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @if($category->children)
                                                @foreach($category->children as $child)
                                                    @include('Admin.partials.childOption', ['child' => $child, 'prefix' => '--', 'selected' => ''])
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="fw-bold" for="weight">Khối lượng</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="weight">
                                        <span class="input-group-text" id="basic-addon2">Gr</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="fw-bold">Kích thước (cm)</label>
                                    <div class="input-group">
                                        <input type="text" name="length" maxlength="255" placeholder="Dài"
                                               class="text-right form-control" inputmode="decimal" id="length"
                                               autocomplete="off" value="">
                                        <input type="text" name="width"
                                                                                   maxlength="255" placeholder="Rộng"
                                                                                   class="text-right form-control"
                                                                                   inputmode="decimal" id="width"
                                                                                   autocomplete="off" value="">
                                        <input
                                            type="text" name="height" maxlength="255" placeholder="Cao"
                                            class="text-right form-control" inputmode="decimal" id="height"
                                            autocomplete="off" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="fw-bold">Ảnh đại diện</label>
                                    <div class="d-flex mt-0">
                                        <div id="image_show"></div>
                                        <input type="hidden" name="image" id="thumb" value="">
                                        <div class="me-3 imageArea1"><i class="fal fa-camera-alt fa-2x"></i></div>
                                        <div class="media-body">
                                            <div class="uniform-uploader" id="uniform-imageUpload">
                                                <input type="file" class="form-input-styled" accept="image/*"
                                                       id="upload">
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
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="fw-bold" for="description">Mô tả ngắn</label>
                                    <textarea name="description" id="description" rows="10" cols="80"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="fw-bold" for="content">Mô tả chi tiết</label>
                                    <textarea name="content" id="content" rows="10" cols="80"></textarea>
                                </div>
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
        CKEDITOR.replace('content');
    </script>
@endsection
