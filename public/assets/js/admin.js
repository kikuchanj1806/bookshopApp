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
                    if (result.error === false) {
                        toastr.success(successMessage, 'Thành công');
                        setTimeout(function () {
                            location.reload();
                        }, 2000);
                    } else {
                        toastr.error(errorMessage || 'Xóa lỗi, vui lòng thử lại', 'Lỗi');
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
});


$(document).ready(function () {
    var imgArray = [];

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

    $('#saveChanges').on('click', function () {
        var formData = new FormData();
        var id = $('#uploadThumbProduct').data('id');
        imgArray.forEach(function (file) {
            formData.append('product_id', id);
            formData.append('files[]', file);
            formData.append('type', 2);
        });

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
});
