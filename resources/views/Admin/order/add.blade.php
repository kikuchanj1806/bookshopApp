@extends('Admin.layouts.app')

@section('title', 'Add Product Page')

@section('content')
    @include('Admin.partials.header', [
 'level1' => 'Danh sách đơn hàng',
 'level2' => 'Tạo đơn hàng',
 'route1' => '/admin/order/index',
 'route2' => '/admin/order/add'
    ])
    <div class="row">
        <div class="col-12">
            <form action="{{ route('admin.order.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Thêm đơn hàng</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="fw-bold" for="name">Tên khách hàng <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="customer_name"
                                           placeholder="Tên khách hàng">
                                    @error('customer_name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="fw-bold" for="name">Số điện thoại <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="phone" placeholder="Số điện thoại">
                                    @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="fw-bold" for="name">Địa chỉ <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="address" placeholder="Địa chỉ">
                                    @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="fw-bold" for="name">Ghi chú đơn hàng</label>
                                    <textarea type="text" class="form-control" name="note"
                                              placeholder="Ghi chú đơn hàng"></textarea>
                                </div>
                            </div>
                            <div class="col-6">
                                <!-- order_form.blade.php -->
                                <div class="form-group">
                                    <label for="city">Thành phố</label>
                                    <select name="cityId" id="city" class="form-control">
                                        <option value="">Chọn thành phố</option>
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
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
                                    <select name="wardId" id="ward" class="form-control" {{ old('district_id') ? '' : 'disabled' }}>
                                        <option value="">Chọn xã/phường</option>
                                    </select>
                                    @error('ward_id')
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
                        <table class="table table-head-bg-primary mt-4" id="selected_products">
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

        @if (Session::has('error'))
        toastr.error('{{ Session::get('error') }}');
        @elseif (Session::has('success'))
        toastr.success('{{ Session::get('success') }}');
        @endif
    </script>
@endsection
