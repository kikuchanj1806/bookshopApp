@extends('Website.layouts.app')

@section('title', 'Detail Page')

@section('content')

    <section id="breadcrum">
        <div class="container">
            <ul>
                <li><a href="#"><i class="fa-solid fa-house"></i>Trang chủ</a></li>
                <li><a href="#">Ghế Massage</a></li>
                <li><span>Ghế massage Toshiko T70</span></li>
            </ul>
        </div>
    </section>

    <section class="detail-heading-wrap">
        <div class="container">
            <div class="detail-heading-inner">
                <h1 class="prd-heading">Ghế massage Toshiko T70</h1>
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
                        <div class="detail-img-item">
                            <img src="./assets/images/dt-prd-1.jpg" alt="image product">
                        </div>
                        <div class="detail-img-item">
                            <img src="./assets/images/dt-prd-2.png" alt="image product">
                        </div>
                        <div class="detail-img-item">
                            <img src="./assets/images/dt-prd-3.jpg" alt="image product">
                        </div>
                        <div class="detail-img-item">
                            <img src="./assets/images/dt-prd-4.png" alt="image product">
                        </div>
                        <div class="detail-img-item">
                            <img src="./assets/images/dt-prd-5.jpg" alt="image product">
                        </div>
                    </div>
                    <div class="viewmore-gallery" data-bs-toggle="modal" data-bs-target="#detailModal"
                         data-tab="nav-image-tab">Xem tất cả hình ảnh (<span class="curent-img"></span>/<span
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
                            <h2 class="detail-price-present">49.000.000đ</h2>
                            <del class="detail-old-price">72.000.000đ</del>
                            <p class="detail-sale-percent">(-37%)</p>
                        </div>
                        <div class="detail-box">
                            <div class="detail-attr">
                                <div class="detail-attr-list">
                                    <a class="attr-item" href="#">A</a>
                                    <a class="attr-item" href="#">B</a>
                                    <a class="attr-item" href="#">C</a>
                                </div>
                                <div class="detail-attr-list">
                                    <a class="attr-item" href="#">Titan Đỏ</a>
                                    <a class="attr-item" href="#">Titan Đen</a>
                                    <a class="attr-item" href="#">Titan Bạc</a>
                                </div>
                            </div>
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
                        <h2>Đánh giá & nhận xét Ghế massage Toshiko T70</h2>
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
                        <h2>Thông số kỹ thuật Ghế massage Toshiko T70</h2>
                        <ul>
                            <li>
                                <p class="left">Loại máy:</p>
                                <p class="right">Lorem, ipsum.</p>
                            </li>
                            <li>
                                <p class="left">Khối lượng:</p>
                                <p class="right">Lorem, ipsum.</p>
                            </li>
                            <li>
                                <p class="left">Công nghệ:</p>
                                <p class="right">Lorem ipsum dolor sit amet.</p>
                            </li>
                            <li>
                                <p class="left">Tiện ích:</p>
                                <p class="right">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            </li>
                            <li>
                                <p class="left">Chất liệu:</p>
                                <p class="right">Lorem, ipsum.</p>
                            </li>
                            <li>
                                <p class="left">Hãng:</p>
                                <p class="right">Lorem, ipsum.</p>
                            </li>
                            <li>
                                <p class="left">Loại máy:</p>
                                <p class="right">Lorem, ipsum.</p>
                            </li>
                            <li>
                                <p class="left">Khối lượng:</p>
                                <p class="right">Lorem, ipsum.</p>
                            </li>
                            <li>
                                <p class="left">Công nghệ:</p>
                                <p class="right">Lorem ipsum dolor sit amet.</p>
                            </li>
                            <li>
                                <p class="left">Tiện ích:</p>
                                <p class="right">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            </li>
                            <li>
                                <p class="left">Chất liệu:</p>
                                <p class="right">Lorem, ipsum.</p>
                            </li>
                            <li>
                                <p class="left">Hãng:</p>
                                <p class="right">Lorem, ipsum.</p>
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
                            <?php
                            for ($i = 0;
                                 $i < 10;
                                 $i++) {
                                ?>
                            <div class="col prd-col">
                                <div class="product-item">
                                    <div class="sale-label"
                                         style="background-image: url(./assets/images/sale-label.svg);">
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
                                            <div class="detail-img-item">
                                                <img src="./assets/images/dt-prd-1.jpg" alt="image product">
                                            </div>
                                            <div class="detail-img-item">
                                                <img src="./assets/images/dt-prd-2.png" alt="image product">
                                            </div>
                                            <div class="detail-img-item">
                                                <img src="./assets/images/dt-prd-3.jpg" alt="image product">
                                            </div>
                                            <div class="detail-img-item">
                                                <img src="./assets/images/dt-prd-4.png" alt="image product">
                                            </div>
                                            <div class="detail-img-item">
                                                <img src="./assets/images/dt-prd-5.jpg" alt="image product">
                                            </div>
                                        </div>
                                        <div class="detailModal-thumb-list">
                                            <div class="detail-thumb-item">
                                                <img src="./assets/images/dt-prd-1.jpg" alt="image product">
                                            </div>
                                            <div class="detail-thumb-item">
                                                <img src="./assets/images/dt-prd-2.png" alt="image product">
                                            </div>
                                            <div class="detail-thumb-item">
                                                <img src="./assets/images/dt-prd-3.jpg" alt="image product">
                                            </div>
                                            <div class="detail-thumb-item">
                                                <img src="./assets/images/dt-prd-4.png" alt="image product">
                                            </div>
                                            <div class="detail-thumb-item">
                                                <img src="./assets/images/dt-prd-5.jpg" alt="image product">
                                            </div>
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
                                                    <p class="right">Lorem, ipsum.</p>
                                                </li>
                                                <li>
                                                    <p class="left">Khối lượng:</p>
                                                    <p class="right">Lorem, ipsum.</p>
                                                </li>
                                                <li>
                                                    <p class="left">Công nghệ:</p>
                                                    <p class="right">Lorem ipsum dolor sit amet.</p>
                                                </li>
                                                <li>
                                                    <p class="left">Tiện ích:</p>
                                                    <p class="right">Lorem ipsum dolor sit amet consectetur adipisicing
                                                        elit.</p>
                                                </li>
                                                <li>
                                                    <p class="left">Chất liệu:</p>
                                                    <p class="right">Lorem, ipsum.</p>
                                                </li>
                                                <li>
                                                    <p class="left">Hãng:</p>
                                                    <p class="right">Lorem, ipsum.</p>
                                                </li>
                                                <li>
                                                    <p class="left">Loại máy:</p>
                                                    <p class="right">Lorem, ipsum.</p>
                                                </li>
                                                <li>
                                                    <p class="left">Khối lượng:</p>
                                                    <p class="right">Lorem, ipsum.</p>
                                                </li>
                                                <li>
                                                    <p class="left">Công nghệ:</p>
                                                    <p class="right">Lorem ipsum dolor sit amet.</p>
                                                </li>
                                                <li>
                                                    <p class="left">Tiện ích:</p>
                                                    <p class="right">Lorem ipsum dolor sit amet consectetur adipisicing
                                                        elit.</p>
                                                </li>
                                                <li>
                                                    <p class="left">Chất liệu:</p>
                                                    <p class="right">Lorem, ipsum.</p>
                                                </li>
                                                <li>
                                                    <p class="left">Hãng:</p>
                                                    <p class="right">Lorem, ipsum.</p>
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
                    <h2 class="rateProduct">Ghế massage Toshiko T70</h2>
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

@endsection
