
@extends('Website.layouts.app')

@section('title', 'Category Page')

@section('content')
    <section id="breadcrum">
        <div class="container">
            <ul>
                <li><a href="#"><i class="fa-solid fa-house"></i>Trang chủ</a></li>
                <li><span>Ghế Massage</span></li>
            </ul>
        </div>
    </section>

    <section class="category-heading" style="background-image: url(./assets/images/cat-banner.jpg);">
        <div class="container">
            <div class="category-heading-inner">
                <h1 class="category-title">Ghế Massage</h1>
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
                        <button class="filter-btn button__filter-parent"><i class="fa-solid fa-money-bill"></i><span class="fiter-name">Giá</span></button>
                        <div class="list-filter-child">
                            <div class="price-range-slider">
                                <p class="range-value">
                                    <input type="text" id="amount" readonly>
                                </p>
                                <div id="slider-range" class="range-bar"></div>
                            </div>
                            <div class="btn-filter-group">
                                <button class="close-fitler">Đóng</button>
                                <button class="save-fitler">Xem kết quả</button>
                            </div>
                        </div>
                    </div>
                    <div class="filter-wrapper">
                        <button class="filter-btn button__filter-parent"><span class="fiter-name">Màu sắc</span><i class="fa-regular fa-chevron-down"></i></button>
                        <div class="list-filter-child">
                            <ul>
                                <li><button class="filter-btn button__filter-child">Bạc</button></li>
                                <li><button class="filter-btn button__filter-child">Đỏ</button></li>
                                <li><button class="filter-btn button__filter-child">Đen</button></li>
                            </ul>
                            <div class="btn-filter-group">
                                <button class="close-fitler">Đóng</button>
                                <button class="save-fitler">Xem kết quả</button>
                            </div>
                        </div>
                    </div>
                    <div class="filter-wrapper">
                        <button class="filter-btn button__filter-parent"><span class="fiter-name">brand</span><i class="fa-regular fa-chevron-down"></i></button>
                        <div class="list-filter-child">
                            <ul>
                                <li><button class="filter-btn button__filter-child">brand 1</button></li>
                                <li><button class="filter-btn button__filter-child">brand 2</button></li>
                                <li><button class="filter-btn button__filter-child">brand 3</button></li>
                                <li><button class="filter-btn button__filter-child">brand 4</button></li>
                                <li><button class="filter-btn button__filter-child">brand 5</button></li>
                            </ul>
                            <div class="btn-filter-group">
                                <button class="close-fitler">Đóng</button>
                                <button class="save-fitler">Xem kết quả</button>
                            </div>
                        </div>
                    </div>
                    <div class="filter-wrapper">
                        <button class="filter-btn button__filter-parent"><span class="fiter-name">Bảo hành</span><i class="fa-regular fa-chevron-down"></i> </button>
                        <div class="list-filter-child">
                            <ul>
                                <li><button class="filter-btn button__filter-child">1 năm</button></li>
                                <li><button class="filter-btn button__filter-child">2 năm</button></li>
                                <li><button class="filter-btn button__filter-child">3 năm</button></li>
                                <li><button class="filter-btn button__filter-child">4 năm</button></li>
                                <li><button class="filter-btn button__filter-child">5 năm</button></li>
                            </ul>
                            <div class="btn-filter-group">
                                <button class="close-fitler">Đóng</button>
                                <button class="save-fitler">Xem kết quả</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="filter-active"></div>
                <h2 class="filter-title">Sắp xếp theo</h2>
                <div class="filter-sort">
                    <button class="filter-btn btn-sort"><i class="fa-solid fa-arrow-down-wide-short"></i><span>Giá Cao - Thấp</span></button>
                    <button class="filter-btn btn-sort"><i class="fa-solid fa-arrow-up-wide-short"></i><span>Giá Thấp - Cao</span></button>
                    <button class="filter-btn btn-sort"><i class="fa-solid fa-percent"></i><span>Khuyến mãi Hot</span></button>
                    <button class="filter-btn btn-sort"><i class="fa-solid fa-eye"></i><span>Xem nhiều</span></button>
                </div>
            </div>
            <div id="productList">
                <div class="row row-cols-md-3 row-cols-xl-5 row-cols-lg-4">
                    <?php
                    for ($i = 0; $i < 90; $i++) {
                        ?>
                    <div class="col prd-col">
                        <div class="product-item">
                            <div class="sale-label" style="background-image: url(./assets/images/sale-label.svg);">
                                <span class="sale-label-detail">Giảm 37%</span>
                            </div>
                            <div class="product-item-image">
                                <a href="./detail">
                                    <img src="https://toshiko.vn/storage/files/xe-dap-tap-toshiko-x9.jpg" alt="product image">
                                </a>
                            </div>
                            <div class="prd-item-content">
                                <a href="./detail">
                                    <h3 class="prd-name">Ghế massage Toshiko T70</h3>
                                    <ul class="prd-attr">
                                        <li>Công nghệ I-ON âm</li>
                                        <li>massage 4D</li>
                                    </ul>
                                    <div class="prd-price">
                                        <span class="prd-pre-price">49.000.000đ</span>
                                        <del class="prd-old-price">79.200.00đ</del>
                                    </div>
                                    <div class="prd-rate">
                                        <span><span>4/5</span><i class="fa-solid fa-star"></i></span>
                                        <span class="total-rate">(527)</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                        <?php
                    }
                    ?>
                </div>
                <div class="loadMore-box">
                    <button href="#" id="loadMore">Xem thêm</button>
                </div>
            </div>
        </div>
    </section>
@endsection
