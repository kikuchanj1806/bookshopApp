@extends('Website.layouts.app')

@section('title', 'Card Page')

@section('content')
    <section class="middle-cart-wrap">
        <div class="container">
            <div class="cart-inner">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-8 col-12">
                        <div class="middle-cart-inner">
                            <div class="middle-cart-title">
                                <h1><i class="fa-sharp fa-regular fa-bags-shopping"></i> đặt hàng thành công</h1>
                            </div>

                            <div class="middle-cart-content">

                                <div class="info-order">
                                    <div class="info-order-head">
                                        <p>Đơn hàng: <span>OR-0079369715</span></p>
                                    </div>
                                    <ul>
                                        <li><span>Người nhận hàng:</span> long, 0992973487</li>
                                        <li><span>Giao đến:</span> 565 Nguyễn Trãi, P.Thanh Xuân Nam, Q.Thanh Xuân, Hà
                                            Nội
                                        </li>
                                        <li><span>Tổng tiền:</span> 12,999,000đ</li>
                                        <li class="payment-order">
                                            <span>Chuyển khoản:</span>
                                            <ul class="listBank">
                                                <li class="bankItem">
                                                    <div class="bankQr">
                                                        <img
                                                            src="https://toshiko.vn/storage/images/Logo%20bank/qr-vietinbank.png"
                                                            alt="bank Qr">
                                                    </div>
                                                    <div class="bankInfo">
                                                        <p class="bankName"><span>Ngân hàng:</span> VIETINBANK</p>
                                                        <p class="bankAccount"><span>Chủ tài khoản: </span>CÔNG TY CỔ
                                                            PHẦN TOSHIKO VIỆT NAM</p>
                                                        <p class="bankCode"><span>Stk: </span>112618936688</p>
                                                    </div>
                                                </li>

                                                <li class="bankItem">
                                                    <div class="bankQr">
                                                        <img
                                                            src="https://toshiko.vn/storage/images/Logo%20bank/qr-mbbank.png"
                                                            alt="bank Qr">
                                                    </div>
                                                    <div class="bankInfo">
                                                        <p class="bankName"><span>Ngân hàng:</span> MBBank</p>
                                                        <p class="bankAccount"><span>Chủ tài khoản: </span>CÔNG TY CỔ
                                                            PHẦN TOSHIKO VIỆT NAM</p>
                                                        <p class="bankCode"><span>Stk: </span>3186866666</p>
                                                    </div>
                                                </li>


                                            </ul>

                                        </li>
                                    </ul>
                                </div>
                                <div class="time-shipping">
                                    <h3>Danh sách sản phẩm</h3>
                                    <div class="time-shipping-inner">


                                        <div class="tsi-item">
                                            <div class="tsi-img"><img loading="lazy"
                                                                      src="https://toshiko.vn/storage/files/%E1%BA%A2nh%20s%E1%BA%A3n%20ph%E1%BA%A9m/may-chay-bo-mc-55-pro-15.jpg"
                                                                      alt="Máy chạy bộ Toshiko MC55 Pro"></div>
                                            <div class="tsi-content">
                                                <a href="#">Máy chạy bộ Toshiko MC55 Pro</a>
                                                <div class="amount-color">
                                                    <p>Số lượng: <span>1</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="https://toshiko.vn" class="buyMore">Mua thêm sản phẩm khác</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
