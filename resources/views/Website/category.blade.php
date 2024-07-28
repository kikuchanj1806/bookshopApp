
@extends('Website.layouts.app')

@section('title', 'Category Page')

@section('content')
    <section id="breadcrum">
        <div class="container">
            <ul>
                <li><a href="#"><i class="fa-solid fa-house"></i>Trang chủ</a></li>
                <li><span>Sách toán</span></li>
            </ul>
        </div>
    </section>

    <section class="category-heading" style="background-image: url(./assets/images/cat-banner.jpg);">
        <div class="container">
            <div class="category-heading-inner">
                <h1 class="category-title">Sách toán</h1>
                <p class="category-des">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Iusto itaque veritatis voluptas minus, quam rem assumenda enim aliquid excepturi
                    laborum magni nam officiis fugit fuga totam commodi eius?</p>
            </div>

        </div>
    </section>

    <section id="categoryProductList">
        <div class="container">
            <div id="filter">
                <h2 class="filter-title">Chọn theo tiêu chí</h2>
                <div id="filterModule">
                    <div class="filter-wrapper">
                        <button class="filter-btn button__filter-parent"><span class="fiter-name">Lớp học</span><i class="fa-regular fa-chevron-down"></i></button>
                        <div class="list-filter-child">
                            <ul>
                                <li><button class="filter-btn button__filter-child">Lớp 1</button></li>
                                <li><button class="filter-btn button__filter-child">Lớp 2</button></li>
                                <li><button class="filter-btn button__filter-child">Lớp 3</button></li>
                                <li><button class="filter-btn button__filter-child">Lớp 4</button></li>
                                <li><button class="filter-btn button__filter-child">Lớp 5</button></li>
                                <li><button class="filter-btn button__filter-child">Lớp 6</button></li>
                                <li><button class="filter-btn button__filter-child">Lớp 7</button></li>
                                <li><button class="filter-btn button__filter-child">Lớp 8</button></li>
                                <li><button class="filter-btn button__filter-child">Lớp 9</button></li>
                                <li><button class="filter-btn button__filter-child">Lớp 10</button></li>
                                <li><button class="filter-btn button__filter-child">Lớp 11</button></li>
                                <li><button class="filter-btn button__filter-child">Lớp 12</button></li>
                            </ul>
                            <div class="btn-filter-group">
                                <button class="close-fitler">Đóng</button>
                                <button class="save-fitler">Xem kết quả</button>
                            </div>
                        </div>
                    </div>
                    <div class="filter-wrapper">
                        <button class="filter-btn button__filter-parent"><span class="fiter-name">Môn học</span><i class="fa-regular fa-chevron-down"></i></button>
                        <div class="list-filter-child">
                            <ul>
                                <li><button class="filter-btn button__filter-child">Môn văn</button></li>
                                <li><button class="filter-btn button__filter-child">Môn toán</button></li>
                                <li><button class="filter-btn button__filter-child">Môn địa lý</button></li>
                                <li><button class="filter-btn button__filter-child">Môn lịch sử</button></li>
                            </ul>
                            <div class="btn-filter-group">
                                <button class="close-fitler">Đóng</button>
                                <button class="save-fitler">Xem kết quả</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="filter-active"></div>
            </div>
            <div id="productList">
                <div class="row row-cols-md-3 row-cols-xl-5 row-cols-lg-4">
                    @foreach($products as $p)
                    <div class="col prd-col">
                        <div class="product-item">
                            <div class="sale-label" style="background-image: url(./assets/images/sale-label.svg);">
                                <span class="sale-label-detail">Giảm 37%</span>
                            </div>
                            <div class="product-item-image">
                                <a href="./detail">
                                    <img src="{{ asset($p->image) }}" alt="product image">
                                </a>
                            </div>
                            <div class="prd-item-content">
                                <a href="./detail">
                                    <h3 class="prd-name">
                                        {{ $p->name }}
                                    </h3>
                                    <div class="prd-price">
                                        <span class="prd-pre-price">{{ $p->price }}</span>
                                        <del class="prd-old-price">{{ $p->oldPrice }}</del>
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
