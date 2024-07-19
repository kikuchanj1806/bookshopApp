$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
let valueOptions = [];
let valueAttrs = [];
$('.attr-item').click(function () {
    let slug = $('#slug').data('value')
    let totalValues = $('.detail-attr-list').filter((index, element) => $(element).html().trim().length > 0)
        .length;
    let valueAttr = $(this).data('value')
    let parent = $(this).parent()
    let firstAttr = $('.detail-attr-list[data-order="0"]')
    if (!parent.data('order') == 0) {
        if (firstAttr.find('.active').length == 0) {
            $('#alertContent').text('Bạn cần chọn thuộc tính ' + firstAttr.data('name') + ' trước')
            $('#alertModal').modal('show');
        } else {
            beforeAttrOrder = parent.data('order') - 1;
            beforeAttr = $('.detail-attr-list[data-order="' + beforeAttrOrder + '"]')
            afterAttrOrder = parent.data('order') + 1;
            afterAttr = $('.detail-attr-list[data-order="' + afterAttrOrder + '"]')

            if (beforeAttr.find('.active').length == 0) {
                $('#alertContent').text('Bạn cần chọn thuộc tính ' + beforeAttr.data('name') + ' trước')
                $('#alertModal').modal('show');
            } else {
                parent.find('.attr-item').removeClass('active')
                $(this).addClass('active')
                if (!valueAttrs.includes(valueAttr)) {
                    if (!(valueAttrs.length < totalValues)) {
                        valueAttrs.splice(-(totalValues - parent.data('order')), totalValues - parent.data(
                            'order'))
                        valueAttrs.push(valueAttr)
                        $('.detail-attr-list[data-order="' + (parent.data('order') + 1) + '"] .attr-item')
                            .removeClass('active')
                        $.ajax({
                            type: 'POST',
                            url: '{{ route('product.checkstock') }}',
                            data: {
                                slug: slug,
                                value: $(this).data('value')
                            },
                            success: function (value) {
                                $('#dataAttr').val(valueAttrs)
                                $('.detail-attr-list[data-order="' + (parent.data('order') +
                                        1) +
                                    '"]').each(function () {
                                    var value = $(this).data('value');
                                    if (response.includes(value)) {
                                        $(this).removeClass('deactive');
                                    } else {
                                        $(this).addClass('deactive');
                                    }
                                });
                            },
                        });
                    } else {
                        valueAttrs.push(valueAttr)
                        $.ajax({
                            type: 'POST',
                            url: '{{ route('product.getconfig') }}',
                            data: {
                                id: {
                        {
                            $product['id']
                        }
                    },
                        config: valueAttrs
                    },
                        success: function (response) {
                            $('#dataAttr').val(valueAttrs)
                            let price = response.price
                            let sale_price = response.sale_price
                            let saleValue = 0;
                            if (price > sale_price) {
                                saleValue = Math.floor(((price - sale_price) / price) * 100)
                            }
                            $('#prdPrice').val(sale_price)
                            // prdPrice = $('#prdPrice').val()
                            let totalOptionPrice = 0;
                            $('.option-item.active').each(function () {
                                if ($(this).data('type') == 1) {
                                    totalOptionPrice += sale_price * $(this).data(
                                        'value') / 100;
                                } else {
                                    totalOptionPrice += $(this).data('value');
                                }
                            })
                            if (totalOptionPrice > 0) {
                                $('.detail-price .detail-price-present .option-price').html(
                                    '+' + totalOptionPrice.toLocaleString('vi-VN') + 'đ'
                                )
                            }

                            $('.detail-price .detail-price-present .dpp').html(sale_price
                                .toLocaleString(
                                    'vi-VN') + 'đ')
                            $('.detail-price .detail-old-price').html(price.toLocaleString(
                                'vi-VN') + 'đ')

                            $('.detail-price .detail-sale-percent').html('(-' + saleValue
                                .toLocaleString(
                                    'vi-VN') + '%)')
                        }
                    ,
                    })
                        ;
                    }
                    $('#dataValue').val(valueAttrs.join(','))
                }

            }
        }
    } else {
        parent.find('.attr-item').removeClass('active')
        valueAttrs = []
        if (!valueAttrs.includes(valueAttr)) {
            valueAttrs.push(valueAttr)
            $('#dataValue').val(valueAttrs.join(','));
        }
        $(this).addClass('active')
        if (totalValues == 1) {
            $.ajax({
                type: 'POST',
                url: '{{ route('product.getconfig') }}',
                data: {
                    id: {
            {
                $product['id']
            }
        },
            config: valueAttrs
        },
            success: function (response) {
                $('#dataAttr').val(valueAttrs)
                let price = response.price
                let sale_price = response.sale_price
                let saleValue = 0;
                if (price > sale_price) {
                    saleValue = Math.floor(((price - sale_price) / price) * 100)
                }
                $('#prdPrice').val(sale_price)
                // prdPrice = $('#prdPrice').val()
                let totalOptionPrice = 0;
                $('.option-item.active').each(function () {
                    if ($(this).data('type') == 1) {
                        totalOptionPrice += sale_price * $(this).data(
                            'value') / 100;
                    } else {
                        totalOptionPrice += $(this).data('value');
                    }
                })
                if (totalOptionPrice > 0) {
                    $('.detail-price .detail-price-present .option-price').html(
                        '+' + totalOptionPrice.toLocaleString('vi-VN') + 'đ')
                }

                $('.detail-price .detail-price-present .dpp').html(sale_price
                    .toLocaleString(
                        'vi-VN') + 'đ')
                $('.detail-price .detail-old-price').html(price.toLocaleString(
                    'vi-VN') + 'đ')

                $('.detail-price .detail-sale-percent').html('(-' + saleValue
                    .toLocaleString(
                        'vi-VN') + '%)')
            }
        ,
        })
            ;
        } else {
            $('.detail-attr-list[data-order="1"] .attr-item').removeClass('active')
            $.ajax({
                type: 'POST',
                url: '{{ route('product.checkstock') }}',
                data: {
                    slug: slug,
                    value: $(this).data('value')
                },
                success: function (response) {
                    $('#dataAttr').val(valueAttrs)
                    $('.detail-attr-list[data-order="1"] .attr-item').each(function () {
                        var value = $(this).data('value');
                        if (response.includes(value)) {
                            $(this).removeClass('deactive');
                        } else {
                            $(this).addClass('deactive');
                        }
                    });
                },
            });
        }

    }

})

$('.option-item').click(function () {
    if ($(this).hasClass('active')) {
        valueOptions = []
        $(this).removeClass('active')
        prdPrice = $('#prdPrice').val()
        let totalOptionPrice = 0;
        $('.option-item.active').each(function () {
            if ($(this).data('type') == 1) {
                totalOptionPrice += prdPrice * $(this).data('value') / 100;
            } else {
                totalOptionPrice += $(this).data('value');
            }
            valueOptions.push($(this).data('id'))
            $('#dataOption').val(valueOptions)
        })
        $('.detail-price .detail-price-present .option-price').html('+' + totalOptionPrice
            .toLocaleString('vi-VN') + 'đ')
    } else {
        valueOptions = []
        $(this).parent().find('.option-item').removeClass('active')
        $(this).addClass('active')
        prdPrice = $('#prdPrice').val()
        let totalOptionPrice = 0;
        $('.option-item.active').each(function () {
            if ($(this).data('type') == 1) {
                totalOptionPrice += prdPrice * $(this).data('value') / 100;
            } else {
                totalOptionPrice += $(this).data('value');
            }
            valueOptions.push($(this).data('id'))
        })
        $('#dataOption').val(valueOptions)
        $('.detail-price .detail-price-present .option-price').html('+' + totalOptionPrice
            .toLocaleString('vi-VN') + 'đ')
    }

})


$('.addtocart').click(function () {
    var productId = $('#productId').val();
    if ($(this).val() == "configPrd") {
        var attrs = $('#dataAttr').val().split(',');
        var opts = $('#dataOption').val().split(',');
        if ($(this).hasClass('buynow')) {
            $.ajax({
                type: 'POST',
                url: '{{ route('add.cart') }}',
                data: {
                    productId: productId,
                    attrs: attrs,
                    opts: opts
                },
                success: function (response) {
                    window.location.href = '/gio-hang'
                },
                error: function (response) {
                    alert(response.responseJSON.error);
                }
            });
        } else {
            $.ajax({
                type: 'POST',
                url: '{{ route('add.cart') }}',
                data: {
                    productId: productId,
                    attrs: attrs,
                    opts: opts
                },
                success: function (response) {
                    $('#alertContent').text('Thêm sản phẩm vào giỏ hàng thành công')
                    $('#alertModal').modal('show');
                    $('.cart-item .cart-qty').html($('#totalCart').data('value') + 1)
                },
                error: function (response) {
                    $('#alertContent').text('Thêm sản phẩm vào giỏ hàng không thành công')
                    $('#alertModal').modal('show');
                }
            });
        }
    } else {
        var opts = $('#dataOption').val().split(',');
        if ($(this).hasClass('buynow')) {
            $.ajax({
                type: 'POST',
                url: '{{ route('add.cart') }}',
                data: {
                    productId: productId,
                    opts: opts
                },
                success: function (response) {
                    window.location.href = '/gio-hang'
                },
                error: function (response) {
                    alert(response.responseJSON.error);
                }
            });
        } else {
            $.ajax({
                type: 'POST',
                url: '{{ route('add.cart') }}',
                data: {
                    productId: productId,
                    opts: opts
                },
                success: function (response) {
                    $('#alertContent').text('Thêm sản phẩm vào giỏ hàng thành công')
                    $('#alertModal').modal('show');
                    $('.cart-item .cart-qty').html($('#totalCart').data('value') + 1)
                },
                error: function (response) {
                    $('#alertContent').text('Thêm sản phẩm vào giỏ hàng không thành công')
                    $('#alertModal').modal('show');
                }
            });
        }
    }
})


$('.cp-delete').click(function () {
    var productId = $(this).data('value');
    $.ajax({
        type: 'POST',
        url: '{{ route('remove.cart') }}',
        data: {
            productId: productId
        },
        success: function (response) {
            $('#alertContent').text('Đã xoá sản phẩm khỏi giỏ hàng')
            $('#alertModal').modal('show');
            location.reload();
        },
        error: function (response) {
            $('#alertContent').text('Không thể xoá sản phẩm khỏi giỏ hàng')
            $('#alertModal').modal('show');
        }
    });
})
