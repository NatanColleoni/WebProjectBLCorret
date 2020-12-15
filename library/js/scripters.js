$(".data").mask("99/99/9999");
$(".cpf").mask("999.999.999-99");
$(".cep").mask("99999-999");
$(".cnpj").mask("99.999.999/9999-99");

var SPMaskBehavior = function (val) {
    return val.replace(/\D/g, "").length === 11 ? "(00) 00000-0000" : "(00) 0000-00009";
},
spOptions = {
    onKeyPress: function (val, e, field, options) {
        field.mask(SPMaskBehavior.apply({}, arguments), options);
    }
};

$(".telefone").mask(SPMaskBehavior, spOptions);
$(".money").mask("000.000.000.000.000,00", {reverse: true});

$(".rf-" + pg_id).addClass("ativo");

var $doc = $("html, body");
$("body a.suave").click(function () {
    var width_resp_click = screen.width;
    if(width_resp_click > 991) {
        $doc.animate({
            scrollTop: $($.attr(this, "href")).offset().top - 50
        }, 500);
    }
    if(width_resp_click < 992) {
        $doc.animate({
            scrollTop: $($.attr(this, "href")).offset().top - 60
        }, 500);
        $("#btn-menu").click();
    }
    return false;
});

(function ($) {
    $.support.placeholder = ("placeholder" in document.createElement("input"));
})(jQuery);
//fix for IE7 and IE8
$(function () {
    if (!$.support.placeholder) {
        $("[placeholder]").focus(function () {
            if ($(this).val() == $(this).attr("placeholder"))
                $(this).val("");
        }).blur(function () {
            if ($(this).val() == "")
                $(this).val($(this).attr("placeholder"));
        }).blur();
        $("[placeholder]").parents("form").submit(function () {
            $(this).find("[placeholder]").each(function () {
                if ($(this).val() == $(this).attr("placeholder")) {
                    $(this).val("");
                }
            });
        });
    }
});

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

$(".banner-principal").royalSlider({
    arrowsNav: false,
    loop: true,
    keyboardNavEnabled: false,
    controlsInside: false,
    imageScaleMode: "fill",
    arrowsNavAutoHide: false,
    autoScaleSlider: true,
    autoScaleSliderWidth: 1920,
    autoScaleSliderHeight: 875,
    controlNavigation: "bullets",
    thumbsFitInViewport: false,
    navigateByClick: false,
    startSlideId: 0,
    transitionType: "move",
    globalCaption: false,
    deeplinking: {
        enabled: true,
        change: false
    },
    autoPlay: {
        enabled: true,
        pauseOnHover: false,
        delay: 4000
    }
});

$(".banner-principal-mob").royalSlider({
    arrowsNav: false,
    loop: false,
    keyboardNavEnabled: false,
    controlsInside: false,
    imageScaleMode: "fill",
    arrowsNavAutoHide: false,
    autoScaleSlider: true,
    autoScaleSliderWidth: 991,
    autoScaleSliderHeight: 530,
    controlNavigation: "bullets",
    thumbsFitInViewport: false,
    navigateByClick: false,
    startSlideId: 0,
    transitionType: "move",
    globalCaption: false,
    deeplinking: {
        enabled: true,
        change: false
    },
    autoPlay: {
        enabled: true,
        pauseOnHover: false,
        delay: 4000
    }
});

//$(".banner-principal.royalSlider .rsNavItem").each(function(i) {
//    var zero = "0";
//    if(i > 9){zero = "";}
//    $(this).html(zero + (i + 1)); 
//});
//$(".banner-principal-mob.royalSlider .rsNavItem").each(function(i) {
//    var zero = "0";
//    if(i > 9){zero = "";}
//    $(this).html(zero + (i + 1)); 
//});

$(".banner-institucional").royalSlider({
    arrowsNav: false,
    loop: true,
    keyboardNavEnabled: false,
    controlsInside: false,
    imageScaleMode: "fill",
    arrowsNavAutoHide: false,
    autoScaleSlider: true,
    autoScaleSliderWidth: 1920,
    autoScaleSliderHeight: 530,
    controlNavigation: "none",
    thumbsFitInViewport: false,
    navigateByClick: false,
    startSlideId: 0,
    transitionType: "fade",
    globalCaption: false,
    deeplinking: {
        enabled: true,
        change: false
    },
    autoPlay: {
        enabled: false,
        pauseOnHover: false,
        delay: 4000
    }
});

$(".banner-atuacao").royalSlider({
    arrowsNav: false,
    loop: true,
    keyboardNavEnabled: false,
    controlsInside: false,
    imageScaleMode: "fill",
    arrowsNavAutoHide: false,
    autoScaleSlider: true,
    autoScaleSliderWidth: 1920,
    autoScaleSliderHeight: 450,
    controlNavigation: "none",
    thumbsFitInViewport: false,
    navigateByClick: false,
    startSlideId: 0,
    transitionType: "fade",
    globalCaption: false,
    deeplinking: {
        enabled: true,
        change: false
    },
    autoPlay: {
        enabled: false,
        pauseOnHover: false,
        delay: 4000
    }
});

$(".banner-servico").royalSlider({
    arrowsNav: false,
    loop: true,
    keyboardNavEnabled: false,
    controlsInside: false,
    imageScaleMode: "fill",
    arrowsNavAutoHide: false,
    autoScaleSlider: true,
    autoScaleSliderWidth: 1920,
    autoScaleSliderHeight: 500,
    controlNavigation: "none",
    thumbsFitInViewport: false,
    navigateByClick: false,
    startSlideId: 0,
    transitionType: "fade",
    globalCaption: false,
    deeplinking: {
        enabled: true,
        change: false
    },
    autoPlay: {
        enabled: false,
        pauseOnHover: false,
        delay: 4000
    }
});

$(".banner-mob").royalSlider({
    arrowsNav: false,
    loop: false,
    keyboardNavEnabled: false,
    controlsInside: false,
    imageScaleMode: "fill",
    arrowsNavAutoHide: false,
    autoScaleSlider: true,
    autoScaleSliderWidth: 991,
    autoScaleSliderHeight: 530,
    controlNavigation: "none",
    thumbsFitInViewport: false,
    navigateByClick: false,
    startSlideId: 0,
    transitionType: "fade",
    globalCaption: false,
    deeplinking: {
        enabled: true,
        change: false
    },
    autoPlay: {
        enabled: false,
        pauseOnHover: false,
        delay: 4000
    }
});

$(".slick-size-5").slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    arrows: true,
    infinite: false,
    prevArrow: '<div class="slick-prev"><img src="' + path_site + 'library/img/arrow.svg" /></div>',
    nextArrow: '<div class="slick-next"><img src="' + path_site + 'library/img/arrow.svg" /></div>',
    responsive: [
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 4
            }
        },
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 3
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 2
            }
        },
        {
            breakpoint: 576,
            settings: {
                slidesToShow: 1
            }
        }
    ]
});

$(".slick-cliente").slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    arrows: true,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 4000,
    prevArrow: '<div class="slick-prev"><img src="' + path_site + 'library/img/arrow.svg" /></div>',
    nextArrow: '<div class="slick-next"><img src="' + path_site + 'library/img/arrow.svg" /></div>',
    responsive: [
        {
            breakpoint: 1450,
            settings: {
                slidesToShow: 4
            }
        },
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 3
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 2
            }
        },
        {
            breakpoint: 576,
            settings: {
                slidesToShow: 1
            }
        }
    ]
});

$(".slick-size-4").slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    arrows: true,
    infinite: false,
    prevArrow: '<div class="slick-prev"><img src="' + path_site + 'library/img/arrow.svg" /></div>',
    nextArrow: '<div class="slick-next"><img src="' + path_site + 'library/img/arrow.svg" /></div>',
    responsive: [
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 3
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 2
            }
        },
        {
            breakpoint: 576,
            settings: {
                slidesToShow: 1
            }
        }
    ]
});


/* DESATIVAR MENU MOBILE POR 0.7s AO CLICAR */
$("#btn-menu").on("click", function () {
    if(!$(".navbar-toggler").hasClass("collapsed")) {
        $(".navbar-collapse").addClass("show");
    }
    $("#btn-menu-none").addClass("mostrar");
    setTimeout(function () {
        $("#btn-menu-none").removeClass("mostrar");
    }, 700);

    $(".menu-categoria-mob").removeClass("d-block");
    $(".menu-categoria-mob").addClass("d-none");
    $(".menu-produto-mob").removeClass("d-block");
    $(".menu-produto-mob").addClass("d-none");
    if (!$(this).hasClass("collapsed")) {
        setTimeout(function () {
            $(".navbar-collapse").removeClass("display-none");
        }, 500);
    }
});

/* EFEITO MENU RESPONSIVO */
$(".navbar-toggler").on("click", function () {
    if ($(this).hasClass("collapsed")) {
        $(".fundo-opacidade").addClass("shown");
        $("#conteudo-site").addClass("blur-3");
        $("body").css({"overflow": "hidden"});
    } else {
        $(".fundo-opacidade").removeClass("shown");
        $("#conteudo-site").removeClass("blur-3");
        $("body").css({"overflow": "auto"});
    }
});

/* BOTAO MUTAR E DESMUTAR VIDEO DO BANNER */
if (pg_id == "pg-home") {
    var video = document.getElementById("banner-video-play");
    $(".banner-video-som").on("click", function () {
        if (video.muted) {
            video.muted = false;
            $(".video-s-som").addClass("display-none");
            $(".video-c-som").removeClass("display-none");
        } else {
            video.muted = true;
            $(".video-s-som").removeClass("display-none");
            $(".video-c-som").addClass("display-none");
        }
    });
}

$(window).scroll(function () {
    var height = $(window).scrollTop();
    if (height > 5) {
        $(".container-header").addClass("fixo");
    } else {
        $(".container-header").removeClass("fixo");
    }
});

/* EFEITO AO CLICAR NO INPUT */
$(".form-item").on("click", function(e) {
    if(e.target.tagName == "LABEL") {
        if($(this).children().get(0).tagName == "INPUT") {
            $(this).children("input").focus();
        } else if($(this).children().get(0).tagName == "TEXTAREA") {
            $(this).children("textarea").focus();
        }
    }
    if($(this).children("input").is(":focus") || $(this).children("textarea").is(":focus")) {
        $(this).children("label").addClass("ativo");
    }
});
$(".form-contato input").on("focus", function () {
    $(this).parent().children("label").addClass("ativo");
});
$(".form-contato textarea").on("focus", function () {
    $(this).parent().children("label").addClass("ativo");
});
$(".form-contato input").on("blur", function () {
    if ($(this).val()) {
        $(this).parent().children("label").addClass("ativo");
    } else {
        $(this).parent().children("label").removeClass("ativo");
    }
});
$(".form-contato textarea").on("blur", function () {
    if ($(this).val()) {
        $(this).parent().children("label").addClass("ativo");
    } else {
        $(this).parent().children("label").removeClass("ativo");
    }
});

var easter_egg = new Konami(function() {
    konami_img = document.createElement("img");
    konami_img.src = path_site+"library/img/logo-byte.jpg";
    konami_img.className = "img-fluid";

    $("#poke").html(konami_img);
    
    $("#poke").fadeIn("slow", function() {});
    setTimeout(function () {
        $("#poke").fadeOut();
    }, 2000);
});

function pressionarContato(nomeInput) {
    var caracter = document.getElementById(nomeInput).value;
    var numCaracter = caracter.trim().length;
    if (numCaracter > 0) {
        if (nomeInput === "telefone") {
            if (numCaracter > 13) {
                document.getElementById(nomeInput).classList.add("active");
            } else {
                document.getElementById(nomeInput).classList.remove("active");
            }
        } else {
            document.getElementById(nomeInput).classList.add("active");
        }
    } else {
        document.getElementById(nomeInput).classList.remove("active");
    }
}

$(document).ready(function () {
    // outra verificacao, pois o royal nao adiciona a classe no menu no reload
    var height = $(window).scrollTop();
    if (height > 5) {
        $(".container-header").addClass("fixo");
    }

    if(chamada_prod != "") {
        $doc.animate({
            scrollTop: $("#produto-id-"+chamada_prod).offset().top - 60
        }, 500);
    }

    $(".form-contato .validar-email input[required]").on("keyup change", function () {
        var $group = $(this).closest(".form-contato .validar-email"),
                state = false;

        if (!$group.data("validate")) {
            state = $(this).val() ? true : false;
        } else if ($group.data("validate") === "email") {
            state = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test($(this).val());
        }

        if (state) {
            document.getElementById("email").classList.add("active");
        } else {
            document.getElementById("email").classList.remove("active");
        }
    });

    $(".form-contato .validar-email input[required]").trigger("change");

    $(".form-contato input[required]").each(function () {
        if (!($(this).attr("name") === "email")) {
            var inputChar = $(this).val();
            if ($(this).attr("name") === "telefone") {
                if (inputChar.length < 14) {
                    $(this).removeClass("active");
                } else {
                    $(this).addClass("active");
                }
            } else {
                if (inputChar.length > 0) {
                    $(this).addClass("active");
                } else {
                    $(this).removeClass("active");
                }
            }
        }
    });

    $(".form-contato textarea[required]").each(function () {
        var txtAreaChar = $(this).val();
        if (txtAreaChar.length > 0) {
            $(this).addClass("active");
        } else {
            $(this).removeClass("active");
        }
    });

    $(".form-contato input").each(function () {
        if ($(this).val()) {
            $(this).parent().children("label").addClass("ativo");
        }
    });
    $(".form-contato textarea").each(function () {
        if ($(this).val()) {
            $(this).parent().children("label").addClass("ativo");
        }
    });
});

$(window).on("load", function () {
//    setTimeout(function () {
//        $(".loader").fadeOut();
//    }, 500);
});
