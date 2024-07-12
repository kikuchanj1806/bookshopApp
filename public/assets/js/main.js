$(document).ready(function () {
    console.log('qưeqweqwe')
    // Search
    $('#inputSearch').click(function () {
        $('.search-btn').addClass('active')
        $('.search-autocomplete').addClass('active')
    })

    $(document).on("click", function (event) {
        if ($(event.target).closest("#inputSearch").length === 0) {
            $('.search-btn').removeClass('active')
            $('.search-autocomplete').removeClass('active')
        }
    });

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
