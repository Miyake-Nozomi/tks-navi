"use strict";

jQuery(function ($) {
    var delimiter = ","; //分割文字をカンマに設定
    if ($("span.nsm").length !== 0) {
        //メールアドレスがある場合のみ実行
        if ($("span.nsm").text() !== "") {
            var nsm_strings = $("span.nsm").text().split(delimiter); //分割文字で分割
            var pre = $.trim(nsm_strings[0]); //最初の部分から空白を削除
            var domain = "&#64;" + $.trim(nsm_strings[1]);
            //@（&#64;）と後ろの部分から空白を削除したものを連結
            var nsm_address = pre + domain; //メールアドレスを組み立てる
            $("span.nsm").html(nsm_address);
        }
    }
});
