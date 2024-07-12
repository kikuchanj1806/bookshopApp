$('.productList-slide').slick({
    dots: false,
    infinite: true,
    speed: 300,
    slidesToShow: 5,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1025,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 1,
        }
      },
      {
        breakpoint: 769,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      }
    ]
  });


    $(".prd-col").slice(0, 30).addClass('show');
    $("#loadMore").on('click', function (e) {
        e.preventDefault();
        $(".prd-col:hidden").slice(0, 30).addClass('show');
        if ($(".prd-col:hidden").length == 0) {
           $("#loadMore").remove();
        } else {
            $('html,body').animate({
                scrollTop: $(this).offset().top
            }, 1500);
        }
    });

    // Filter

    $('.button__filter-parent').click(function(){
        if($(this).hasClass('active')){
            $(this).removeClass('active')
            $(this).next().removeClass('active')
        }else{
            $('.button__filter-parent').removeClass('active')
            $('.filter-wrapper .list-filter-child').removeClass('active')
            $(this).addClass('active')
            $(this).next().addClass('active')
        }
    })
    $('.button__filter-child').click(function(){
        $(this).toggleClass('active')
        if($(this).parent().parent().find('.active').length>0){
            $(this).parent().parent().next().addClass('active')
        }else{
            $(this).parent().parent().next().removeClass('active')
        }
    })

    $('.btn-sort').click(function(){
            $('.btn-sort').removeClass('active')
            $(this).addClass('active')
    })

    $('.close-fitler').click(function(){
        $('.button__filter-parent').removeClass('active')
        $('.list-filter-child').removeClass('active')
    })

    //   Content

    $('.seemore').click(function(){
        $(this).toggleClass('active')
        $('.category-info-inner').toggleClass('active')
    })

