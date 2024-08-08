@php
    use App\Helpers\AppFormat;
@endphp
@extends('admin.layouts.app')

@section('title', 'Add Product Page')

@section('content')
    @include('admin.partials.header', [
 'level1' => 'Danh sách sản phẩm',
 'level2' => 'Sửa sản phẩm',
 'route1' => '/admin/product/index',
 'route2' => '/admin/product/edit/' . $product->id
    ])
    <div class="row">
        <div class="col-12">
            <form action="{{ route('admin.product.edit', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Sửa sản phẩm</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="fw-bold" for="name">Tên sản phẩm <span
                                                class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Tên sản phẩm"
                                           value="{{ $product->name }}">
                                    @error('promotionContent')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="fw-bold" for="code">Mã sản phẩm <span
                                                        class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="code"
                                                   value="{{ $product->code }}"
                                                   placeholder="Mã sản phẩm">
                                            @error('code')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="fw-bold" for="price">Giá bán</label>
                                            <input type="text" class="form-control" name="price"
                                                   value="{{ $product->price }}" placeholder="Giá bán">
                                            @error('price')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="fw-bold" for="oldPrice">Giá cũ</label>
                                            <input type="text" class="form-control" name="oldPrice"
                                                   value="{{ $product->oldPrice }}"
                                                   placeholder="Giá cũ">
                                            @error('oldPrice')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="fw-bold" for="quantity">Số lượng sản phẩm <span
                                                        class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="quantity"
                                                   value="{{ $product->quantity }}"
                                                   placeholder="Số lượng sản phẩm">
                                            @error('quantity')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="fw-bold" for="brand">Thương hiệu</label>
                                            <input type="text" class="form-control" name="brand"
                                                   placeholder="Thương hiệu" value="{{ $product->brand }}">
                                            @error('brand')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="fw-bold" for="statusFormControlSelect">Trạng thái <span
                                                        class="text-danger">*</span></label>
                                            <select class="form-select form-control-lg" id="statusFormControlSelect"
                                                    name="status">
                                                <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Mới
                                                </option>
                                                <option value="2" {{ $product->status == 2 ? 'selected' : '' }}>Đang
                                                    bán
                                                </option>
                                                <option value="3" {{ $product->status == 3 ? 'selected' : '' }}>Ngừng
                                                    bán
                                                </option>
                                                <option value="4" {{ $product->status == 4 ? 'selected' : '' }}>Hết
                                                    hàng
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="fw-bold" for="tags">Tags</label>
                                    <select name="tags[]" id="tags" class="form-select form-control-lg" multiple>
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}" {{ in_array($tag->id, $productTags) ? 'selected' : '' }}>
                                                {{ $tag->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="fw-bold" for="categoryFormControlSelect">Danh mục <span
                                                class="text-danger">*</span></label>
                                    <select class="form-select form-control-lg" id="categoryFormControlSelect"
                                            name="categoryId">
                                        <option value="">Chọn danh mục</option>
                                        @foreach($categories as $parent)
                                            <option
                                                    value="{{ $parent->id }}" {{ $parent->id == $product->categoryId ? 'selected' : '' }}>
                                                {{ $parent->name }}
                                            </option>
                                            @if($parent->children)
                                                @foreach($parent->children as $child)
                                                    @include('admin.partials.childOption', ['child' => $child, 'prefix' => '--', 'selected' => $product->categoryId])
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="fw-bold" for="weight">Khối lượng</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="weight"
                                               value="{{ $product->weight }}">
                                        <span class="input-group-text" id="basic-addon2">Gr</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="fw-bold">Kích thước (cm)</label>
                                    <div class="input-group">
                                        <input type="text" name="length" maxlength="255" placeholder="Dài"
                                               class="text-right form-control" inputmode="decimal" id="length"
                                               autocomplete="off" value="{{ $product->length }}">
                                        <input type="text" name="width"
                                               maxlength="255" placeholder="Rộng"
                                               class="text-right form-control"
                                               inputmode="decimal" id="width"
                                               autocomplete="off" value="{{ $product->width }}">
                                        <input
                                                type="text" name="height" maxlength="255" placeholder="Cao"
                                                class="text-right form-control" inputmode="decimal" id="height"
                                                autocomplete="off" value="{{ $product->height }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="fw-bold" for="code">Ảnh đại diện</label>
                                    <div class="d-flex mt-0">
                                        <div id="image_show">
                                            @if($product->image)
                                                <a href="{{$product->image}}" target="_blank">
                                                    <img src="{{$product->image}}" alt="{{$product->name}}" width="60px"
                                                         class="me-3"/>
                                                </a>
                                            @endif
                                        </div>
                                        <input type="hidden" name="image" id="thumb"
                                               value="{{ $product->image ?? '' }}">
                                        <div class="me-3 imageArea1 {{ $product->image ? 'd-none' : '' }}"><i
                                                    class="fal fa-camera-alt fa-2x"></i></div>
                                        <div class="media-body">
                                            <div class="uniform-uploader" id="uniform-imageUpload">
                                                <input type="file" class="form-input-styled" accept="image/*"
                                                       id="upload">
                                                <span class="filename" style="user-select: none;">Chọn file</span>
                                                <span class="action btn bg-pink-400"
                                                      style="user-select: none;">File</span>
                                            </div>
                                            <div class="error"></div>
                                            <span class="form-text text-muted">File: gif, png, jpg, bmp (Tối đa 3MB)</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-2 row">
                                    <label class="col-5 col-form-label fw-bold">Hiển thị trên
                                    </label>
                                    <div class="col-7">
                                        <div class="input-group col-12 mb-2">
                                            <div class="d-flex align-items-center">
                                                <div class="form-check-switchery">
                                                    <label class="form-check-label" for="showHome">
                                                        <input id="showHome" name="showHome" type="checkbox"
                                                               class="form-check-input-switchery d-none"
                                                               value="1" {{ $product->showHome ? 'checked' : '' }}>
                                                        <span class="switchery switchery-success"><small></small></span>
                                                    </label>
                                                </div>
                                                <div class="label-checkbox">
                                                    Sản phẩm sale
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-group col-12 mb-2">
                                            <div class="d-flex align-items-center">
                                                <div class="form-check-switchery">
                                                    <label class="form-check-label">
                                                        <input id="showNew" name="showNew" type="checkbox"
                                                               class="form-check-input-switchery d-none"
                                                               value="1" {{ $product->showNew ? 'checked' : '' }}>
                                                        <span class="switchery switchery-success"><small></small></span>
                                                    </label>
                                                </div>
                                                <div class="label-checkbox">
                                                    Sản phẩm mới
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-group col-12 mb-2">
                                            <div class="d-flex align-items-center">
                                                <div class="form-check-switchery">
                                                    <label class="form-check-label">
                                                        <input id="showHot" name="showHot" type="checkbox"
                                                               class="form-check-input-switchery d-none"
                                                               value="1" {{ $product->showHot ? 'checked' : '' }}>
                                                        <span class="switchery switchery-success"><small></small></span>
                                                    </label>
                                                </div>
                                                <div class="label-checkbox">
                                                    Sản phẩm hot
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="fw-bold" for="description">Mô tả ngắn</label>
                                    <textarea name="description" id="description" rows="10" cols="80">
                                        {{ $product->description }}
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="fw-bold" for="content">Mô tả chi tiết</label>
                                    <textarea name="content" id="content" rows="10" cols="80">
                                        {{ $product->content }}
                                    </textarea>
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
