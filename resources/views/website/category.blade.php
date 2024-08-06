@extends('website.layouts.app')

@section('title', 'Category Page')

@section('content')
    <section id="breadcrum">
        <div class="container">
            <ul>
                <li><a href="/"><i class="fa-solid fa-house"></i>Trang chủ</a></li>
                <li><span>{{ $category->name ?? 'Danh mục sản phẩm' }}</span></li>
            </ul>
        </div>
    </section>

    <section class="category-heading"
             style="background-image: url({{ asset($category->image ?? './assets/images/cat-banner.jpg') }});">
        <div class="container">
            <div class="category-heading-inner">
                <h1 class="category-title">{{ $category->name ?? 'Danh mục sản phẩm' }}</h1>
                <p class="category-des">{{ $category->description ?? '' }}</p>
            </div>

        </div>
    </section>

    <section id="categoryProductList">
        <div class="container">
            <div id="filter">
                <h2 class="filter-title">Chọn theo tiêu chí</h2>
                <form id="filter-form" action="{{ route('category.products', $category->slug) }}" method="GET">
                    <div id="filterModule">
                        <div class="filter-wrapper">
                            <button type="button" class="filter-btn button__filter-parent">
                                <span class="filter-name">Lớp học</span>
                                <i class="fa-regular fa-chevron-down"></i>
                            </button>
                            <div class="list-filter-child">
                                <ul>
                                    @foreach($tags as $tag)
                                        @if(Str::startsWith($tag->name, 'Lớp'))
                                            <li>
                                                <label>
                                                    <input type="checkbox" name="tag[]" value="{{ $tag->id }}"
                                                            {{ in_array($tag->id, $tagIds) ? 'checked' : '' }}>
                                                    {{ $tag->name }}
                                                </label>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                                <div class="btn-filter-group">
                                    <button type="button" class="close-filter">Đóng</button>
                                    <button type="button" class="save-filter">Xem kết quả</button>
                                </div>
                            </div>
                        </div>
                        <div class="filter-wrapper">
                            <button type="button" class="filter-btn button__filter-parent">
                                <span class="filter-name">Môn học</span>
                                <i class="fa-regular fa-chevron-down"></i>
                            </button>
                            <div class="list-filter-child">
                                <ul>
                                    @foreach($tags as $tag)
                                        @if(!Str::startsWith($tag->name, 'Lớp'))
                                            <li>
                                                <label>
                                                    <input type="checkbox" name="tag[]" value="{{ $tag->id }}"
                                                            {{ in_array($tag->id, $tagIds) ? 'checked' : '' }}>
                                                    {{ $tag->name }}
                                                </label>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                                <div class="btn-filter-group">
                                    <button type="button" class="close-filter">Đóng</button>
                                    <button type="button" class="save-filter">Xem kết quả</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="filter-active" class="mt-2"></div>
                </form>
            </div>
            <div id="productList">
                <div class="row row-cols-md-3 row-cols-xl-5 row-cols-lg-4">
                    @foreach($products as $p)
                        <div class="col prd-col">
                            <div class="product-item">
                                @if($p->oldPrice && $p->price && ($p->price < $p->oldPrice))
                                    @php
                                        $discountPercent = round((($p->oldPrice - $p->price) / $p->oldPrice) * 100, 2);
                                    @endphp
                                    <div class="sale-label"
                                         style="background-image: url(./assets/images/sale-label.svg);">
                                        <span class="sale-label-detail">Giảm {{ $discountPercent }}%</span>
                                    </div>
                                @endif

                                <div class="product-item-image">
                                    <a href="#">
                                        <picture>
                                            <source class="imglarge"
                                                    data-srcset="{{ asset($p->image) }}"
                                                    srcset="{{ asset($p->image) }}">
                                            <source class="imgsmall"
                                                    data-srcset="{{ asset($p->image) }}"
                                                    srcset="{{ asset($p->image) }}">
                                            <img alt="{{ $p->name }}"
                                                 class="img_thumb_product lazyloaded"
                                                 width="268"
                                                 height="401"
                                                 src="{{ $p->image ? asset($p->image) : 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC' }}">
                                        </picture>
                                    </a>
                                </div>
                                <div class="prd-item-content">
                                    <a href="{{ asset('prd/' . $p->slug) }}">
                                        <h3 class="prd-name">{{ $p->name }}</h3>
                                        <div class="prd-price">
                                            <span class="prd-pre-price">{{ \App\Helpers\AppFormat::toNumber($p->price) }}đ</span>
                                            @if($p->oldPrice)
                                                <del
                                                        class="prd-old-price">{{ \App\Helpers\AppFormat::toNumber($p->oldPrice)}}
                                                    đ
                                                </del>
                                            @endif
                                        </div>
                                        <div class="prd-rate">
                                            <span><span>4/5</span><i class="fa-solid fa-star"></i></span>
                                            <span class="total-rate">(527)</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $products->links() }}

                <div class="loadMore-box">
                    <button href="#" id="loadMore">Xem thêm</button>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('assets/js/category.js') }}"></script>
@endsection
