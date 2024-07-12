@extends('Website.layouts.app')

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
                            <form id="cart-form" method="POST" action="https://toshiko.vn/place-order">
                                <input type="hidden" name="_token" value="tZ7p2QqwPzX97l00wLjWGBTS6MWrmUO7gTFBpl9C"
                                       autocomplete="off">
                                <div class="product-cart-list">
                                    <div class="cart-product" data-id="32">
                                        <div class="cp-left">
                                            <div class="cp-img">
                                                <img loading="lazy"
                                                     src="https://toshiko.vn/storage/files/%E1%BA%A2nh%20s%E1%BA%A3n%20ph%E1%BA%A9m/may-chay-bo-mc-55-pro-15.jpg"
                                                     alt="cart product image">
                                            </div>
                                            <p class="cp-delete" data-value="32"><i
                                                    class="fa-regular fa-circle-xmark"></i> Xóa</p>
                                        </div>
                                        <input type="hidden" id="option" name="option" value="[]">
                                        <div class="cp-right">
                                            <div class="cp-right-top">
                                                <a href="#" class="cp-name">Máy chạy bộ Toshiko MC55 Pro</a>
                                                <div class="cp-price">
                                                    <span class="cp-present-price">12,999,000đ</span>
                                                    <del class="cp-old-price">22,000,000đ</del>
                                                </div>
                                            </div>
                                            <div class="cp-right-bottom">


                                                <div class="qty-input">
                                                    <button data-value="32" class="qty-count qty-count--minus"
                                                            data-action="minus" type="button" data-flashsale="">-
                                                    </button>
                                                    <input data-value="32" class="product-qty" type="number"
                                                           name="product-qty" min="0" max="100" data-qty="100 "
                                                           value="1">
                                                    <button data-value="32" class="qty-count qty-count--add"
                                                            data-action="add" type="button" data-flashsale="">+
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input id="product-data" name="product" type="hidden"
                                           value="[{&quot;id&quot;:32,&quot;quantity&quot;:&quot;1&quot;,&quot;flashsale&quot;:null,&quot;opts&quot;:&quot;[]&quot;}]">

                                    <div class="provisional-cart">
                                        <span>Tạm tính (1 sản phẩm):</span>
                                        <span class="provisional-price">12,999,000đ</span>
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
                                    </div>
                                    <div class="customer-contact">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="floatingName"
                                                   placeholder="Email" name="email">
                                            <label for="floatingName">Email</label>
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
                                                <label class="form-check-label" for="shipping">Giao tận nơi</label>
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="inStore-tab" data-bs-toggle="tab"
                                                    data-bs-target="#inStore-tab-pane" type="button" role="tab"
                                                    aria-controls="inStore-tab-pane" aria-selected="false">

                                                <label class="form-check-label" for="inStore">Nhận tại cửa
                                                    hàng</label>
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
                                                    <option selected="">Chọn Thành phố</option>
                                                    <option value="1">Hà Nội
                                                    </option>
                                                    <option value="611">Hà Giang
                                                    </option>
                                                    <option value="816">Cao Bằng
                                                    </option>
                                                    <option value="988">Bắc Kạn
                                                    </option>
                                                    <option value="1105">Tuyên Quang
                                                    </option>
                                                    <option value="1251">Lào Cai
                                                    </option>
                                                    <option value="1413">Điện Biên
                                                    </option>
                                                    <option value="1553">Lai Châu
                                                    </option>
                                                    <option value="1668">Sơn La
                                                    </option>
                                                    <option value="1885">Yên Bái
                                                    </option>
                                                    <option value="2068">Hoà Bình
                                                    </option>
                                                    <option value="2230">Thái Nguyên
                                                    </option>
                                                    <option value="2418">Lạng Sơn
                                                    </option>
                                                    <option value="2630">Quảng Ninh
                                                    </option>
                                                    <option value="2821">Bắc Giang
                                                    </option>
                                                    <option value="3041">Phú Thọ
                                                    </option>
                                                    <option value="3280">Vĩnh Phúc
                                                    </option>
                                                    <option value="3426">Bắc Ninh
                                                    </option>
                                                    <option value="3561">Hải Dương
                                                    </option>
                                                    <option value="3809">Hải Phòng
                                                    </option>
                                                    <option value="4042">Hưng Yên
                                                    </option>
                                                    <option value="4214">Thái Bình
                                                    </option>
                                                    <option value="4483">Hà Nam
                                                    </option>
                                                    <option value="4599">Nam Định
                                                    </option>
                                                    <option value="4836">Ninh Bình
                                                    </option>
                                                    <option value="4988">Thanh Hóa
                                                    </option>
                                                    <option value="5575">Nghệ An
                                                    </option>
                                                    <option value="6057">Hà Tĩnh
                                                    </option>
                                                    <option value="6287">Quảng Bình
                                                    </option>
                                                    <option value="6447">Quảng Trị
                                                    </option>
                                                    <option value="6583">Thừa Thiên Huế
                                                    </option>
                                                    <option value="6734">Đà Nẵng
                                                    </option>
                                                    <option value="6799">Quảng Nam
                                                    </option>
                                                    <option value="7059">Quảng Ngãi
                                                    </option>
                                                    <option value="7246">Bình Định
                                                    </option>
                                                    <option value="7417">Phú Yên
                                                    </option>
                                                    <option value="7537">Khánh Hòa
                                                    </option>
                                                    <option value="7686">Ninh Thuận
                                                    </option>
                                                    <option value="7759">Bình Thuận
                                                    </option>
                                                    <option value="7894">Kon Tum
                                                    </option>
                                                    <option value="8007">Gia Lai
                                                    </option>
                                                    <option value="8245">Đắk Lắk
                                                    </option>
                                                    <option value="8445">Đắk Nông
                                                    </option>
                                                    <option value="8525">Lâm Đồng
                                                    </option>
                                                    <option value="8680">Bình Phước
                                                    </option>
                                                    <option value="8803">Tây Ninh
                                                    </option>
                                                    <option value="8907">Bình Dương
                                                    </option>
                                                    <option value="9008">Đồng Nai
                                                    </option>
                                                    <option value="9190">Bà Rịa - Vũng Tàu
                                                    </option>
                                                    <option value="9281">Hồ Chí Minh
                                                    </option>
                                                    <option value="9616">Long An
                                                    </option>
                                                    <option value="9820">Tiền Giang
                                                    </option>
                                                    <option value="10004">Bến Tre
                                                    </option>
                                                    <option value="10171">Trà Vinh
                                                    </option>
                                                    <option value="10287">Vĩnh Long
                                                    </option>
                                                    <option value="10403">Đồng Tháp
                                                    </option>
                                                    <option value="10559">An Giang
                                                    </option>
                                                    <option value="10727">Kiên Giang
                                                    </option>
                                                    <option value="10887">Cần Thơ
                                                    </option>
                                                    <option value="10980">Hậu Giang
                                                    </option>
                                                    <option value="11064">Sóc Trăng
                                                    </option>
                                                    <option value="11185">Bạc Liêu
                                                    </option>
                                                    <option value="11257">Cà Mau
                                                    </option>
                                                </select>
                                                <select class="form-select js-location" id="district" data-type="2"
                                                        data-value="">
                                                    <option selected="" disabled="">Chọn Quận / Huyện</option>
                                                </select>
                                                <select class="form-select" id="ward" data-value="">
                                                    <option selected="" disabled="">Chọn Phường / Xã</option>
                                                </select>
                                                <input id="addressDetail" type="text" class="form-control"
                                                       placeholder="Số nhà, tên đường">
                                                <input id="address" type="hidden" name="address" value="">
                                            </div>
x`

                                            <input id="shippingId" type="hidden" name="shipping">
                                            <div class="payment checkout-option">
                                                <p class="choose-receiving-title">Phương thức thanh toán</p>
                                                <ul>
                                                    <li data-value="1">
                                                        <span>COD( Thanh toán khi nhận hàng)</span>
                                                    </li>
                                                    <li data-value="2">
                                                        <span>Chuyển khoản</span>
                                                    </li>

                                                    <input id="paymentId" type="hidden" name="payment" value="">
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="inStore-tab-pane" role="tabpanel"
                                             aria-labelledby="inStore-tab" tabindex="0">
                                            <p class="choose-receiving-title">Chọn cửa hàng</p>
                                            <div class="choseStore">
                                                <ul>
                                                    <li data-value="1" data-city=" Hà Nội" data-district=" Q.Thanh Xuân"
                                                        data-ward=" P.Thanh Xuân Nam" data-address="565 Nguyễn Trãi">
                                                        <span>Toshiko Nguyễn Trãi</span>
                                                    </li>
                                                    <li data-value="2" data-city=" Hà Nội" data-district=" Q.Thanh Xuân"
                                                        data-ward=" P.Nhân Chính" data-address="104 Khuất Duy Tiến">
                                                        <span>Toshiko Khuất Duy Tiến</span>
                                                    </li>
                                                    <li data-value="3" data-city=" Hà Nội" data-district=" Q. Long Biên"
                                                        data-ward=" P. Đức Giang" data-address="96 Ngô Gia Tự">
                                                        <span>Toshiko Long Biên</span>
                                                    </li>
                                                    <li data-value="4" data-city=" Hà Nội"
                                                        data-district=" quận Hai Bà Trưng" data-ward=" phường Minh Khai"
                                                        data-address="Số 115 đường Minh Khai">
                                                        <span>Toshiko Minh Khai</span>
                                                    </li>
                                                    <li data-value="5" data-city=" TP. Hà Nội"
                                                        data-district=" Quận Cầu Giấy" data-ward=" Phường Dịch Vọng Hậu"
                                                        data-address="29 Trần Quốc Hoàn">
                                                        <span>Toshiko Cầu Giấy</span>
                                                    </li>
                                                    <li data-value="6" data-city="" data-district=" TP.Bắc Ninh"
                                                        data-ward=" P.Đại Phúc" data-address="10 Phố Vũ">
                                                        <span>Toshiko Bắc Ninh</span>
                                                    </li>
                                                    <li data-value="7" data-city=" Bắc Ninh" data-district=" TP. Từ Sơn"
                                                        data-ward=" Phương Đông Ngàn" data-address="272 Trần Phú">
                                                        <span>Toshiko Từ Sơn - Bắc Ninh</span>
                                                    </li>
                                                    <li data-value="8" data-city=" Quảng Ninh"
                                                        data-district=" TP.Hạ Long" data-ward=" P.Cao Thắng"
                                                        data-address="566 Cao Thắng">
                                                        <span>Toshiko Hạ Long - Quảng Ninh</span>
                                                    </li>
                                                    <li data-value="9" data-city=" Tỉnh Quảng Ninh"
                                                        data-district=" TP Cẩm Phả" data-ward=" Phường Cẩm Thuỷ"
                                                        data-address="Số 777 Trần Phú">
                                                        <span>Toshiko Cẩm Phả - Quảng Ninh</span>
                                                    </li>
                                                    <li data-value="10" data-city=" Quảng Ninh"
                                                        data-district=" TP. Uông Bí" data-ward=" phường Yên Thanh"
                                                        data-address="152 Trần Hưng Đạo">
                                                        <span>Toshiko Uông Bí - Quảng Ninh</span>
                                                    </li>
                                                    <li data-value="11" data-city=" TP.Hải Phòng"
                                                        data-district=" Q.Lê Chân" data-ward=" P.Trần Nguyên Hãn"
                                                        data-address="120 Trần Nguyên Hãn">
                                                        <span>Toshiko Hải Phòng</span>
                                                    </li>
                                                    <li data-value="12" data-city=" tỉnh Ninh Bình"
                                                        data-district=" TP. Ninh Bình" data-ward=" Ninh Sơn"
                                                        data-address="876 - 878 Nguyễn Công Trứ">
                                                        <span>Toshiko Ninh Bình</span>
                                                    </li>
                                                    <li data-value="13" data-city=" Phú Thọ"
                                                        data-district=" tp Việt Trì" data-ward=" p.Tiên Cát"
                                                        data-address="1421 Đại lộ Hùng Vương">
                                                        <span>Toshiko Phú Thọ</span>
                                                    </li>
                                                    <li data-value="14" data-city=" tỉnh Nam Định"
                                                        data-district=" TP.Nam Định" data-ward=" P.Bà Triệu"
                                                        data-address="483 Trần Hưng Đạo">
                                                        <span>Toshiko Nam Định</span>
                                                    </li>
                                                    <li data-value="15" data-city="" data-district=" T. Vĩnh Phúc"
                                                        data-ward=" TP. Vĩnh Yên"
                                                        data-address="126 Trần Phú P. Liên Bảo">
                                                        <span>Toshiko Vĩnh Phúc</span>
                                                    </li>
                                                    <li data-value="16" data-city="" data-district=" TP. Thái Bình"
                                                        data-ward=" Phường Tiền Phong" data-address="382 Lý Bôn">
                                                        <span>Toshiko Thái Bình</span>
                                                    </li>
                                                    <li data-value="17" data-city=" Hải Dương"
                                                        data-district=" Thành phố Hải Dương" data-ward=" P. Thanh Bình"
                                                        data-address="362 Nguyễn Lương Bằng">
                                                        <span>Toshiko Hải Dương</span>
                                                    </li>
                                                    <li data-value="18" data-city="" data-district="" data-ward=""
                                                        data-address="17 Hùng Vương - Phường Ngô Quyền - TP. Bắc Giang - Bắc Giang">
                                                        <span>Toshiko Bắc Giang</span>
                                                    </li>
                                                    <li data-value="19" data-city=" tỉnh Yên Bái"
                                                        data-district=" Thành Phố Yên Bái" data-ward=" P. Đồng Tâm"
                                                        data-address="70 Đinh Tiên Hoàng">
                                                        <span>Toshiko Yên Bái</span>
                                                    </li>
                                                    <li data-value="20" data-city=" tỉnh Lạng Sơn"
                                                        data-district=" thành phố Lạng Sơn"
                                                        data-ward=" phường Vĩnh Trại" data-address="6 Lê Lợi">
                                                        <span>Toshiko Lạng Sơn</span>
                                                    </li>
                                                    <li data-value="21" data-city=" Nghệ An" data-district=" TP.Vinh"
                                                        data-ward=" P.Hưng Phúc" data-address="234 Nguyễn Văn Cừ">
                                                        <span>Toshiko Vinh - Nghệ An</span>
                                                    </li>
                                                    <li data-value="22" data-city=" Nghệ An"
                                                        data-district=" thị xã Hoàng Mai"
                                                        data-ward=" Phường Quỳnh Thiện"
                                                        data-address="497 Khối Thịnh Mỹ">
                                                        <span>Toshiko Hoàng Mai - Nghệ An</span>
                                                    </li>
                                                    <li data-value="23" data-city=" Thanh Hóa"
                                                        data-district=" TP. Thanh Hóa" data-ward=" P. Đông Vệ"
                                                        data-address="329 Quang Trung">
                                                        <span>Toshiko Thanh Hóa</span>
                                                    </li>
                                                    <li data-value="24" data-city=" Thị xã Nghi sơn"
                                                        data-district=" Phường Hải hoà" data-ward=" Tiểu khu 5"
                                                        data-address="86 Đào Duy Từ">
                                                        <span>Toshiko Nghi Sơn - Thanh Hóa</span>
                                                    </li>
                                                    <li data-value="25" data-city=" Khánh Hòa"
                                                        data-district=" Nha Trang" data-ward=" Phường Phước Tân"
                                                        data-address="29 Lê Hồng Phong">
                                                        <span>Toshiko Khánh Hòa</span>
                                                    </li>
                                                    <li data-value="26" data-city=" TP.Phan Thiết"
                                                        data-district=" P.Phú Thuỷ" data-ward=" khu phố 7"
                                                        data-address="137 Tôn Đức Thắng">
                                                        <span>Toshiko Bình Thuận</span>
                                                    </li>
                                                    <li data-value="27" data-city=" Đắk Lắk"
                                                        data-district=" TX. Buôn Hồ" data-ward=" P.An Bình"
                                                        data-address="523 - 525 Hùng Vương">
                                                        <span>Toshiko Buôn Hồ</span>
                                                    </li>
                                                    <li data-value="28" data-city=" Đà Nẵng"
                                                        data-district=" Q. Thanh Khê" data-ward=" P. Vĩnh Trung"
                                                        data-address="285 Hùng Vương">
                                                        <span>Toshiko Đà Nẵng</span>
                                                    </li>
                                                    <li data-value="29" data-city=" TP Đà Nẵng"
                                                        data-district=" Q. Liên Chiểu" data-ward=" phường Hòa Khánh"
                                                        data-address="484 Tôn Đức Thắng">
                                                        <span>Toshiko Liên Chiểu - Đà Nẵng</span>
                                                    </li>
                                                    <li data-value="30" data-city=" Thừa Thiên Huế"
                                                        data-district=" thành phố Huế" data-ward=" P. An Đông"
                                                        data-address="71 An Dương Vương">
                                                        <span>Toshiko Huế</span>
                                                    </li>
                                                    <li data-value="31" data-city=" T.Hà Tĩnh"
                                                        data-district=" TP. Hà Tĩnh" data-ward=" P. Trần Phú"
                                                        data-address="36 Hàm Nghi">
                                                        <span>Toshiko Hà Tĩnh</span>
                                                    </li>
                                                    <li data-value="32" data-city=" Quảng Bình"
                                                        data-district=" Tp. Đồng Hới" data-ward=" Phường Đồng Hới"
                                                        data-address="09 Lý Thường Kiệt">
                                                        <span>Toshiko Đồng Hới - Quảng Bình</span>
                                                    </li>
                                                    <li data-value="33" data-city=" TP. HCM" data-district=" Q.10"
                                                        data-ward=" P.15" data-address="577 Cách Mạng Tháng 8">
                                                        <span>Toshiko Quận 10 - Hồ Chí Minh</span>
                                                    </li>
                                                    <li data-value="34" data-city=" TP. HCM" data-district=" Q.Gò Vấp"
                                                        data-ward=" P.8" data-address="1024 Quang Trung">
                                                        <span>Toshiko Gò Vấp - Hồ Chí Minh</span>
                                                    </li>
                                                    <li data-value="35" data-city=" HCM" data-district=" TP.Thủ Đức"
                                                        data-ward=" P.Hiệp Phú" data-address="126 Lê Văn Việt">
                                                        <span>Toshiko Thủ Đức - Hồ Chí Minh</span>
                                                    </li>
                                                    <li data-value="36" data-city=" TP. HCM"
                                                        data-district=" Q. Bình Tân" data-ward=" P. Bình Trị Đông A"
                                                        data-address="21 Lê Văn Quới">
                                                        <span>Toshiko Bình Tân - Hồ Chí Minh</span>
                                                    </li>
                                                    <li data-value="37" data-city=" TP. HCM"
                                                        data-district=" Quận Tân Bình ( đối diện Vincom Cộng Hoà )"
                                                        data-ward=" Phường 4" data-address="84 Cộng Hoà">
                                                        <span>Toshiko Tân Bình - Hồ Chí Minh</span>
                                                    </li>
                                                    <li data-value="38" data-city=" TP. HCM" data-district=" Quận 6"
                                                        data-ward=" P.13" data-address="95 Bà Hom">
                                                        <span>Toshiko Quận 6 - Hồ Chí Minh</span>
                                                    </li>
                                                    <li data-value="39" data-city=" TP. HCM" data-district=" Quận 7"
                                                        data-ward=" Phường Tân Quy" data-address="268 Nguyễn Thị Thập">
                                                        <span>Toshiko Quận 7 - TP.HCM</span>
                                                    </li>
                                                    <li data-value="40" data-city=" Đồng Nai"
                                                        data-district=" TP.Biên Hòa" data-ward=" P.Thống Nhất"
                                                        data-address="1253 Phạm Văn Thuận">
                                                        <span>Toshiko Đồng Nai</span>
                                                    </li>
                                                    <li data-value="41" data-city=" huyện Long Thành"
                                                        data-district=" thị trấn Long Thành"
                                                        data-ward=" khu Phước Thuận" data-address="492-494 Lê Duẩn">
                                                        <span>Toshiko Long Thành - Đồng Nai</span>
                                                    </li>
                                                    <li data-value="42" data-city=" Bình Dương"
                                                        data-district=" TP.Thủ Dầu Một" data-ward=" P.Phú Hòa"
                                                        data-address="234 Đại Lộ Bình Dương">
                                                        <span>Toshiko Thủ Dầu Một - Bình Dương</span>
                                                    </li>
                                                    <li data-value="43" data-city=" Bình Dương"
                                                        data-district=" TP.Dĩ An" data-ward=" P.Dĩ An"
                                                        data-address="2 Nguyễn Trãi">
                                                        <span>Toshiko Dĩ An - Bình Dương</span>
                                                    </li>
                                                    <li data-value="44" data-city=" TP.Cần Thơ"
                                                        data-district=" Q.Ninh Kiều" data-ward=" P.Xuân Khánh"
                                                        data-address="200 đường 30/4">
                                                        <span>Toshiko Cần Thơ</span>
                                                    </li>
                                                    <li data-value="45" data-city=" Bà Rịa - Vũng Tàu"
                                                        data-district=" TP.Vũng Tàu" data-ward=" P.3"
                                                        data-address="310 Lê Hồng Phong">
                                                        <span>Toshiko Vũng Tàu</span>
                                                    </li>
                                                    <li data-value="46" data-city=" Bình Phước"
                                                        data-district=" TP.Đồng Xoài" data-ward=" P.Tân Bình"
                                                        data-address="Vòng Xoay Đồng Xoài - Phú Riềng Đỏ">
                                                        <span>Toshiko Bình Phước</span>
                                                    </li>
                                                    <li data-value="47" data-city=" Tỉnh An Giang"
                                                        data-district=" Thành phố Long Xuyên"
                                                        data-ward=" phường Mỹ Bình" data-address="134A Trần Hưng Đạo">
                                                        <span>Toshiko An Giang</span>
                                                    </li>
                                                    <li data-value="48" data-city=" Kiên Giang"
                                                        data-district=" Tp Rạch Giá" data-ward=" p Vĩnh Lạc"
                                                        data-address="702 Nguyễn Trung Trực">
                                                        <span>Toshiko Kiên Giang</span>
                                                    </li>
                                                    <li data-value="49" data-city=" Tây Ninh"
                                                        data-district=" TP.Tây Ninh" data-ward=" P.4"
                                                        data-address="994 Cách Mạng Tháng Tám">
                                                        <span>Toshiko Tây Ninh</span>
                                                    </li>
                                                    <li data-value="50" data-city=" T. Đồng Tháp"
                                                        data-district=" Tp. Sa Đéc" data-ward=" Phường 2"
                                                        data-address="387 Khóm 2">
                                                        <span>Toshiko Đồng Tháp</span>
                                                    </li>
                                                    <li data-value="51" data-city=" Thành phố Trà Vinh"
                                                        data-district=" Phường 6" data-ward=" Khóm 3"
                                                        data-address="416 Điện Biên Phủ">
                                                        <span>Toshiko Trà Vinh</span>
                                                    </li>
                                                    <li data-value="52" data-city=" Bạc Liêu"
                                                        data-district=" TP.Bạc Liêu" data-ward=" P.7"
                                                        data-address="51A5 Trần Phú">
                                                        <span>Toshiko Bạc Liêu</span>
                                                    </li>
                                                    <li data-value="53" data-city=" Gia Lai" data-district=" TP.Pleiku"
                                                        data-ward=" P.Phù Đổng" data-address="248-250 Nguyễn Tất thành">
                                                        <span>Toshiko Gia Lai</span>
                                                    </li>
                                                    <li data-value="54" data-city=" TP.Sóc Trăng" data-district=" P.3"
                                                        data-ward=" Khóm 4" data-address="216 Lê Hồng Phong">
                                                        <span>Toshiko Sóc Trăng</span>
                                                    </li>
                                                    <li data-value="55" data-city=" Tiền Giang"
                                                        data-district=" TP.Mỹ Tho" data-ward=" P.4"
                                                        data-address="113-115 Lý Thường Kiệt">
                                                        <span>Toshiko Tiền Giang</span>
                                                    </li>
                                                    <li data-value="56" data-city=" Long An" data-district=" TP. Tân An"
                                                        data-ward=" Phường 3" data-address="236-238 Nguyễn Đình Chiểu">
                                                        <span>Toshiko Long An</span>
                                                    </li>
                                                    <li data-value="57" data-city="" data-district=" TP. Cà Mau"
                                                        data-ward=" phường 7" data-address="18 Hùng Vương">
                                                        <span>Toshiko Cà Mau</span>
                                                    </li>
                                                    <li data-value="58" data-city="" data-district=" Tỉnh Vĩnh Long"
                                                        data-ward=" Thành phố Vĩnh Long"
                                                        data-address="68/1 Phạm Thái Bường Phường 4">
                                                        <span>Toshiko Vĩnh Long</span>
                                                    </li>
                                                    <li data-value="59" data-city=" Ninh Thuận (Ngã tư chợ Động)"
                                                        data-district=" TP Phan Rang - Tháp Chàm"
                                                        data-ward=" phường Thanh Sơn" data-address="126 Ngô Gia Tự">
                                                        <span>Toshiko Phan Rang - Ninh Thuận</span>
                                                    </li>
                                                    <li data-value="60" data-city=" Quảng Ngãi"
                                                        data-district=" TP. Quảng Ngãi" data-ward=" P. Lê Hồng Phong"
                                                        data-address="34-36 Quang Trung">
                                                        <span>Toshiko Quảng Ngãi</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 other-requirements">
                                        <input type="text" class="form-control" name="note"
                                               placeholder="Yêu cầu khác (không bắt buộc)">
                                    </div>
                                    <div class="form-check" style="display:none">
                                        <input class="form-check-input" type="checkbox" value="" id="billexport">
                                        <label class="form-check-label" for="billexport">Xuất hóa đơn công ty</label>
                                    </div>
                                    <div class="company-info">
                                        <div class="customer-contact">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="companyName"
                                                       placeholder="Tên công ty">
                                                <label for="floatingName">Tên công ty</label>
                                            </div>
                                            <div class="form-floating">
                                                <input type="number" class="form-control" id="companyCode"
                                                       placeholder="Số điện thoại">
                                                <label for="floatingNumber">Mã số thuế</label>
                                            </div>
                                            <input id="companyInfo" type="hidden" value="" name="company_info">
                                        </div>
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
                                        <span class="finalPrice">12,999,000đ</span>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="cartcheck"
                                               required="">
                                        <label class="form-check-label" for="cartcheck">Tôi đồng ý với Chính sách xử
                                            lý dữ liệu cá nhân của Toshiko</label>
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
