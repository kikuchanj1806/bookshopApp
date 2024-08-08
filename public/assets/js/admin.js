$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function deleteItem(url, id, successMessage, errorMessage) {
        $('#confirmDeleteModal').modal('show');

        $('#confirmDeleteBtn').off('click').on('click', function () {
            $.ajax({
                type: 'DELETE',
                dataType: 'JSON',
                data: {id: id},
                url: url,
                success: function (result) {
                    $('#confirmDeleteModal').modal('hide');
                    if (result.error === true) {
                        toastr.success(successMessage, 'Thành công');
                        setTimeout(function () {
                            location.reload();
                        }, 2000);
                    } else {
                        const err = result.message;
                        if(err) {
                            toastr.error(err);
                        } else {
                            toastr.error(errorMessage || 'Xóa lỗi, vui lòng thử lại', 'Lỗi');
                        }
                    }
                },
                error: function () {
                    $('#confirmDeleteModal').modal('hide');
                    toastr.error('Xảy ra lỗi trong quá trình xóa', 'Lỗi');
                }
            });
        });
    }

    function handleFileUpload(inputId, showId, hiddenInputId, iconNone, type) {
        $(inputId).on('change', function () {
            const file = this.files[0];
            if (!file) {
                return;
            }

            const formData = new FormData();
            formData.append('file', file);
            formData.append('type', type);
            $.ajax({
                url: '/admin/upload/services',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: (results) => {
                    if (!results.error) {
                        const dataRes = results.data.original.data;
                        const imageUrl = dataRes.file_path;
                        $(showId).html(`
                            <a href="${imageUrl}" target="_blank">
                                <img src="${imageUrl}" width="60px" class="me-3"/>
                            </a>`);
                        $(iconNone).addClass('d-none')
                        $(inputId).next('.filename').text(dataRes.file_name);
                        $(hiddenInputId).val(imageUrl);
                    } else {
                        alert('Upload File Lỗi');
                    }
                },
                error: () => {
                    alert('Upload failed due to server error');
                }
            });
        });
    }

    // Gọi hàm chung cho ảnh đại diện
    handleFileUpload('#upload', '#image_show', '#thumb', '.imageArea1', 1);

    // Gọi hàm chung cho icon
    handleFileUpload('#imageUpload', '#icon_show', '#icon_thumb', '.imageArea2', 1);

    // Hàm sử dụng cho upload ảnh banner
    handleFileUpload('#uploadBanner', '#image_show', '#thumbBanner', '.imageArea3', 1);

    // Gọi hàm xóa danh mục sản phẩm
    $('.removeCate').on('click', function () {
        var id = $(this).data('id');
        deleteItem('/admin/category/destroy', id, 'Xóa danh mục thành công', 'Xóa danh mục lỗi, vui lòng thử lại');
    });

    // Gọi hàm xóa sản phẩm
    $('.removeProduct').on('click', function () {
        var id = $(this).data('id');
        deleteItem('/admin/product/destroy', id, 'Xóa sản phẩm thành công', 'Xóa sản phẩm lỗi, vui lòng thử lại');
    });

    $('.removeBanner').on('click', function () {
        var id = $(this).data('id');
        deleteItem('/admin/website/banners/destroy', id, 'Xóa sản banner thành công', 'Xóa banner lỗi, vui lòng thử lại');
    });

    $('.removeUser').on('click', function () {
        var id = $(this).data('id');
        deleteItem('/admin/user/destroy', id, 'Xóa sản người dùng thành công', 'Xóa người dùng lỗi, vui lòng thử lại');
    });

    $('.removeOrder').on('click', function () {
        var id = $(this).data('id');
        deleteItem('/admin/order/destroy', id, 'Xóa sản đơn hàng thành công', 'Xóa đơn hàng lỗi, vui lòng thử lại');
    });
});


$(document).ready(function () {
    let imgArray = [];
    var productId;

    // Hiển thị ảnh đã lưu sẵn khi mở modal
    $('#uploadModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Nút đã kích hoạt modal
        productId = button.data('id'); // Lấy ID sản phẩm từ thuộc tính data-id

        $('#previewContainer').empty(); // Xóa các ảnh trước đó
        imgArray = []; // Xóa mảng ảnh trước đó

        $.ajax({
            url: '/admin/product/' + productId + '/thumbnails',
            method: 'GET',
            success: function (response) {
                if (response.error === false) {
                    var thumbnails = response.data.thumbnails;
                    if (thumbnails) {
                        thumbnails.forEach(function (thumb) {
                            imgArray.push({name: thumb.name, url: thumb.url});
                            var html = `
              <div class='col-md-3 col-sm-6 mb-3'>
                <div class='img-bg' style='background-image: url(${thumb.url})' data-file='${thumb.name}'>
                  <div class='upload__img-close'></div>
                </div>
              </div>`;
                            $('#previewContainer').append(html);
                        });
                    }
                }
            }
        });
    });
    $('#file').on('change', function (e) {
        var imgWrap = $('#previewContainer');
        var maxLength = $(this).attr('data-max_length');
        var files = e.target.files;
        var filesArr = Array.prototype.slice.call(files);
        var iterator = 0;

        filesArr.forEach(function (f, index) {
            if (!f.type.match('image.*')) {
                return;
            }

            if (imgArray.length >= maxLength) {
                return false;
            } else {
                imgArray.push(f);

                var reader = new FileReader();
                reader.onload = function (e) {
                    var html = `
              <div class='col-md-3 col-sm-6 mb-3'>
                <div class='img-bg' style='background-image: url(${e.target.result})' data-number='${$(".upload__img-close").length}' data-file='${f.name}'>
                  <div class='upload__img-close'></div>
                </div>
              </div>`;
                    imgWrap.append(html);
                    iterator++;
                }
                reader.readAsDataURL(f);
            }
        });
    });

    $('body').on('click', ".upload__img-close", function (e) {
        var file = $(this).parent().data("file");
        for (var i = 0; i < imgArray.length; i++) {
            if (imgArray[i].name === file) {
                imgArray.splice(i, 1);
                break;
            }
        }
        $(this).parent().parent().remove();
    });


    $('#saveChanges').on('click', async function () {
        var formData = new FormData();
        var id = productId;

        for (const img of imgArray) {
            if (img instanceof File) {
                formData.append('files[]', img);
            } else {
                const file = await urlToFile(img.url, img.name, 'image/jpeg');
                formData.append('files[]', file);
            }
        }
        formData.append('product_id', id);
        formData.append('type', 2);
        $.ajax({
            url: '/admin/upload/services',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.error === false) {
                    toastr.success(response.message);
                } else {
                    toastr.error('Upload failed, please try again.');
                }
                $('#uploadModal').modal('hide');
            },
            error: function (xhr, status, error) {
                toastr.error('An error occurred while uploading.');
                $('#uploadModal').modal('hide');
            }
        });
    });

    async function urlToFile(url, filename, mimeType) {
        const response = await fetch(url);
        const buffer = await response.arrayBuffer();
        return new File([buffer], filename, {type: mimeType});
    }
});

$(document).ready(function () {
    $('#city').change(function () {
        var cityId = $(this).val();
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
                }
            });
        } else {
            $('#district').empty().prop('disabled', true);
            $('#ward').empty().prop('disabled', true);
        }
    });

    $('#district').change(function () {
        var districtId = $(this).val();
        if (districtId) {
            $.ajax({
                url: '/wards/' + districtId,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#ward').empty().prop('disabled', false);
                    $('#ward').append('<option value="">Chọn xã/phường</option>');
                    $.each(data, function (key, value) {
                        $('#ward').append('<option value="' + key + '">' + value.name + '</option>');
                    });
                }
            });
        } else {
            $('#ward').empty().prop('disabled', true);
        }
    });

    // Suggest sản phẩm
    $('#product_search').on('input', function () {
        var query = $(this).val();
        if (query.length > 2) {
            $.ajax({
                url: '/search/suggestions',
                type: 'GET',
                data: {query: query},
                dataType: 'json',
                success: function (data) {
                    $('#product_suggestions').empty();
                    $.each(data, function (index, product) {
                        $('#product_suggestions').append('<a href="#" class="list-group-item list-group-item-action" data-id="' + product.id + '" data-name="' + product.name + '" data-code="' + product.code + '" data-price="' + product.price + '">' + product.name + ' - ' + product.code + '</a>');
                    });
                }
            });
        } else {
            $('#product_suggestions').empty();
        }
    });

    // Thêm sản phẩm vào bảng
    $('#product_suggestions').on('click', 'a', function (e) {
        e.preventDefault();
        var productId = $(this).data('id');
        var productName = $(this).data('name');
        var productCode = $(this).data('code');
        var productPrice = $(this).data('price');

        var rowCount = $('#selected_products tbody tr').length;
        var rowNumber = rowCount + 1;

        var row = '<tr>' +
            '<td class="text-center">' + rowNumber + '</td>' +
            '<td class="text-center">' + productName + '<input type="hidden" name="products[' + rowCount + '][id]" value="' + productId + '"></td>' +
            '<td class="text-center">' + productCode + '</td>' +
            '<td><input type="number" name="products[' + rowCount + '][quantity]" class="form-control product_quantity text-end" value="1" min="1"></td>' +
            '<td><input type="number" name="products[' + rowCount + '][price]" class="form-control product_price text-end" value="' + productPrice + '" readonly></td>' +
            '<td class="text-center"><button type="button" class="btn btn-danger btn-sm remove_product">Xóa</button></td>' +
            '</tr>';
        $('#selected_products tbody').append(row);
        $('#product_suggestions').empty();
        $('#product_search').val('');

        updateTotals(); // Cập nhật tổng sau khi thêm sản phẩm
    });

    // Cập nhật tổng số lượng và giá
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

    // Cập nhật tổng khi thay đổi số lượng sản phẩm
    $('#selected_products').on('input', '.product_quantity', function () {
        updateTotals();
    });

    // Xóa sản phẩm khỏi bảng
    $('#selected_products').on('click', '.remove_product', function () {
        $(this).closest('tr').remove();
        updateRowNumbers(); // Cập nhật số thứ tự sau khi xóa
        updateTotals(); // Cập nhật tổng sau khi xóa
    });

    // Cập nhật số thứ tự các hàng sau khi xóa
    function updateRowNumbers() {
        $('#selected_products tbody tr').each(function (index) {
            $(this).find('td').eq(0).text(index + 1);
        });
    }

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

});

$(document).ready(function () {
    // Khi click vào mục "Thêm mã vận đơn"
    $('a[data-bs-target="#addBillOfLadingModal"]').on('click', function () {
        var orderId = $(this).data('order-id');
        $('#saveBillOfLadingBtn').data('order-id', orderId);
    });

    // Khi click vào nút "Lưu"
    $('#saveBillOfLadingBtn').on('click', function () {
        var orderId = $(this).data('order-id');
        var billOfLading = $('#billOfLading').val();

        $.ajax({
            url: 'addBillOfLading',
            method: 'POST',
            data: {
                order_id: orderId,
                billOfLading: billOfLading
            },
            success: function (response) {
                if (response.success) {
                    // Đóng modal và thông báo thành công
                    $('#addBillOfLadingModal').modal('hide');
                    alert('Mã vận đơn đã được thêm thành công.');
                    location.reload(); // Tải lại trang để cập nhật dữ liệu
                } else {
                    // Xử lý lỗi
                    alert('Có lỗi xảy ra: ' + response.error);
                }
            },
            error: function (xhr, status, error) {
                console.error('Lỗi:', error);
                alert('Có lỗi xảy ra.');
            }
        });
    });

    $('.toggle-lock').click(function(e) {
        e.preventDefault(); // Ngăn chặn hành động mặc định của liên kết

        var orderId = $(this).data('order-id');
        var action = $(this).data('action'); // 'lock' hoặc 'unlock'

        var url = action === 'lock' ? 'lock/' + orderId : 'unlock/' + orderId;

        $.ajax({
            url: url,
            type: 'GET', // Sử dụng phương thức GET hoặc POST tùy thuộc vào cách xử lý route
            success: function(response) {
                // Xử lý thành công
                alert('Đã ' + (action === 'lock' ? 'khóa' : 'mở khóa') + ' đơn hàng thành công.');
                location.reload(); // Tải lại trang để cập nhật giao diện
            },
            error: function(xhr) {
                // Xử lý lỗi
                alert('Có lỗi xảy ra: ' + xhr.responseText);
            }
        });
    });

    $('.edit-tag-btn').on('click', function() {
        var id = $(this).data('id');
        var name = $(this).data('name');

        $('#editTagId').val(id);
        $('#editTagName').val(name);
        $('#editTagForm').attr('action', '{{ route("admin.tags.update", ":id") }}'.replace(':id', id));
    });
});

$(document).ready(function() {
    // Chọn tất cả checkbox
    $('#check_all').on('click', function() {
        $('.order-checkbox').prop('checked', this.checked);
    });

    // Xử lý submit form
    $('#export_form').on('submit', function(e) {
        // Xóa các input ẩn cũ
        $('#export_form').find('input[name="orders[]"]').remove();

        // Lấy các checkbox được chọn
        var selectedCheckboxes = $('.order-checkbox:checked');
        if (selectedCheckboxes.length === 0) {
            alert('Vui lòng chọn ít nhất một đơn hàng để xuất.');
            e.preventDefault(); // Ngăn chặn gửi form nếu không có checkbox nào được chọn
        } else {
            // Thêm các ID đơn hàng vào form
            selectedCheckboxes.each(function() {
                var hiddenInput = $('<input>', {
                    type: 'hidden',
                    name: 'orders[]',
                    value: $(this).val()
                });
                $('#export_form').append(hiddenInput);
            });
        }
    });

    $('#logout-button').click(function(event) {
        event.preventDefault();
        $('#logout-form').submit();
    });
});
