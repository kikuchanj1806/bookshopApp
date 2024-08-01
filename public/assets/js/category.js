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
//   Content

$('.seemore').click(function () {
    $(this).toggleClass('active')
    $('.category-info-inner').toggleClass('active')
})

$(document).ready(function () {
    // Toggle display of filter options
    $('.button__filter-parent').click(function () {
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
            $(this).next().removeClass('active');
        } else {
            $('.button__filter-parent').removeClass('active');
            $('.filter-wrapper .list-filter-child').removeClass('active');
            $(this).addClass('active');
            $(this).next().addClass('active');
        }
    });

    // Close filter options
    $('.close-filter').click(function () {
        $('.button__filter-parent').removeClass('active');
        $('.filter-wrapper .list-filter-child').removeClass('active');
    });

    // Apply filters and update filter-active
    $('.save-filter').click(function () {
        updateFilterActive();
        submitFormWithFilters(); // Submit the form with filters
    });

    // Remove filter when clicking on the x icon
    $('#filter-active').on('click', '.fa-times', function () {
        const tagId = $(this).data('tag-id');
        $('input[name="tag[]"][value="' + tagId + '"]').prop('checked', false);
        updateFilterActive();
        $('form').submit(); // Submit the form with updated filters
    });

    // Update the display of active filters
    function updateFilterActive() {
        const checkedFilters = $('input[name="tag[]"]:checked');
        const filterActive = $('#filter-active');
        filterActive.empty(); // Clear existing filters

        checkedFilters.each(function () {
            const tagLabel = $(this).parent().text().trim();
            const tagId = $(this).val();
            const filterElement = $('<span>')
                .addClass('active-filter')
                .text(tagLabel)
                .append('<i class="far fa-times ms-2 button-close" data-tag-id="' + tagId + '"></i>');
            filterActive.append(filterElement);
        });
    }

    // Submit form with filters
    function submitFormWithFilters() {
        const checkedFilters = $('input[name="tag[]"]:checked');
        let queryString = '?';

        checkedFilters.each(function () {
            queryString += `tag[]=${$(this).val()}&`;
        });

        // Append the current page to the query string
        queryString += `page=${1}`;

        // Redirect to the URL with the query string
        window.location.href = $('#filter-form').attr('action') + queryString;
    }

    // Initialize the form with URL parameters
    function initializeFormFromUrl() {
        const urlParams = new URLSearchParams(window.location.search);
        const tagParams = urlParams.getAll('tag[]');
        const tagIds = tagParams.map(Number);

        $('input[name="tag[]"]').each(function () {
            if (tagIds.includes(parseInt($(this).val()))) {
                $(this).prop('checked', true);
            }
        });

        // Update active filters display
        updateFilterActive();
    }

    // Initialize form with current URL parameters on page load
    initializeFormFromUrl();
});
