"use strict";

// ページ遷移無し（非同期通信）でget送信する
$(".search_form").submit(function (e) {
    // $(".submit_btn").click(function (event) {
    // $(".submit_btn").click(function (event) {
    e.stopPropagation();

    let area = [];
    $("[name='area[]']:checked").each(function () {
        area.push(this.value);
    });

    let child_price = $("[name='child_price']:checked").val();
    let adult_price = $("[name='adult_price']:checked").val();
    let person = $("[name='person']:checked").val();
    let parking = $("[name='parking']:checked").val();
    let food_pantry = $("[name='food_pantry']:checked").val();
    let learning_support = $("[name='learning_support']:checked").val();
    let volunteer = $("[name='volunteer']:checked").val();

    $.ajax({
        type: "GET",
        url: localize.ajax_url,
        data: {
            action: "view_search_results",
            area: area,
            child_price: child_price,
            adult_price: adult_price,
            person: person,
            parking: parking,
            food_pantry: food_pantry,
            learning_support: learning_support,
            volunteer: volunteer,
            nonce: localize.nonce,
        },
    })
        .done(function (response) {
            // console.log("成功:", response);
            $(".searcharea").html(response);
        })
        .fail(function (response) {
            // console.log("失敗");
        })
        .always(function (response) {
            // console.log("完了");
            var position = $(".searcharea").offset().top - 150;
            $("html,body").animate(
                {
                    scrollTop: position,
                },
                {
                    queue: false,
                }
            );
        });

    return false;
});

// ページネーションのリンクをクリックした時の処理
$(document).on("click", ".page-numbers", function (e) {
    e.preventDefault(); // ページ遷移をキャンセル

    let show_page = $(this).text();
    let current_page = Number($(".current").text());

    if ($(this).hasClass("prev")) {
        show_page = current_page - 1;
    } else if ($(this).hasClass("next")) {
        show_page = current_page + 1;
    }

    let area = document.querySelector(".my-element").dataset.area;
    if (area !== undefined) {
        area = JSON.parse(area);
    }

    let child_price = document.querySelector(".my-element").dataset.child_price;
    let adult_price = document.querySelector(".my-element").dataset.adult_price;
    let person = document.querySelector(".my-element").dataset.person;
    let parking = document.querySelector(".my-element").dataset.parking;
    let food_pantry = document.querySelector(".my-element").dataset.food_pantry;
    let learning_support =
        document.querySelector(".my-element").dataset.learning_support;
    let volunteer = document.querySelector(".my-element").dataset.volunteer;

    // console.log(area);
    // console.log(child_price);
    // console.log(adult_price);
    // console.log(person);
    // console.log(parking);
    // console.log(food_pantry);
    // console.log(learning_support);
    // console.log(volunteer);

    // Ajaxリクエストを送信
    $.ajax({
        type: "get",
        url: localize.ajax_url,
        data: {
            show_page: show_page,
            action: "view_search_results",
            area: area,
            child_price: child_price,
            adult_price: adult_price,
            person: person,
            parking: parking,
            food_pantry: food_pantry,
            learning_support: learning_support,
            volunteer: volunteer,
            nonce: localize.nonce,
        },
        dataType: "html",
    })
        .done(function (data) {
            // console.log("成功:", data);
            $(".searcharea").html(data);
            // console.log("元の現在ページは", current_page);
            // console.log("現在ページは", show_page);
        })
        .fail(function (data) {
            // console.log("失敗");
        })
        .always(function (data) {
            // console.log("完了");
            var position = $(".searcharea").offset().top - 150;
            $("html,body").animate(
                {
                    scrollTop: position,
                },
                {
                    queue: false,
                }
            );
        });
});
