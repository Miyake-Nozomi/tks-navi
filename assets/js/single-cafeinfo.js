"use strict";
$(".ac_slide").slick({
    dots: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 4000,
    arrows: false,
    adaptiveHeight: true,
    centerMode: true,
    centerPadding: "15%",
    slidesToShow: 1,
    responsive: [
        {
            breakpoint: 770,
            settings: {
                centerPadding: "10%",
            },
        },
    ],
});

$(".past_slide").slick({
    dots: false,
    slidesToShow: 2,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [
        {
            breakpoint: 770,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 1000,
            },
        },
    ],
});

// スクロールの文字のアニメーション
$(function () {
    $(".firstview_scroll_p").textillate({
        loop: true,
        // フェードインのアニメーション
        in: {
            effect: "rotateIn",
            delay: 50,
        },
        // フェードアウトのアニメーション
        out: {
            effect: "rotateOut",
            delay: 50,
        },
    });
});
