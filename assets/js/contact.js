"use strict";

// メールアドレスが一致していない時のアラート
// $(function () {
//     // Email確認用にメールアドレスが入力されたら……
//     $(".checkbox-001").on("input", function () {
//         // emailフォームの入力値をemailに格納する
//         let email = $("#email").val();
//         // email_checkファームの入力値をemailCheckに格納する
//         let emailCheck = $("#email_check").val();
//         // もしメールアドレスが一致しなかったら
//         if (email != emailCheck) {
//             // エラーメッセージのセット
//             this.setCustomValidity("メールアドレスが一致しません");
//         } else {
//             // エラーメッセージのクリア
//             this.setCustomValidity("");
//         }
//     });
// });

// $(".form").submit(function (e) {
//     e.preventDefault(); // デフォルトのフォーム送信をキャンセル

//     let contact_subjects = $("#contact_subjects").val();
//     let name = $("#name").val();
//     let furigana = $("#furigana").val();
//     let email = $("#email").val();
//     let message = $(".message").val();
//     let check = $(".checkbox-001").val();

//     $.ajax({
//         type: "POST",
//         url: localize.ajax_url,
//         data: {
//             action: "contact_form_confirm",
//             contact_subjects: contact_subjects,
//             name: name,
//             furigana: furigana,
//             email: email,
//             message: message,
//             check: check,
//             nonce: localize.nonce,
//         },
//     })
//         .done(function (response) {
//             console.log("成功:", response);
//             $(".contact2").html(response);

//             // 確認画面に表示するために値を渡す
//             $(".dialog_subject").text(contact_subjects);
//             $(".dialog_name").text(name);
//             $(".dialog_furigana").text(furigana);
//             $(".dialog_email").text(email);
//             $(".dialog_message").text(message);
//             $(".dialog_checkbox-001").text(check);
//             if (wpcf7 && typeof wpcf7.init === "function") {
//                 document
//                     .querySelectorAll(".wpcf7 > form")
//                     .forEach(function (form) {
//                         wpcf7.init(form);
//                     });
//             }
//         })
//         .fail(function (response) {
//             console.log("失敗");
//         })
//         .always(function (response) {
//             console.log("完了");
//         });
//     return false;
// });
