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
        console.log(product);
        // Send the cart data to the server
        $.ajax({
            url: '/add-to-cart',
            method: 'POST',
            data: {
                product: product
            },
            success: function(response) {
                // Handle success if needed
                console.log(response.message);
                alert('Sản phẩm đã được thêm vào giỏ hàng!');
                updateCartUI();
            },
            error: function(xhr, status, error) {
                // Handle error if needed
                console.error(error);
            }
        });
    }

    // Function to update cart UI
    function updateCartUI() {
        $.ajax({
            url: '/cartcount',
            method: 'GET',
            success: function(response) {
                // Update both cart quantity spans
                $('.cart-qty').text(response.count);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
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

    // Initialize cart UI
    updateCartUI();
});
