@extends('website.layouts.app')

@section('title', 'Card Page')

@section('content')
    <section class="cart-wrap">
        <div class="container">
            <div class="cart-inner">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-8 col-12">
                        <div class="cart-box-inner">
                            <div class="cartbox-title">
                                <a href="#"><i class="fa-regular fa-angle-left"></i>Mua thêm sản phẩm khác</a>
                                <p>Giỏ hàng của bạn</p>
                            </div>
                            <form id="cart-form" method="POST" action="">
                                <div class="product-cart-list">
                                    @forelse($cart as $product)
                                        <div class="cart-product" data-id="{{ $product['id'] }}">
                                            <div class="cp-left">
                                                <div class="cp-img">
                                                    <img loading="lazy"
                                                         src="{{ asset($product['image'] ?? 'default-image.jpg') }}"
                                                         alt="cart product image">
                                                </div>
                                                <p class="cp-delete" data-value="{{ $product['id'] }}">
                                                    <i class="fa-regular fa-circle-xmark"></i> Xóa
                                                </p>
                                            </div>
                                            <input type="hidden" name="option" value="[]">
                                            <div class="cp-right">
                                                <div class="cp-right-top">
                                                    <a href="#" class="cp-name">{{ $product['name'] }}</a>
                                                    <div class="cp-price">
                                                        <span class="cp-present-price">
                            {{ number_format($product['price'], 0, ',', '.') }}đ
                        </span>
                                                    </div>
                                                </div>
                                                <div class="cp-right-bottom">
                                                    <div class="qty-input">
                                                        <button class="qty-count qty-count--minus" type="button"
                                                                data-value="{{ $product['id'] }}" data-action="minus">-
                                                        </button>
                                                        <input class="product-qty" type="number" name="product-qty"
                                                               min="0" max="100" value="{{ $product['quantity'] }}"
                                                               data-value="{{ $product['id'] }}">
                                                        <button class="qty-count qty-count--add" type="button"
                                                                data-value="{{ $product['id'] }}" data-action="add">+
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p>Giỏ hàng của bạn đang trống.</p>
                                    @endforelse

                                    <div class="provisional-cart">
                                        <span>Tạm tính ({{ count($cart) }} sản phẩm):</span>
                                        <span class="provisional-price">
                                            {{ number_format(array_sum(array_map(function($product) {
                                            return $product['price'] * $product['quantity'];
                                                }, $cart)), 0, ',', '.') }}đ
                                        </span>
                                    </div>
                                </div>
                                <div class="customer-info">
                                    <h3 class="customer-info-title">Thông tin khách hàng</h3>
                                    <div class="customer-contact">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName"
                                                   placeholder="Họ và tên" name="name">
                                            <label for="floatingName">Họ và tên</label>
                                        </div>
                                        <div class="form-floating">
                                            <input type="number" class="form-control" id="floatingNumber"
                                                   placeholder="Số điện thoại" name="phone">
                                            <label for="floatingNumber">Số điện thoại</label>
                                        </div>
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="floatingEmail"
                                                   placeholder="Email" name="email">
                                            <label for="floatingEmail">Email</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="choose-receiving">
                                    <h3 class="choose-receiving-title">Chọn cách thức nhận hàng</h3>
                                    <ul class="nav nav-tabs" id="receivingTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="shipping-tab" data-bs-toggle="tab"
                                                    data-bs-target="#shipping-tab-pane" type="button" role="tab"
                                                    aria-controls="shipping-tab-pane" aria-selected="true">
                                                Giao tận nơi
                                            </button>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="shipping-tab-pane" role="tabpanel"
                                             aria-labelledby="shipping-tab" tabindex="0">
                                            <p>Chọn địa chỉ để biết thời gian nhận hàng và phí vận chuyển (nếu có)</p>
                                            <div class="address-box">
                                                <select class="form-select js-location" id="city" data-type="1"
                                                        data-value="">
                                                    <option value="" disabled selected>Chọn Thành phố</option>
                                                </select>
                                                <select class="form-select js-location" id="district" data-type="2"
                                                        data-value="">
                                                    <option value="" disabled selected>Chọn Quận / Huyện</option>
                                                </select>
                                                <select class="form-select" id="ward" data-value="">
                                                    <option value="" disabled selected>Chọn Phường / Xã</option>
                                                </select>
                                                <input id="addressDetail" type="text" class="form-control"
                                                       placeholder="Số nhà, tên đường">
                                                <input id="address" type="hidden" name="address" value="">
                                            </div>
                                            <input id="shippingId" type="hidden" name="shipping">
                                            <div class="payment checkout-option">
                                                <p class="choose-receiving-title">Phương thức thanh toán</p>
                                                <ul>
                                                    <li data-value="1">
                                                        <span>COD (Thanh toán khi nhận hàng)</span>
                                                    </li>
                                                    <input id="paymentId" type="hidden" name="payment" value="">
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 other-requirements">
                                        <input type="text" class="form-control" name="note"
                                               placeholder="Yêu cầu khác (không bắt buộc)">
                                    </div>
                                    <div class="promotionCode">
                                        <div class="promotionCode-inner">
                                            <input name="promotion" placeholder="Mã giảm giá" class="form-control"
                                                   data-type="" data-value="" type="text" id="promotionCode">
                                            <a href="javascript:void(0)" class="checkCode">Nhập</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="cart-total">
                                    <div class="total-price">
                                        <span>Tổng tiền:</span>
                                        <span class="finalPrice">{{ number_format(array_sum(array_map(function($product) {
                                        return $product['price'] * $product['quantity'];
                                    }, $cart)), 0, ',', '.') }}đ</span>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="cartcheck"
                                               required>
                                        <label class="form-check-label" for="cartcheck">Tôi đồng ý với Chính sách xử lý
                                            dữ liệu cá nhân của Toshiko</label>
                                    </div>
                                    <button class="submitOrder" type="submit">Đặt hàng</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
