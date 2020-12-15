

/* Banner */
$('#full-slider').royalSlider({
    arrowsNav: false,
    loop: false,
    keyboardNavEnabled: true,
    controlsInside: false,
    imageScaleMode: 'fill',
    arrowsNavAutoHide: false,
    autoScaleSlider: true,
    autoScaleSliderWidth: 960,
    autoScaleSliderHeight: 350,
    controlNavigation: 'bullets',
    thumbsFitInViewport: false,
    navigateByClick: true,
    startSlideId: 0,
    autoPlay: false,
    transitionType: 'move',
    globalCaption: false,
    deeplinking: {
        enabled: true,
        change: false
    }
    /* size of all images http://help.dimsemenov.com/kb/royalslider-jquery-plugin-faq/adding-width-and-height-properties-to-images */
    // imgWidth: 1400,
    // imgHeight: 680
});

$('#full-slider-mobile').royalSlider({
    arrowsNav: false,
    loop: true,
    keyboardNavEnabled: true,
    controlsInside: true,
    imageScaleMode: 'fill',
    arrowsNavAutoHide: false,
    autoScaleSlider: true,
    autoScaleSliderWidth: 990,
    autoScaleSliderHeight: 530,
    controlNavigation: 'bullets',
    navigateByClick: true,
    startSlideId: 0,
    autoPlay: {
        enabled: false,
        pauseOnHover: false,
        stopAtAction: false,
        delay: 7000
    },
    transitionType: 'move',
    easeInOut: true,
    globalCaption: false,
    deeplinking: {
        enabled: true,
        change: false
    }
});


/* -------------------------------------------------------------------------- */
/* Slick */
$('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.regular'
});
$(".regular").slick({
    dots: false,
    infinite: false,
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    responsive: [
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
            },
        },
        {
            breakpoint: 500,
            settings: {
                slidesToShow: 1,
            },
        },
    ],
    focusOnSelect: true
});

$(".servicos-clinica").slick({
    dots: false,
    infinite: false,
    slidesToShow: 3,
    slidesToScroll: 1
});

$(".menu-tratamento").slick({
    dots: false,
    infinite: false,
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: '.corpo-tratamento',
    responsive: [
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 3,
            },
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
            },
        },
        {
            breakpoint: 500,
            settings: {
                slidesToShow: 1,
            },
        },
    ],
    focusOnSelect: true
});
$('.corpo-tratamento').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    infinite: false,
    fade: true,
    dots: false,
    asNavFor: '.menu-tratamento'
});

$(".slick-convenio").slick({
    dots: false,
    infinite: false,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 3,
            },
        },
        {
            breakpoint: 586,
            settings: {
                slidesToShow: 2,
            },
        },
        {
            breakpoint: 400,
            settings: {
                slidesToShow: 1,
            },
        },
    ]
});

$(".tratamento_destaque").slick({
    dots: false,
    infinite: false,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
            }
        },
        {
            breakpoint: 576,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            }
        },
    ]
});

$(".slick-convenio-home").slick({
    dots: false,
    infinite: false,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 4,
            },
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 4,
            },
        },
        {
            breakpoint: 586,
            settings: {
                slidesToShow: 2,
            },
        },
        {
            breakpoint: 400,
            settings: {
                slidesToShow: 1,
            },
        },
    ]
});



