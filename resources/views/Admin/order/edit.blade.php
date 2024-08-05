@php
    use App\Helpers\AppFormat;
@endphp
@extends('Admin.layouts.app')

@section('title', 'Edit Order Page')

@section('content')
    @include('Admin.partials.header', [
 'level1' => 'Danh sách đơn hàng',
 'level2' => 'Sửa đơn hàng',
 'route1' => '/admin/order/index',
 'route2' => '/admin/order/edit/' . $order->id
    ])
    <div class="row">
        <div class="col-12">
            <form action="{{ route('admin.order.edit', $order->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Sửa đơn hàng</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="fw-bold" for="name">Tên khách hàng <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="customer_name"
                                           placeholder="Tên khách hàng" value="{{ $order->customer_name }}">
                                    @error('customer_name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="fw-bold" for="name">Số điện thoại <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="phone" placeholder="Số điện thoại"
                                           value="{{ $order->phone }}">
                                    @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="fw-bold" for="name">Địa chỉ <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="address" placeholder="Địa chỉ"
                                           value="{{ $order->address }}">
                                    @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="fw-bold" for="name">Ghi chú đơn hàng</label>
                                    <textarea type="text" class="form-control" name="note"
                                              placeholder="Ghi chú đơn hàng">{{ $order->note }}
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="city">Thành phố</label>
                                    <select name="cityId" id="city" class="form-control">
                                        <option value="">Chọn thành phố</option>
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}" {{ old('cityId', $order->cityId) == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('city_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="district">Quận/Huyện</label>
                                    <select name="districtId" id="district" class="form-control" {{ old('city_id') ? '' : 'disabled' }}>
                                        <option value="">Chọn quận/huyện</option>
                                    </select>
                                    @error('district_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="ward">Xã/Phường</label>
                                    <select name="wardId" id="wards" class="form-control" {{ old('district_id') ? '' : 'disabled' }}>
                                        <option value="">Chọn xã/phường</option>
                                    </select>
                                    @error('ward_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="fw-bold" for="gift_code">Mã sách tặng <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="gift_code"
                                           placeholder="Mã sách tặng" value="{{ $order->gift_code }}">
                                    @error('gift_code')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="separator-dashed"></div>

                        <div class="form-group">
                            <label for="product_search">Tìm kiếm sản phẩm</label>
                            <input type="text" id="product_search" class="form-control"
                                   placeholder="Nhập tên hoặc mã sản phẩm">
                            <div id="product_suggestions" class="list-group"></div>
                        </div>
                        <!-- Bảng sản phẩm đã chọn -->
                        <table class="table table-head-bg-primary table-bordered  mt-4" id="selected_products">
                            <thead>
                            <tr>
                                <th class="text-center">STT</th>
                                <th class="text-center">Tên sản phẩm</th>
                                <th class="text-center">Mã sản phẩm</th>
                                <th class="text-center">Số lượng</th>
                                <th class="text-center">Giá</th>
                                <th class="text-center">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- Các hàng sản phẩm sẽ được thêm vào đây -->
                            </tbody>
                            <tfoot>
                            <tr id="total" style="display: none">
                                <td colspan="3" class="text-end fw-bold">Tổng</td>
                                <td id="total_quantity" class="text-end fw-bold">0</td>
                                <td id="total_price" class="text-end fw-bold">0</td>
                                <td class="text-center fw-bold"></td>
                            </tr>
                            <tr id="shipping_row" style="display: none">
                                <td colspan="3" class="text-end fw-bold">Phí ship</td>
                                <td colspan="2" id="shipping_fee"
                                    class="text-end fw-bold">{{ \App\Helpers\AppFormat::toNumber('35000') }} đ
                                </td>
                                <td></td>
                            </tr>
                            <tr id="total_row" style="display: none">
                                <td colspan="3" class="text-end fw-bold">Tổng cộng</td>
                                <td colspan="2" id="total_with_shipping"
                                    class="text-end fw-bold">{{ \App\Helpers\AppFormat::toNumber('35000') }} đ
                                </td>
                                <td></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-success">Lưu</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        toastr.options = {
            'progressBar': true,
            'closeButton': true
        }

        var initialProductList = @json($orderList);

        var initialCityId = "{{ $order->cityId }}";
        var initialDistrictId = "{{ $order->districtId }}";
        var initialWardId = "{{ $order->wardId }}";

        $(document).ready(function () {
            function loadDistricts(cityId) {
                if (cityId) {
                    $.ajax({
                        url: '/districts/' + cityId,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            $('#district').empty().prop('disabled', false);
                            $('#district').append('<option value="">Chọn quận/huyện</option>');
                            $.each(data, function (key, value) {
                                $('#district').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });

                            // Set the initial district ID
                            if (initialDistrictId) {
                                $('#district').val(initialDistrictId).trigger('change');
                            }
                        },
                        error: function () {
                            $('#district').empty().prop('disabled', true);
                        }
                    });
                } else {
                    $('#district').empty().prop('disabled', true);
                    $('#wards').empty().prop('disabled', true);
                }
            }

            // Load wards based on the initial district ID
            function loadWards(districtId) {
                if (districtId) {
                    $.ajax({
                        url: '/wards/' + districtId,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            $('#wards').empty().prop('disabled', false);
                            $('#wards').append('<option value="">Chọn xã/phường</option>');
                            $.each(data, function (key, value) {
                                $('#wards').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });

                            // Set the initial ward ID
                            if (initialWardId) {
                                $('#wards').val(initialWardId);
                            }
                        },
                        error: function () {
                            $('#wards').empty().prop('disabled', true);
                        }
                    });
                } else {
                    $('#wards').empty().prop('disabled', true);
                }
            }

            // On city change
            $('#city').change(function () {
                var cityId = $(this).val();
                loadDistricts(cityId);
            });

            // On district change
            $('#district').change(function () {
                var districtId = $(this).val();
                loadWards(districtId);
            });

            // Load initial data
            if (initialCityId) {
                $('#city').val(initialCityId).trigger('change');
            } else {
                $('#district').empty().prop('disabled', true);
                $('#wards').empty().prop('disabled', true);
            }

            // load init product
            if (initialProductList && Array.isArray(initialProductList)) {
                // Xóa các hàng sản phẩm hiện tại trong bảng
                $('#selected_products tbody').empty();

                // Thêm dữ liệu sản phẩm vào bảng
                initialProductList.forEach(function (product, index) {
                    addProductToTable(product, index);
                });

                // Cập nhật tổng số lượng và tổng giá
                updateTotals();
            }

            // Hàm thêm sản phẩm vào bảng
            function addProductToTable(product, index) {
                var row = `
        <tr data-id="${product.id}">
            <td class="text-center">${index + 1}</td>
            <td class="text-center">${product.name}<input type="hidden" name="products[${index}][id]" value="${product.id}"></td>
            <td class="text-center">${product.code}</td>
            <td class="text-center"><input type="number" name="products[${index}][quantity]" class="form-control product_quantity text-end" value="${product.quantity}" min="1"></td>
            <td class="text-center"><input type="number" name="products[${index}][price]" class="form-control product_price text-end" value="${toNumber(product.price)}" readonly></td>
            <td class="text-center">
                <button type="button" class="btn btn-danger btn-sm remove-product">Xóa</button>
            </td>
        </tr>
    `;
                $('#selected_products tbody').append(row);
            }

            // Hàm định dạng số tiền
            function toNumber(number) {
                if (!number || isNaN(number)) {
                    return '';
                }

                // Chuyển số thành chuỗi và loại bỏ dấu phân cách thập phân
                const parts = Number(number).toString().split('.');
                let integerPart = parts[0];

                // Thêm dấu phân cách hàng nghìn
                return integerPart.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
            }

            // Hàm cập nhật tổng số lượng và tổng giá
            function updateTotals() {
                var rowCount = $('#selected_products tbody tr').length;

                if (rowCount > 0) {
                    $('#shipping_row').show();
                    $('#total_row').show();
                    $('#total').show();
                }
                var totalQuantity = 0;
                var totalPrice = 0;

                $('#selected_products tbody tr').each(function () {
                    var quantity = parseInt($(this).find('.product_quantity').val()) || 0;
                    var price = parseFloat($(this).find('.product_price').val()) || 0;

                    totalQuantity += quantity;
                    totalPrice += quantity * price;

                });
                var totalWithShipping = totalPrice + 35000;

                $('#total_quantity').text(totalQuantity);
                $('#total_price').text(toNumber(totalPrice));
                $('#total_with_shipping').text(toNumber(totalWithShipping) + ' đ');
            }

            // Xử lý sự kiện xóa sản phẩm
            $('#selected_products').on('click', '.remove-product', function () {
                $(this).closest('tr').remove();
                updateTotals();
            });
        });

        @if (Session::has('error'))
        toastr.error('{{ Session::get('error') }}');
        @elseif (Session::has('success'))
        toastr.success('{{ Session::get('success') }}');
        @endif
    </script>
@endsection
