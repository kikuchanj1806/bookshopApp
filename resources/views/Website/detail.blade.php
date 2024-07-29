@extends('Website.layouts.app')

@section('title', 'Detail Page')

@section('content')

    <section id="breadcrum">
        <div class="container">
            <ul>
                <li><a href="#"><i class="fa-solid fa-house"></i>Trang chủ</a></li>
                <li><a href="#">Sách toán</a></li>
                <li><span>{{ $product->name }}</span></li>
            </ul>
        </div>
    </section>

    <section class="detail-heading-wrap">
        <div class="container">
            <div class="detail-heading-inner">
                <h1 class="prd-heading">{{ $product->name }}</h1>
                <div class="prd-heading-rate">
                    <div class="ratings">
                        <i class="fa fa-star rating-color"></i>
                        <i class="fa fa-star rating-color"></i>
                        <i class="fa fa-star rating-color"></i>
                        <i class="fa fa-star rating-color"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <span class="prd-heading-rate-label">306 đánh giá</span>
                </div>
            </div>
        </div>
    </section>

    <section class="detail-wrap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-10 col-12 detail-gallery-col">
                    <div class="detail-img-list">
                        @if($product->thumbnails)
                            @foreach($product->thumbnails as $p)
                                <div class="detail-img-item">
                                    <img src="{{ asset($p['url']) }}" alt="{{ $p['name'] }}">
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="viewmore-gallery" data-bs-toggle="modal" data-bs-target="#detailModal"
                         data-tab="nav-image-tab">Xem tất cả hình ảnh (<span class="curent-img"></span>{{ count($product->thumbnails) }}<span
                            class="total-img"></span>)
                    </div>
                    <div class="gallery-actions">
                        <div class="item-action" data-bs-toggle="modal" data-bs-target="#detailModal"
                             data-tab="nav-image-tab">
                            <div class="item-action-img">
                                <img src="./assets/images/prd.png" alt="image action">
                            </div>
                            <span>Ảnh sản phẩm</span>
                        </div>
                        <div class="item-action" data-bs-toggle="modal" data-bs-target="#detailModal"
                             data-tab="nav-specifications-tab">
                            <div class="item-action-img">
                                <img src="./assets/images/inspection.png" alt="">
                            </div>
                            <span>Thông số kỹ thuật</span>
                        </div>
                        <div class="item-action" data-bs-toggle="modal" data-bs-target="#detailModal"
                             data-tab="nav-info-tab">
                            <div class="item-action-img">
                                <img src="./assets/images/search.png" alt="">
                            </div>
                            <span>Thông tin sản phẩm</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-10 col-12 detail-action-col">
                    <div class="detail-info-inner">
                        <div class="detail-price">
                            <h2 class="detail-price-present">{{ \App\Helpers\AppFormat::toNumber($product->price) }}đ</h2>
                            @if($product->oldPrice)
                                <del class="detail-old-price">{{ \App\Helpers\AppFormat::toNumber($product->oldPrice) }}đ</del>
                            @endif
                            <p class="detail-sale-percent">(-37%)</p>
                        </div>
                        <div class="detail-box">
                            <div class="detail-sale">
                                <p class="sale-title">Khuyến mãi</p>
                                <p class="sale-des">Giá và khuyến mãi có thể kết thúc sớm hơn dự kiến</p>
                                <ul>
                                    <li><span>1</span>Lorem, ipsum dolor sit amet consectetur adipisicing,ipsum dolor
                                        sit amet consectetur adipisicing.
                                    </li>
                                    <li><span>2</span>Lorem, ipsum dolor sit amet consectetur.</li>
                                </ul>
                            </div>
                            <div class="detail-promotion">
                                <ul>
                                    <li>Lorem, ipsum dolor sit amet consectetur adipisicing.</li>
                                    <li>Lorem, ipsum dolor sit amet consectetur adipisicing.</li>
                                    <li>Lorem, ipsum dolor sit amet consectetur adipisicing.</li>
                                </ul>
                            </div>
                            <div class="detail-action">
                                <button class="buynow">Mua ngay</button>
                                <button class="addtocart">Thêm giỏ hàng</button>
                            </div>
                            <p class="call-to-buy">Gọi đặt mua <a href="tel: 0987654321">0987654321</a> (7:30 - 22:00)
                            </p>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-10 col-12">
                    <div class="detail-infomation">
                        <h2>Thông tin sản phẩm</h2>
                        <div class="detail-info-inner">
                            <div class="detail-info-content">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Rerum doloribus in necessitatibus, sequi error quod! Ea porro
                                    magnam atque minima at explicabo sapiente sequi deserunt
                                    accusantium error illum excepturi dolorum beatae perferendis
                                    dignissimos, facilis ab architecto odit animi quia harum soluta
                                    necessitatibus. Dolorem nostrum aliquam alias vel assumenda
                                    delectus libero.
                                </p>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Porro facere sint ratione quod unde! Neque dolor ab eius
                                    excepturi eum nobis vitae facilis laboriosam expedita natus
                                    vero, reiciendis totam qui distinctio corrupti dolore ea
                                    laudantium quo inventore ratione iste odio. Nisi blanditiis,
                                    harum non laudantium necessitatibus exercitationem, itaque
                                    aperiam, expedita aliquam mollitia architecto? Mollitia
                                    error ab facilis totam aut quas, non sit, hic laborum
                                    tempore deserunt sunt fugit doloribus consequuntur quos
                                    autem sint accusantium optio nulla repellat dolorum enim.
                                    Harum quasi cumque, debitis amet earum eum nulla ut beatae
                                    et atque, doloribus esse nesciunt explicabo qui molestiae.
                                    Natus, illo temporibus.
                                </p>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Rerum doloribus in necessitatibus, sequi error quod! Ea porro
                                    magnam atque minima at explicabo sapiente sequi deserunt
                                    accusantium error illum excepturi dolorum beatae perferendis
                                    dignissimos, facilis ab architecto odit animi quia harum soluta
                                    necessitatibus. Dolorem nostrum aliquam alias vel assumenda
                                    delectus libero.
                                </p>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Porro facere sint ratione quod unde! Neque dolor ab eius
                                    excepturi eum nobis vitae facilis laboriosam expedita natus
                                    vero, reiciendis totam qui distinctio corrupti dolore ea
                                    laudantium quo inventore ratione iste odio. Nisi blanditiis,
                                    harum non laudantium necessitatibus exercitationem, itaque
                                    aperiam, expedita aliquam mollitia architecto? Mollitia
                                    error ab facilis totam aut quas, non sit, hic laborum
                                    tempore deserunt sunt fugit doloribus consequuntur quos
                                    autem sint accusantium optio nulla repellat dolorum enim.
                                    Harum quasi cumque, debitis amet earum eum nulla ut beatae
                                    et atque, doloribus esse nesciunt explicabo qui molestiae.
                                    Natus, illo temporibus.
                                </p>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Rerum doloribus in necessitatibus, sequi error quod! Ea porro
                                    magnam atque minima at explicabo sapiente sequi deserunt
                                    accusantium error illum excepturi dolorum beatae perferendis
                                    dignissimos, facilis ab architecto odit animi quia harum soluta
                                    necessitatibus. Dolorem nostrum aliquam alias vel assumenda
                                    delectus libero.
                                </p>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Porro facere sint ratione quod unde! Neque dolor ab eius
                                    excepturi eum nobis vitae facilis laboriosam expedita natus
                                    vero, reiciendis totam qui distinctio corrupti dolore ea
                                    laudantium quo inventore ratione iste odio. Nisi blanditiis,
                                    harum non laudantium necessitatibus exercitationem, itaque
                                    aperiam, expedita aliquam mollitia architecto? Mollitia
                                    error ab facilis totam aut quas, non sit, hic laborum
                                    tempore deserunt sunt fugit doloribus consequuntur quos
                                    autem sint accusantium optio nulla repellat dolorum enim.
                                    Harum quasi cumque, debitis amet earum eum nulla ut beatae
                                    et atque, doloribus esse nesciunt explicabo qui molestiae.
                                    Natus, illo temporibus.
                                </p>
                            </div>
                            <div class="seemore-box">
                                <button class="seemore seemore-info">
                                    <span class="open">Xem thêm</span>
                                    <span class="close">Thu gọn</span>
                                    <i class="fa-regular fa-chevron-down"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="detail-rating">
                        <h2>Đánh giá & nhận xét Chính Sách Tiền Tệ Thế Kỷ 21                          </h2>
                        <div class="boxReview-review">
                            <div class="boxReview-score">
                                <p class="title">4.5/5</p>
                                <div class="item-star">
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                </div>
                                <p class="boxReview-score__count">6 đánh giá</p>
                            </div>
                            <div class="boxReview-star">
                                <div class="rating-level">
                                    <div class="star-count">
                                        <span>5</span>
                                        <i class="fa fa-star rating-color"></i>
                                    </div>
                                    <progress max="6" class="progress" value="3"></progress>
                                    <span>4 đánh giá</span>
                                </div>
                                <div class="rating-level">
                                    <div class="star-count">
                                        <span>4</span>
                                        <i class="fa fa-star rating-color"></i>
                                    </div>
                                    <progress max="6" class="progress" value="3"></progress>
                                    <span>4 đánh giá</span>
                                </div>
                                <div class="rating-level">
                                    <div class="star-count">
                                        <span>3</span>
                                        <i class="fa fa-star rating-color"></i>
                                    </div>
                                    <progress max="6" class="progress" value="3"></progress>
                                    <span>4 đánh giá</span>
                                </div>
                                <div class="rating-level">
                                    <div class="star-count">
                                        <span>2</span>
                                        <i class="fa fa-star rating-color"></i>
                                    </div>

                                    <progress max="6" class="progress" value="3"></progress>
                                    <span>4 đánh giá</span>
                                </div>
                                <div class="rating-level">
                                    <div class="star-count">
                                        <span>1</span>
                                        <i class="fa fa-star rating-color"></i>
                                    </div>

                                    <progress max="6" class="progress" value="3"></progress>
                                    <span>4 đánh giá</span>
                                </div>
                            </div>
                        </div>
                        <div class="button__review-container">
                            <p>Bạn đánh giá sao về sản phẩm này?</p>
                            <button class="button__review" data-bs-toggle="modal" data-bs-target="#ratingModal">Đánh giá
                                ngay
                            </button>
                        </div>
                        <div class="boxReview-comment">
                            <div class="boxReview-comment-item">
                                <div class="bci-title">
                                    <div class="avt-customer"></div>
                                    <h3 class="bci-name">Nguyễn Văn A</h3>
                                    <p class="bci-time"><i class="fa-regular fa-clock"></i> 26/3/2024</p>
                                </div>
                                <div class="bci-content">
                                    <div class="item-review-rating">
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star rating-color"></i>
                                    </div>
                                    <div class="item-review-coment">Sản phẩm quá tuyệt vời</div>
                                </div>
                            </div>
                            <div class="boxReview-comment-item">
                                <div class="bci-title">
                                    <div class="avt-customer">A</div>
                                    <h3 class="bci-name">Nguyễn Văn A</h3>
                                    <p class="bci-time"><i class="fa-regular fa-clock"></i> 26/3/2024</p>
                                </div>
                                <div class="bci-content">
                                    <div class="item-review-rating">
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star rating-color"></i>
                                    </div>
                                    <div class="item-review-coment">Sản phẩm quá tuyệt vời</div>
                                </div>
                            </div>
                            <div class="boxReview-comment-item">
                                <div class="bci-title">
                                    <div class="avt-customer">A</div>
                                    <h3 class="bci-name">Nguyễn Văn A</h3>
                                    <p class="bci-time"><i class="fa-regular fa-clock"></i> 26/3/2024</p>
                                </div>
                                <div class="bci-content">
                                    <div class="item-review-rating">
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star rating-color"></i>
                                    </div>
                                    <div class="item-review-coment">Sản phẩm quá tuyệt vời</div>
                                </div>
                            </div>
                            <div class="boxReview-comment-item">
                                <div class="bci-title">
                                    <div class="avt-customer">A</div>
                                    <h3 class="bci-name">Nguyễn Văn A</h3>
                                    <p class="bci-time"><i class="fa-regular fa-clock"></i> 26/3/2024</p>
                                </div>
                                <div class="bci-content">
                                    <div class="item-review-rating">
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star rating-color"></i>
                                    </div>
                                    <div class="item-review-coment">Sản phẩm quá tuyệt vời</div>
                                </div>
                            </div>
                            <div class="boxReview-comment-item">
                                <div class="bci-title">
                                    <div class="avt-customer">A</div>
                                    <h3 class="bci-name">Nguyễn Văn A</h3>
                                    <p class="bci-time"><i class="fa-regular fa-clock"></i> 26/3/2024</p>
                                </div>
                                <div class="bci-content">
                                    <div class="item-review-rating">
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star rating-color"></i>
                                    </div>
                                    <div class="item-review-coment">Sản phẩm quá tuyệt vời</div>
                                </div>
                            </div>
                            <div class="boxReview-comment-item">
                                <div class="bci-title">
                                    <div class="avt-customer">A</div>
                                    <h3 class="bci-name">Nguyễn Văn A</h3>
                                    <p class="bci-time"><i class="fa-regular fa-clock"></i> 26/3/2024</p>
                                </div>
                                <div class="bci-content">
                                    <div class="item-review-rating">
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star rating-color"></i>
                                    </div>
                                    <div class="item-review-coment">Sản phẩm quá tuyệt vời</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-10 col-12">
                    <div class="detail-specifications">
                        <h2>Thông số Chính Sách Tiền Tệ Thế Kỷ 21</h2>
                        <ul>
                            <li>
                                <p class="left">Loại máy:</p>
                                <p class="right">Lê Bích</p>
                            </li>
                            <li>
                                <p class="left">NXB:</p>
                                <p class="right">Hà Nội</p>
                            </li>
                            <li>
                                <p class="left">Trọng lượng (gr):</p>
                                <p class="right">284</p>
                            </li>
                            <li>
                                <p class="left">Kích Thước:</p>
                                <p class="right">15 x 14 x 1.8 cm</p>
                            </li>
                            <li>
                                <p class="left">Số trang:</p>
                                <p class="right">372</p>
                            </li>
                            <li>
                                <p class="left">Hình thức:</p>
                                <p class="right">Bìa Mềm</p>
                            </li>
                        </ul>
                        <button class="viewmore-specifications" data-bs-toggle="modal" data-bs-target="#detailModal"
                                data-tab="nav-specifications-tab">Xem chi tiết thông số <i
                                class="fa-solid fa-caret-right"></i></button>
                    </div>
                    <div class="detail-blogs">
                        <h2><i class="fa-solid fa-newspaper"></i> Tin tức về sản phẩm</h2>
                        <div class="detail-blog-list">
                            <?php
                            for ($i = 0;
                                 $i < 5;
                                 $i++) {
                                ?>
                            <div class="db-item">
                                <div class="db-img">
                                    <a href="">
                                        <img src="https://dummyimage.com/300x192/000/fff" alt="blog img">
                                    </a>
                                </div>
                                <a class="db-title" href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Eos, commodi.</a>
                            </div>
                                <?php
                            }
                            ?>
                        </div>
                        <a href="#" class="db-viewmore">Xem tất cả bài viết</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="product-suggest-wrap">
        <div class="container">
            <div class="row">
                <div class="product-suggest-inner">
                    <h2>Sản phẩm tương tự</h2>
                    <div class="product-suggest-list">
                        <div class="productList-slide">
                            @foreach($relatedProducts as $p)
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
                                            <a href="{{ asset('prd/' . $p->slug) }}">
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
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- detailModal -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <button type="button" class="btn-close close-detailModal" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-regular fa-xmark"></i> Đóng
                </button>
                <div class="modal-body">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link" id="nav-image-tab" data-bs-toggle="tab" data-bs-target="#nav-image"
                                    type="button" role="tab" aria-controls="nav-image" aria-selected="true">Ảnh sản phẩm
                            </button>
                            <button class="nav-link" id="nav-specifications-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-specifications" type="button" role="tab"
                                    aria-controls="nav-specifications" aria-selected="false">Thông số kỹ thuật
                            </button>
                            <button class="nav-link" id="nav-info-tab" data-bs-toggle="tab" data-bs-target="#nav-info"
                                    type="button" role="tab" aria-controls="nav-info" aria-selected="false">Thông tin
                                sản phẩm
                            </button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade" id="nav-image" role="tabpanel" aria-labelledby="nav-image-tab">
                            <div class="container-fluid">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8 col-md-10 col-12">
                                        <div class="detailModal-img-list">
                                            @if($product->thumbnails)
                                                @foreach($product->thumbnails as $p)
                                                    <div class="detail-img-item">
                                                        <img src="{{ asset($p['url']) }}" alt="{{ $p['name'] }}">
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="detailModal-thumb-list">
                                            @if($product->thumbnails)
                                                @foreach($product->thumbnails as $p)
                                                    <div class="detail-img-item">
                                                        <img src="{{ asset($p['url']) }}" alt="{{ $p['name'] }}">
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-specifications" role="tabpanel"
                             aria-labelledby="nav-specifications-tab">
                            <div class="container-fluid">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8 col-md-10 col-12">
                                        <div class="detail-specifications">
                                            <ul>
                                                <li>
                                                    <p class="left">Loại máy:</p>
                                                    <p class="right">Lê Bích</p>
                                                </li>
                                                <li>
                                                    <p class="left">NXB:</p>
                                                    <p class="right">Hà Nội</p>
                                                </li>
                                                <li>
                                                    <p class="left">Trọng lượng (gr):</p>
                                                    <p class="right">284</p>
                                                </li>
                                                <li>
                                                    <p class="left">Kích Thước:</p>
                                                    <p class="right">15 x 14 x 1.8 cm</p>
                                                </li>
                                                <li>
                                                    <p class="left">Số trang:</p>
                                                    <p class="right">372</p>
                                                </li>
                                                <li>
                                                    <p class="left">Hình thức:</p>
                                                    <p class="right">Bìa Mềm</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab">
                            <div class="container-fluid">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8 col-md-10 col-12">
                                        <div class="detailModalInfo">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                Rerum doloribus in necessitatibus, sequi error quod! Ea porro
                                                magnam atque minima at explicabo sapiente sequi deserunt
                                                accusantium error illum excepturi dolorum beatae perferendis
                                                dignissimos, facilis ab architecto odit animi quia harum soluta
                                                necessitatibus. Dolorem nostrum aliquam alias vel assumenda
                                                delectus libero.
                                            </p>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                Porro facere sint ratione quod unde! Neque dolor ab eius
                                                excepturi eum nobis vitae facilis laboriosam expedita natus
                                                vero, reiciendis totam qui distinctio corrupti dolore ea
                                                laudantium quo inventore ratione iste odio. Nisi blanditiis,
                                                harum non laudantium necessitatibus exercitationem, itaque
                                                aperiam, expedita aliquam mollitia architecto? Mollitia
                                                error ab facilis totam aut quas, non sit, hic laborum
                                                tempore deserunt sunt fugit doloribus consequuntur quos
                                                autem sint accusantium optio nulla repellat dolorum enim.
                                                Harum quasi cumque, debitis amet earum eum nulla ut beatae
                                                et atque, doloribus esse nesciunt explicabo qui molestiae.
                                                Natus, illo temporibus.
                                            </p>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                Rerum doloribus in necessitatibus, sequi error quod! Ea porro
                                                magnam atque minima at explicabo sapiente sequi deserunt
                                                accusantium error illum excepturi dolorum beatae perferendis
                                                dignissimos, facilis ab architecto odit animi quia harum soluta
                                                necessitatibus. Dolorem nostrum aliquam alias vel assumenda
                                                delectus libero.
                                            </p>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                Porro facere sint ratione quod unde! Neque dolor ab eius
                                                excepturi eum nobis vitae facilis laboriosam expedita natus
                                                vero, reiciendis totam qui distinctio corrupti dolore ea
                                                laudantium quo inventore ratione iste odio. Nisi blanditiis,
                                                harum non laudantium necessitatibus exercitationem, itaque
                                                aperiam, expedita aliquam mollitia architecto? Mollitia
                                                error ab facilis totam aut quas, non sit, hic laborum
                                                tempore deserunt sunt fugit doloribus consequuntur quos
                                                autem sint accusantium optio nulla repellat dolorum enim.
                                                Harum quasi cumque, debitis amet earum eum nulla ut beatae
                                                et atque, doloribus esse nesciunt explicabo qui molestiae.
                                                Natus, illo temporibus.
                                            </p>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                Rerum doloribus in necessitatibus, sequi error quod! Ea porro
                                                magnam atque minima at explicabo sapiente sequi deserunt
                                                accusantium error illum excepturi dolorum beatae perferendis
                                                dignissimos, facilis ab architecto odit animi quia harum soluta
                                                necessitatibus. Dolorem nostrum aliquam alias vel assumenda
                                                delectus libero.
                                            </p>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                Porro facere sint ratione quod unde! Neque dolor ab eius
                                                excepturi eum nobis vitae facilis laboriosam expedita natus
                                                vero, reiciendis totam qui distinctio corrupti dolore ea
                                                laudantium quo inventore ratione iste odio. Nisi blanditiis,
                                                harum non laudantium necessitatibus exercitationem, itaque
                                                aperiam, expedita aliquam mollitia architecto? Mollitia
                                                error ab facilis totam aut quas, non sit, hic laborum
                                                tempore deserunt sunt fugit doloribus consequuntur quos
                                                autem sint accusantium optio nulla repellat dolorum enim.
                                                Harum quasi cumque, debitis amet earum eum nulla ut beatae
                                                et atque, doloribus esse nesciunt explicabo qui molestiae.
                                                Natus, illo temporibus.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Rating Modal -->
    <div class="modal fade" id="ratingModal" tabindex="-1" aria-labelledby="ratingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ratingModalLabel">Đánh giá & Nhận xét</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa-regular fa-xmark"></i></button>
                </div>
                <div class="modal-body">
                    <h2 class="rateProduct">Chính Sách Tiền Tệ Thế Kỷ 21                          </h2>
                    <form action="" class="modal-rate-content">
                        <p>Đánh giá chung</p>
                        <div class="modal-rate-star">
                            <input type="radio" id="star5" name="rating" value="5"/><label id="label5"
                                                                                           for="star5"></label>
                            <input type="radio" id="star4" name="rating" value="4"/><label id="label4"
                                                                                           for="star4"></label>
                            <input type="radio" id="star3" name="rating" value="3"/><label id="label3"
                                                                                           for="star3"></label>
                            <input type="radio" id="star2" name="rating" value="2"/><label id="label2"
                                                                                           for="star2"></label>
                            <input type="radio" id="star1" name="rating" value="1"/><label id="label1"
                                                                                           for="star1"></label>
                        </div>
                        <textarea placeholder="Xin mời chia sẻ một số cảm nhận về sản phẩm (nhập tối thiểu 15 kí tự)"
                                  class="textarea"></textarea>
                        <div class="modal-rate-button">
                            <button type="button" class="btn btn-primary">Gửi đánh giá</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/detail.js') }}"></script>
@endsection
