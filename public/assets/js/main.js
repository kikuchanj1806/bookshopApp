$(document).ready(function () {
    // Search mobile
    $('.search-item').click(function () {
        $('.header-search-desktop').addClass('active')
    })
    $('.header-search-back').click(function () {
        $('.header-search-desktop').removeClass('active')
    })


    // Menu bobile

    $('.menu-item').click(function () {
        $('.header-main').toggleClass('active')
        $(this).toggleClass('active')
        $('.header-bottom').toggleClass('active')
    })
    $('.has-dropdown>span').click(function () {
        $('.submenu').addClass('active')
    })
    $('.submenu-title').click(function () {
        $('.submenu').removeClass('active')
    })


    //   Scroll top
    $(window).scroll(function () {
        if ($(window).scrollTop() > 500) {
            $('.back-to-top').addClass('show')
        } else {
            $('.back-to-top').removeClass('show');
        }
    })
    $('.back-to-top').click(function () {
        $('html, body').animate({ scrollTop: 0 }, '500');
    })

    // $(window).scroll(function () {
    //     let height = $('#header').height();
    //     if ($(window).scrollTop() > height) {
    //         $('#header').addClass('sticky')
    //     } else {
    //         $('#header').removeClass('sticky')
    //     }
    // })


    // Footer
    $('.viewmore-menu-title').click(function () {
        $(this).next().slideDown()
        $(this).hide()
    })


     // QA
     $('.qa-title').click(function(){
        if ($(this).hasClass('active')) {
            $('.qa-title').removeClass('active')
            $(this).next().slideUp()
        }else{
            $('.qa-title').removeClass('active')
            $('.qa-content').slideUp()
            $(this).addClass('active')
            $(this).next().slideDown()
        }
    })
})

$(document).ready(function () {
    $('#inputSearch').on('input', function () {
        let query = $(this).val();

        if (query.length > 2) {
            $.ajax({
                url: "/search/suggestions",
                type: "GET",
                data: { query: query },
                success: function (data) {
                    let suggestionList = $('.suggestion-options ul');
                    let suggestionTitle = $('#suggestion-title');
                    suggestionList.empty();

                    if (data.length > 0) {
                        suggestionTitle.text('Gợi ý tìm kiếm');
                        data.forEach(function (item) {
                            suggestionList.append('<li><a href="/prd/' + item.slug + '">' + item.name + '</a></li>');
                        });
                        $('.search-autocomplete').addClass('active')
                    }
                }
            });
        }
    });

    // Đóng gợi ý khi click ra ngoài
    $(document).click(function (e) {
        if (!$(e.target).closest('.header-search-desktop').length) {
            $('.search-btn').removeClass('active')
            $('.search-autocomplete').removeClass('active')
        }
    });
});

$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Function to add product to cart
    function addToCart(product) {
        $.ajax({
            url: '/add-to-cart',
            method: 'POST',
            data: {
                product: product
            },
            success: function(response) {
                console.log(response.message);
                alert('Sản phẩm đã được thêm vào giỏ hàng!');
                updateCartUI();
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    // Function to update cart UI
    function updateCartUI() {
        $.ajax({
            url: '/cart/count',
            method: 'GET',
            success: function(response) {
                $('.cart-qty').text(response.count);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    // Function to update cart with new data
    function updateCart(cart) {
        // Assuming you want to update cart UI or some specific elements with new cart data
        // This could be an implementation to update cart items on the page
        console.log('Cart updated:', cart);
        // Implement UI update logic here
    }

    // Function to update cart header with new summary
    function updateCartHeader(cartSummary) {
        // Update the header with the cart summary information
        $('.cart-total .finalPrice').text(cartSummary.totalPrice);
        $('.cart-qty').text(cartSummary.totalItems);
    }

    // Event listener for "Add to Cart" button
    $('.addtocart').click(function() {
        let detailBox = $(this).closest('.detail-box');
        let product = {
            id: detailBox.data('product-id'),
            name: detailBox.data('product-name'),
            price: detailBox.data('product-price'),
            quantity: 1
        };

        addToCart(product);
    });

    // Event listener for "Buy Now" button
    $('.buynow').click(function() {
        let detailBox = $(this).closest('.detail-box');
        let product = {
            id: detailBox.data('product-id'),
            name: detailBox.data('product-name'),
            price: detailBox.data('product-price'),
            quantity: 1
        };

        addToCart(product);
        window.location.href = '/card'; // Redirect to cart page
    });

    // Event listener for removing product from cart
    $('.cp-delete').on('click', function() {
        var productId = $(this).data('id');
        $.ajax({
            url: '/cart/remove',
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                productId: productId
            },
            success: function(response) {
                updateCart(response.cart);
                updateCartHeader(response.cartSummary);
            },
            error: function(xhr) {
                console.log('Lỗi:', xhr.responseText);
            }
        });
    });

    // Event listener for updating product quantity
    $('.qty-count').on('click', function() {
        var productId = $(this).data('value');
        var action = $(this).data('action');
        var quantityInput = $('input[data-value="' + productId + '"]');
        var currentQuantity = parseInt(quantityInput.val());
        var newQuantity = action === 'add' ? currentQuantity + 1 : currentQuantity - 1;

        if (newQuantity >= 0) {
            $.ajax({
                url: '/cart/update',
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    productId: productId,
                    quantity: newQuantity
                },
                success: function(response) {
                    updateCart(response.cart);
                    updateCartHeader(response.cartSummary);
                },
                error: function(xhr) {
                    console.log('Lỗi:', xhr.responseText);
                }
            });
        }
    });

    // Initialize cart UI
    updateCartUI();
});
