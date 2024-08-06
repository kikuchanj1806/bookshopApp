@extends('website.layouts.app')

@section('title', 'Home Page')

@section('content')
    <section id="hp-slide">
        <div class="hp-slide-inner">
            <div id="mainSlide">
                @foreach($bannerHomePage as $b)
                    <div class="slideItem">
                        <a target="_blank" href="{{ asset($b->image) }}">
                            <img src="{{ asset($b->image) }}" alt="{{ $b->title }}">
                        </a>
                    </div>
                @endforeach
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
                </div>

                <div class="hp-hotsale-content tab-content" id="hp-hotsale-content">
                    <div class="hotsale-productList">
                        <div class="productList-slide">
                            @foreach($homeProducts as $p)
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
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($newProducts)
        <section class="hp-prdList">
            <div class="container">
                <h2 class="hp-heading">Sản phẩm mới</h2>
                <div class="hp-prdList-inner">
                    <div class="productList-slide">
                        @foreach($newProducts as $p)
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
                    <div class="viewmore">
                        <a href="#">Xem tất cả <i class="fa-light fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if($hotProducts)
        <section class="hp-prdList">
            <div class="container">
                <h2 class="hp-heading">Sản phẩm hot</h2>
                <div class="hp-prdList-inner">
                    <div class="productList-slide">
                        @foreach($hotProducts as $p)
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
                    <div class="viewmore">
                        <a href="#">Xem tất cả <i class="fa-light fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if($categoriesWithProducts)
        @foreach ($categoriesWithProducts as $category)
            <section class="hp-prdList">
                <div class="container">
                    <h2 class="hp-heading">{{ $category->name }}</h2>
                    <div class="hp-prdList-inner">
                        <div class="productList-slide">
                            @foreach ($category->products as $p)
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
                        <div class="viewmore">
                            <a href="{{ asset($category->slug) }}">Xem tất cả <i
                                        class="fa-light fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </section>
            </
        @endforeach
    @endif

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

    <script src="{{ asset('assets/js/index.js') }}"></script>
@endsection
