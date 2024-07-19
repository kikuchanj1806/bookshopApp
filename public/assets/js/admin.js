$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.removeCate').on('click', function () {
        var id = $(this).data('id');
        if (confirm('Xóa mà không thể khôi phục. Bạn có chắc ?')) {
            $.ajax({
                type: 'delete',
                dataType: 'JSON',
                data: { id: id }, // Truyền id vào đây
                url: '/admin/category/destroy',
                success: function (result) {
                    if (result.error === false) {
                        alert(result.message);
                        location.reload();
                    } else {
                        alert('Xóa lỗi vui lòng thử lại');
                    }
                },
                error: function () {
                    alert('Xảy ra lỗi trong quá trình xóa');
                }
            });
        }
    });

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
    handleFileUpload('#upload', '#image_show', '#thumb', '.imageArea1', 3);

    // Gọi hàm chung cho icon
    handleFileUpload('#imageUpload', '#icon_show', '#icon_thumb', '.imageArea2', 3);
});

