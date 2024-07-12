
@extends('Website.layouts.app')

@section('title', 'Home Page')

@section('content')
    <section id="hp-slide">
        <div class="container">
            <div class="hp-slide-inner">
                <div id="mainSlide">
                    <div class="slideItem">
                        <a target="_blank" href="https://toshiko.vn/">
                            <img src="./assets/images/sld1.jpg" alt="first slide image">
                        </a>
                    </div>
                    <div class="slideItem">
                        <a target="_blank" href="#">
                            <img src="./assets/images/sld2.png" alt="second slide image">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="hp-bottomSlide">
        <div class="container">
            <div class="hp-bottomSlide-inner">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                        <div class="bs-item">
                            <a href="#">
                                <div class="bs-image">
                                    <img src="https://dummyimage.com/100x100/000/fff" alt="bs-image">
                                </div>
                                <span class="bs-title">
                                    Ghế Massage chỉ từ 7.000.000đ
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                        <div class="bs-item">
                            <a href="#">
                                <div class="bs-image">
                                    <img src="https://dummyimage.com/100x100/000/fff" alt="bs-image">
                                </div>
                                <span class="bs-title">
                                    Hàng cao cấp
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                        <div class="bs-item">
                            <a href="#">
                                <div class="bs-image">
                                    <img src="https://dummyimage.com/100x100/000/fff" alt="bs-image">
                                </div>
                                <span class="bs-title">
                                    Máy chạy bộ chỉ từ 4.999.000
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                        <div class="bs-item">
                            <a href="#">
                                <div class="bs-image">
                                    <img src="https://dummyimage.com/100x100/000/fff" alt="bs-image">
                                </div>
                                <span class="bs-title">
                                    Ghế Massage chỉ từ 7.000.000đ
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="hp-hotsale">
        <div class="container">
            <div class="hp-hotsale-inner">
                <div class="hp-hotsale-title">
                    <div class="hp-hotsale-title-left">
                        <h1>Hot sale</h1>
                        <div id="countdown">
                            <p>Kết thúc sau:</p>
                            <ul>
                                <li><span id="days"></span></li>
                                <span>:</span>
                                <li><span id="hours"></span></li>
                                <span>:</span>
                                <li><span id="minutes"></span></li>
                                <span>:</span>
                                <li><span id="seconds"></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="hp-hotsale-title-right">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="hotsale-title-1" data-bs-toggle="pill" data-bs-target="#hotsale-tab-1" type="button" role="tab" aria-selected="true">Ghế massage</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="hotsale-title-2" data-bs-toggle="pill" data-bs-target="#hotsale-tab-2" type="button" role="tab" aria-selected="false">Xe đạp tập</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="hotsale-title-3" data-bs-toggle="pill" data-bs-target="#hotsale-tab-3" type="button" role="tab" aria-selected="false">Máy chạy bộ</button>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="hp-hotsale-content tab-content" id="hp-hotsale-content">
                    <div class="tab-pane fade show active" id="hotsale-tab-1" role="tabpanel" aria-labelledby="hotsale-tab-1">
                        <div class="hotsale-productList">
                            <div class="productList-slide">
                                <?php
                                for ($i = 0; $i < 10; $i++) {
                                    ?>
                                <div class="col prd-col">
                                    <div class="product-item">
                                        <div class="sale-label" style="background-image: url(./assets/images/sale-label.svg);">
                                            <span class="sale-label-detail">Giảm 37%</span>
                                        </div>
                                        <div class="product-item-image">
                                            <a href="./detail.php">
                                                <img src="./assets/images/prd.png" alt="product image">
                                            </a>
                                        </div>
                                        <div class="prd-item-content">
                                            <a href="./detail.php">
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
                                                <div class="prd-compare">
                                                    <a href="#"><i class="fa-regular fa-circle-plus"></i>So sánh</a>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="hotsale-tab-2" role="tabpanel" aria-labelledby="hotsale-tab-2">
                        <div class="hotsale-productList">
                            <div class="productList-slide">
                                <?php
                                for ($i = 0; $i < 10; $i++) {
                                    ?>
                                <div class="col prd-col">
                                    <div class="product-item">
                                        <div class="sale-label" style="background-image: url(./assets/images/sale-label.svg);">
                                            <span class="sale-label-detail">Giảm 37%</span>
                                        </div>
                                        <div class="product-item-image">
                                            <a href="./detail.php">
                                                <img src="./assets/images/prd.png" alt="product image">
                                            </a>
                                        </div>
                                        <div class="prd-item-content">
                                            <a href="#">
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
                                                <div class="prd-compare">
                                                    <a href="#"><i class="fa-regular fa-circle-plus"></i>So sánh</a>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="hotsale-tab-3" role="tabpanel" aria-labelledby="hotsale-tab-3">
                        <div class="hotsale-productList">
                            <div class="productList-slide">
                                <?php
                                for ($i = 0; $i < 10; $i++) {
                                    ?>
                                <div class="col prd-col">
                                    <div class="product-item">
                                        <div class="sale-label" style="background-image: url(./assets/images/sale-label.svg);">
                                            <span class="sale-label-detail">Giảm 37%</span>
                                        </div>
                                        <div class="product-item-image">
                                            <a href="./detail.php">
                                                <img src="./assets/images/prd.png" alt="product image">
                                            </a>
                                        </div>
                                        <div class="prd-item-content">
                                            <a href="./detail.php">
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
                                                <div class="prd-compare">
                                                    <a href="#"><i class="fa-regular fa-circle-plus"></i>So sánh</a>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <section class="hp-prdList">
        <div class="container">
            <h2 class="hp-heading">Ghế massage</h2>
            <div class="hp-prdList-inner">
                <div class="productList-slide">
                    <?php
                    for ($i = 0; $i < 10; $i++) {
                        ?>
                    <div class="col prd-col">
                        <div class="product-item">
                            <div class="sale-label" style="background-image: url(./assets/images/sale-label.svg);">
                                <span class="sale-label-detail">Giảm 37%</span>
                            </div>
                            <div class="product-item-image">
                                <a href="#">
                                    <img src="./assets/images/prd.png" alt="product image">
                                </a>
                            </div>
                            <div class="prd-item-content">
                                <a href="#">
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
                                    <div class="prd-compare">
                                        <a href="#"><i class="fa-regular fa-circle-plus"></i>So sánh</a>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                        <?php
                    }
                    ?>
                </div>
                <div class="viewmore">
                    <a href="#">Xem tất cả Máy Massage <i class="fa-light fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <section class="hp-prdList">
        <div class="container">
            <h2 class="hp-heading">Ghế massage</h2>
            <div class="hp-prdList-inner">
                <div class="productList-slide">
                    <?php
                    for ($i = 0; $i < 10; $i++) {
                        ?>
                    <div class="col prd-col">
                        <div class="product-item">
                            <div class="sale-label" style="background-image: url(./assets/images/sale-label.svg);">
                                <span class="sale-label-detail">Giảm 37%</span>
                            </div>
                            <div class="product-item-image">
                                <a href="#">
                                    <img src="./assets/images/prd.png" alt="product image">
                                </a>
                            </div>
                            <div class="prd-item-content">
                                <a href="#">
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
                                    <div class="prd-compare">
                                        <a href="#"><i class="fa-regular fa-circle-plus"></i>So sánh</a>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                        <?php
                    }
                    ?>
                </div>
                <div class="viewmore">
                    <a href="#">Xem tất cả Máy Massage <i class="fa-light fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <section class="hp-prdList">
        <div class="container">
            <h2 class="hp-heading">Ghế massage</h2>
            <div class="hp-prdList-inner">
                <div class="productList-slide">
                    <?php
                    for ($i = 0; $i < 10; $i++) {
                        ?>
                    <div class="col prd-col">
                        <div class="product-item">
                            <div class="sale-label" style="background-image: url(./assets/images/sale-label.svg);">
                                <span class="sale-label-detail">Giảm 37%</span>
                            </div>
                            <div class="product-item-image">
                                <a href="#">
                                    <img src="./assets/images/prd.png" alt="product image">
                                </a>
                            </div>
                            <div class="prd-item-content">
                                <a href="#">
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
                                    <div class="prd-compare">
                                        <a href="#"><i class="fa-regular fa-circle-plus"></i>So sánh</a>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                        <?php
                    }
                    ?>
                </div>
                <div class="viewmore">
                    <a href="#">Xem tất cả Máy Massage <i class="fa-light fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <section id="hp-aboutUs" style="background-image: url('./assets/images/aboutUs-bg.webp')">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 col-12">
                    <div class="hp-aboutus-head">
                        <h1>Toshiko thương hiệu nổi tiếng Châu Á</h1>
                        <p>
                            Hiểu được tầm quan trọng của sức khỏe, Toshiko Việt Nam muốn cùng
                            bạn tạo ra giá trị bền vững. Các sản phẩm của Toshiko đều tập trung
                            vào chất lượng sản phẩm, lấy khách hàng là yếu tố cốt lõi để phát
                            triển. Những chính sách hậu mãi cũng là điều Toshiko chú trọng để
                            khách hàng luôn cảm thấy yên tâm, thoải mái.
                        </p>
                    </div>
                </div>
            </div>

            <div class="hp-aboutus-content">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="aboutus-item">
                            <div class="abu-item-img">
                                <img src="./assets/images/free-delivery.png.webp" alt="aboutUs image">
                            </div>
                            <div class="abu-item-content">
                                <h4>Miễn phí vận chuyển</h4>
                                <p>Freeship toàn quốc</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="aboutus-item">
                            <div class="abu-item-img">
                                <img src="./assets/images/icon-3.png.webp" alt="aboutUs image">
                            </div>
                            <div class="abu-item-content">
                                <h4>Bảo hành tới 6 năm</h4>
                                <p>Cam kết hàng chính hãng</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="aboutus-item">
                            <div class="abu-item-img">
                                <img src="./assets/images/icon-3.png.webp" alt="aboutUs image">
                            </div>
                            <div class="abu-item-content">
                                <h4>Tư vấn tận tâm, chu đáo</h4>
                                <p>Trực tuyến 24/7</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="aboutus-item">
                            <div class="abu-item-img">
                                <img src="./assets/images/icon-4.png.webp" alt="aboutUs image">
                            </div>
                            <div class="abu-item-content">
                                <h4>Bảo hành nhanh chóng</h4>
                                <p>Hỗ trợ kỹ thuật, xử lý tại nhà</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id='hp-customer'>
        <div class="container">
            <h1 class="hp-heading">Khách hàng tin dùng</h1>
            <div class="hp-customer-inner">
                <div class="hp-customer-list">
                    <div class="hc-item">
                        <img src="https://dummyimage.com/400x250/000/fff" alt="customer image">
                    </div>
                    <div class="hc-item">
                        <img src="https://dummyimage.com/400x250/000/fff" alt="customer image">
                    </div>
                    <div class="hc-item">
                        <img src="https://dummyimage.com/400x250/000/fff" alt="customer image">
                    </div>
                    <div class="hc-item">
                        <img src="https://dummyimage.com/400x250/000/fff" alt="customer image">
                    </div>
                    <div class="hc-item">
                        <img src="https://dummyimage.com/400x250/000/fff" alt="customer image">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="hp-partner">
        <div class="container">
            <h1 class="hp-heading">Đối tác của Toshiko</h1>
            <div class="hp-partner-inner">
                <div class="hp-partner-list">
                    <div class="hp-item">
                        <img src="./assets/images/pn1.webp" alt="partner image">
                    </div>
                    <div class="hp-item">
                        <img src="./assets/images/pn2.webp" alt="partner image">
                    </div>
                    <div class="hp-item">
                        <img src="./assets/images/pn1.webp" alt="partner image">
                    </div>
                    <div class="hp-item">
                        <img src="./assets/images/pn2.webp" alt="partner image">
                    </div>
                    <div class="hp-item">
                        <img src="./assets/images/pn1.webp" alt="partner image">
                    </div>
                    <div class="hp-item">
                        <img src="./assets/images/pn2.webp" alt="partner image">
                    </div>
                    <div class="hp-item">
                        <img src="./assets/images/pn1.webp" alt="partner image">
                    </div>
                    <div class="hp-item">
                        <img src="./assets/images/pn2.webp" alt="partner image">
                    </div>
                    <div class="hp-item">
                        <img src="./assets/images/pn1.webp" alt="partner image">
                    </div>
                    <div class="hp-item">
                        <img src="./assets/images/pn2.webp" alt="partner image">
                    </div>
                    <div class="hp-item">
                        <img src="./assets/images/pn1.webp" alt="partner image">
                    </div>
                    <div class="hp-item">
                        <img src="./assets/images/pn2.webp" alt="partner image">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="hp-newpapper">
        <div class="container">
            <h1 class="hp-heading">truyền thông nói về Toshiko</h1>
            <div class="hp-newpapper-inner">
                <div class="hp-newpapper-list">
                    <div class="np-item">
                        <a href="#">
                            <img src="./assets/images/pp1.webp" alt="newpapper image">
                        </a>
                    </div>
                    <div class="np-item">
                        <a href="#">
                            <img src="./assets/images/pp2.webp" alt="newpapper image">
                        </a>
                    </div>
                    <div class="np-item">
                        <a href="#">
                            <img src="./assets/images/pp1.webp" alt="newpapper image">
                        </a>
                    </div>
                    <div class="np-item">
                        <a href="#">
                            <img src="./assets/images/pp2.webp" alt="newpapper image">
                        </a>
                    </div>
                    <div class="np-item">
                        <a href="#">
                            <img src="./assets/images/pp1.webp" alt="newpapper image">
                        </a>
                    </div>
                    <div class="np-item">
                        <a href="#">
                            <img src="./assets/images/pp2.webp" alt="newpapper image">
                        </a>
                    </div>
                    <div class="np-item">
                        <a href="#">
                            <img src="./assets/images/pp1.webp" alt="newpapper image">
                        </a>
                    </div>
                    <div class="np-item">
                        <a href="#">
                            <img src="./assets/images/pp2.webp" alt="newpapper image">
                        </a>
                    </div>
                    <div class="np-item">
                        <a href="#">
                            <img src="./assets/images/pp1.webp" alt="newpapper image">
                        </a>
                    </div>
                    <div class="np-item">
                        <a href="#">
                            <img src="./assets/images/pp2.webp" alt="newpapper image">
                        </a>
                    </div>
                    <div class="np-item">
                        <a href="#">
                            <img src="./assets/images/pp1.webp" alt="newpapper image">
                        </a>
                    </div>
                    <div class="np-item">
                        <a href="#">
                            <img src="./assets/images/pp2.webp" alt="newpapper image">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
