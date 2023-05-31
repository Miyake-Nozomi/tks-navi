"use strict";

// ページ遷移無し（非同期通信）でget送信する

// $(function () {
//     $(".submit_btn").click(function (event) {
//         event.preventDefault();
//     }),
// var formData = $(".search_form").serialize();

// $.ajax({
//     url: "page-find.php",
//     type: "get",
//     data: formData,
//     timeout: 10000,
//     dataType: "text",
// })
//     .done(function (data) {
//         // 通信が成功したときの処理
//     })
//     .fail(function (data) {
//         // 通信が失敗したときの処理
//     })
//     .always(function (data) {
//         // 通信が完了したとき
//     });
// });

$(".search_form").submit(function (event) {
    event.preventDefault(); // 送信ボタンのデフォルトの動作を無効化する

    // var formData = $(this).serialize(); // フォームのデータをシリアライズする

    let adult_price = $('input[name="adult_price"]').val();

    $.ajax({
        url: "",
        type: "get",
        // data: formData,
        timeout: 10000,
        data: { adult_price },
        dataType: "text",
        success: function (data) {
            // 通信が成功したときの処理
            console.log("成功:", data);
            console.log(adult_price);
        },
        error: function (xhr, status, error) {
            // 通信が失敗したときの処理
            console.log("失敗:", error);
        },
        complete: function (xhr, status) {
            // 通信が完了したときの処理
            console.log("完了");
        },
    });
});

// 「さがす」ボタンが押されたら、検索結果一覧まで移動

//スクロールさせたい場所を定義;
var position = $(".searcharea").offset().top;

// 指定のボタンを押したら、スクロールさせる。
$(".submit_btn").click(function () {
    $("html,body").animate(
        {
            scrollTop: position,
        },
        {
            queue: false,
        }
    );
});
