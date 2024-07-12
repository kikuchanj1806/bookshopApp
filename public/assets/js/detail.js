
$('.detail-img-list').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: true,
    arrows: true
});

//   Content

$('.seemore-infor').click(function () {
    $(this).toggleClass('active')
    $('.detail-info-inner').toggleClass('active')
})

$('.seemore-cmt').click(function () {
    $(this).toggleClass('active')
    $('.block-list-comment').toggleClass('active')
})

//

$('.item-action').click(function () {
    nav = $(this).data('tab')
    $('#' + nav).click()
})
$('.viewmore-specifications').click(function () {
    nav = $(this).data('tab')
    $('#' + nav).click()
})
$('.viewmore-gallery').click(function () {
    nav = $(this).data('tab')
    $('#' + nav).click()
})


// $('#detailModal').on('shown.bs.modal', function (e) {
//   // $('.detailModal-img-list').slick('setPosition');
//   $('.detailModal-img-list').slick({
//     infinite: true,
//     slidesToShow: 1,
//     slidesToScroll: 1,
//     dots: true,
//     arrows: true,
//     asNavFor: '.detailModal-thumb-list'
//   });
//
//   $('.detailModal-thumb-list').slick({
//     infinite: true,
//     slidesToShow: 6,
//     slidesToScroll: 1,
//     dots: false,
//     arrows: true,
//     asNavFor: '.detailModal-img-list'
//   });
//
//
//   $('.detailModal-thumb-list .slick-slide').click(function(e) {
//     e.preventDefault();
//     var slideno = $(this).data('slick-index');
//     $('.detailModal-img-list').slick('slickGoTo', slideno);
//   });
// })

$('.attr-item').click(function () {
    $(this).parent().find('.attr-item').removeClass('active')
    $(this).addClass('active')
})


