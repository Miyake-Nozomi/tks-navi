<?php


function remove_cssjs_ver2( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'remove_cssjs_ver2', 9999 );
add_filter( 'script_loader_src', 'remove_cssjs_ver2', 9999 );


//global-styles-inline-cssを排除
function remove_my_global_styles() {
	wp_dequeue_style( 'global-styles' );
}
add_action( 'wp_enqueue_scripts', 'remove_my_global_styles' );




//after_setup_themeアクションフックを使用する関数をまとめる
function my_theme_setup() {
    add_theme_support('post-thumbnails'); //アイキャッチ画像を使用可能にする
    add_theme_support('menus'); //カスタムメニュー機能を使用可能にする
    if (!is_tax('area')) {
        add_theme_support('title-tag'); //<title>タグを出力する
    }
}
add_action('after_setup_theme', 'my_theme_setup');


function add_my_files() {
    //WordPress本体のJQueryを登録解除
    wp_deregister_script('jquery');
    //jquery読み込み
    wp_enqueue_script('jquery',get_template_directory_uri().'/assets/js/jquery-3.6.3.min.js',array(),'3.6.3',true);
    //slick本体読み込み
    wp_enqueue_script('slick-min',get_template_directory_uri().'/assets/slick/js/slick.min.js',array('jquery'),'1.0',true);
    //header.jsの読み込み
    wp_enqueue_script('header',get_template_directory_uri().'/assets/js/header.js',array('jquery'),'1.0',true);
    //WP Paginateの既存CSSを読み込まないようにする
    wp_deregister_style('wp-paginate');

    //以下はheaderに出力
    //Google fonts
    // wp_enqueue_style('Google-fonts-Kosugi+Maru', 'https://fonts.googleapis.com/css2?family=Kosugi+Maru&display=swap');
    wp_enqueue_style('Google-fonts-Zen+Maru+Gothic', 'https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@400;500;700&display=swap');
    // wp_enqueue_style('Google-fonts-Noto+Sans', 'https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;500;900&display=swap');
    //font awesomeの読み込み
    wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css');
    //リセットCSSの読み込み
	wp_enqueue_style('reset', get_template_directory_uri() .'/assets/css/reset.css');
    //common.cssの読み込み
    wp_enqueue_style('my-common', get_template_directory_uri() . '/assets/css/common.css',array('slick-theme'));
    //slickのCSSの読み込み
    wp_enqueue_style('slick', get_template_directory_uri() . '/assets/slick/css/slick.css',array('reset'));
    wp_enqueue_style('slick-theme', get_template_directory_uri() . '/assets/slick/css/slick-theme.css',array('slick'));

    //TOPページのみ出力
    if (is_front_page()) {
        wp_enqueue_style('front-page',get_template_directory_uri() . '/assets/css/front-page.css',array('my-common')
        );
        //index.jsの読み込み
        wp_enqueue_script('index',get_template_directory_uri().'/assets/js/index.js',array('header'),'1.0',true);
    }

    //taxonomy-areaページのみ出力
    if (is_tax('area')) {
        wp_enqueue_style('taxonomy-area',get_template_directory_uri() . '/assets/css/taxonomy-area.css',array('my-common')
        );
    }

    //taxonomy-linkページのみ出力
    if (is_tax('link')) {
        wp_enqueue_style('taxonomy-link',get_template_directory_uri() . '/assets/css/taxonomy-link.css',array('my-common')
        );
        //tab.jsの読み込み
        wp_enqueue_script('tab',get_template_directory_uri().'/assets/js/tab.js',array('header'),'1.0',true);
    }




    //single-cafeinfoページのみ出力
    if (is_singular('cafeinfo')) {
        wp_enqueue_style('single-cafeinfo',get_template_directory_uri() . '/assets/css/single-cafeinfo.css',array('my-common')
        );
        //single-cafeinfo.jsの読み込み
        wp_enqueue_script('single-cafeinfo',get_template_directory_uri().'/assets/js/single-cafeinfo.js',array('header'),'1.0',true);

        //no_spam_mail.jsの読み込み
        wp_enqueue_script('no_spam_mail',get_template_directory_uri().'/assets/js/no_spam_mail.js',array('jquery'),'1.0',true);
    }

    //single-interviewページのみ出力
    if (is_singular('interview')) {
        wp_enqueue_style('single-interview',get_template_directory_uri() . '/assets/css/single-interview.css',array('my-common')
        );
        //single-interview.jsの読み込み
        wp_enqueue_script('single-interview',get_template_directory_uri().'/assets/js/single-interview.js',array('header'),'1.0',true);
    }

    //記事一覧ページのみ出力
    if (is_page('post') || is_category()) {
        wp_enqueue_style('page-post',get_template_directory_uri() . '/assets/css/page-post.css',array('my-common')
        );
    }

    //最新記事詳細ページのみ出力
    if (is_singular('post')) {
        wp_enqueue_style('single-post',get_template_directory_uri() . '/assets/css/single-post.css',array('my-common')
        );
    }

    // page-contactのみ出力
    if (is_page('contact')) {
        wp_enqueue_style('page-contact', get_template_directory_uri() . '/assets/css/page-contact.css', array('my-common')
        );
    }

    // page-confirmのみ出力
    if (is_page('confirm')) {
        wp_enqueue_style('page-confirm', get_template_directory_uri() . '/assets/css/page-contact.css', array('my-common')
        );
    }

    // page-thanksのみ出力
    if (is_page('thanks')) {
        wp_enqueue_style('page-thanks', get_template_directory_uri() . '/assets/css/page-contact.css', array('my-common')
        );
    }

    // page-conceptのみ出力
    if (is_page('concept')) {
        wp_enqueue_style('page-concept', get_template_directory_uri() . '/assets/css/page-concept.css', array('my-common')
        );
    }

    // page-supportのみ出力
    if (is_page('support')) {
        wp_enqueue_style('page-support', get_template_directory_uri() . '/assets/css/page-support.css', array('my-common')
        );
        //tab.jsの読み込み
        wp_enqueue_script('tab',get_template_directory_uri().'/assets/js/tab.js',array('header'),'1.0',true);
    }

    // page-aboutのみ出力
    if (is_page('about')) {
        wp_enqueue_style('page-about', get_template_directory_uri() . '/assets/css/page-about.css', array('my-common')
        );
    }

    // page-faqのみ出力
    if (is_page('faq')) {
        wp_enqueue_style('page-faq', get_template_directory_uri() . '/assets/css/page-faq.css', array('my-common')
        );
    }

    // page-praivacy_policyのみ出力
    if (is_page('praivacy_policy')) {
        wp_enqueue_style('page-praivacy_policy', get_template_directory_uri() . '/assets/css/page-praivacy_policy.css', array('my-common')
        );
    }

    // programのみ出力
    if (is_page('program')) {
        wp_enqueue_style('program', get_template_directory_uri() . '/assets/css/page-program.css', array('my-common')
        );
    }

        // programlistのみ出力
        if (is_page('programlist')) {
            wp_enqueue_style('programlist', get_template_directory_uri() . '/assets/css/page-programlist.css', array('my-common')
            );
        }

        // page-abminのみ出力
    if (is_page('admin')) {
        wp_enqueue_style('page-admin', get_template_directory_uri() . '/assets/css/page-admin.css', array('my-common')
        );
    }

    // 404のみ出力
    if (is_404()) {
        wp_enqueue_style('404', get_template_directory_uri() . '/assets/css/404.css', array('my-common')
        );
    }

    // 詳細検索ページのみ出力
    if (is_page('find')) {
        wp_enqueue_style('page-search', get_template_directory_uri() . '/assets/css/page-search.css', array('my-common')
        );
        //page-search.jsの読み込み
        wp_enqueue_script('page-search',get_template_directory_uri().'/assets/js/page-search.js',array('header'),'1.0',true);
    }

        // 協賛団体リンク集ページのみ出力
    if (is_page('sponsorship')) {
        wp_enqueue_style('sponsorship', get_template_directory_uri() . '/assets/css/page-sponsorship.css', array('my-common')
        );
    }

        // ロゴページのみ出力
            if (is_page('logo')) {
                wp_enqueue_style('logo', get_template_directory_uri() . '/assets/css/page-logo.css', array('my-common')
                );
            }

    // event一覧のみ出力
    if (is_post_type_archive('event')) {
        wp_enqueue_style('archive-event', get_template_directory_uri() . '/assets/css/archive-event.css', array('my-common')
        );
    }

        // interview一覧のみ出力
    if (is_post_type_archive('interview')) {
        wp_enqueue_style('archive-interview', get_template_directory_uri() . '/assets/css/archive-interview.css', array('my-common')
        );
    }

        // cafeinfo一覧のみ出力
    if (is_post_type_archive('cafeinfo')) {
        wp_enqueue_style('archive-cafeinfo', get_template_directory_uri() . '/assets/css/archive-cafeinfo.css', array('my-common')
        );
    }

        //index.phpのみ出力
    // if (is_singular('event')) {
    //     wp_enqueue_style('single-event',get_template_directory_uri() . '/assets/css/single-event.css',array('my-common')
    //     );
    // }

        //search.phpのみ出力
            if (is_search()) {
                wp_enqueue_style('search',get_template_directory_uri() . '/assets/css/search.css',array('my-common')
                );
            }
}

add_action('wp_enqueue_scripts' ,'add_my_files');

/* フォームの内容を取得してAjaxに送信するプログラムが記述されたJavascriptをheadタグにキュー */
add_action('wp_enqueue_scripts', function () {
    $handle = 'find_ajax';
            $file = get_template_directory_uri() . '/assets/js/' . $handle . '.js';

    // 詳細検索ページのみ出力
    if (is_page('find')) {
        wp_register_script($handle, $file, array('jquery'), '3.6.0', true);
    }

    $localize = [
    'ajax_url' => admin_url('admin-ajax.php'),
    'action' => 'view_search_results',
    'nonce' => wp_create_nonce('view_search_results')
    ];
    wp_localize_script($handle, 'localize', $localize);
    wp_enqueue_script($handle);

});


/* Ajaxから取得したnonceを認証し、認証通過したらテンプレートを出力する */
function view_search_results()
{
    $nonce = $_REQUEST['nonce'];
    if (wp_verify_nonce($nonce, 'view_search_results')) {
    get_template_part('template-parts/ajax-search');

    }
    die();
}

add_action('wp_ajax_view_search_results', 'view_search_results'); //第一引数は wp_ajax_{ファンクション名} にする
add_action('wp_ajax_nopriv_view_search_results', 'view_search_results'); //第一引数は wp_ajax_nopriv_{ファンクション名} にする


// Contact Form 7で自動挿入されるPタグ、brタグを削除
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
    return false;
}


// /* フォームの内容を取得してAjaxに送信するプログラムが記述されたJavascriptをheadタグにキュー */
// add_action('wp_enqueue_scripts', function () {
//     $contact_handle = 'contact';
//             $contact_file = get_template_directory_uri() . '/assets/js/' . $contact_handle . '.js';

//     // 詳細検索ページのみ出力
//     if (is_page('contact')) {
//         wp_register_script($contact_handle, $contact_file, array('jquery'), '3.6.0', true);
//     }

//     $contact_localize = [
//     'ajax_url' => admin_url('admin-ajax.php'),
//     'action' => 'contact_form_confirm',
//     'nonce' => wp_create_nonce('contact_form_confirm')
//     ];
//     wp_localize_script($contact_handle, 'localize', $contact_localize);
//     wp_enqueue_script($contact_handle);

// });


// /* Ajaxから取得したnonceを認証し、認証通過したらテンプレートを出力する */
// function contact_form_confirm()
// {
//     $contact_nonce = $_REQUEST['nonce'];
//     if (wp_verify_nonce($contact_nonce, 'contact_form_confirm')) {
//     echo do_shortcode('[contact-form-7 id="996" title="確認画面用_copy"]');
//     }
//     die();
// }

// add_action('wp_ajax_contact_form_confirm', 'contact_form_confirm'); //第一引数は wp_ajax_{ファンクション名} にする
// add_action('wp_ajax_nopriv_contact_form_confirm', 'contact_form_confirm'); //第一引数は wp_ajax_nopriv_{ファンクション名} にする


//


//投稿表示件数を変更する
// function my_pre_get_posts($query) {
//     //管理画面、メインクエリには設定しない(サブクエリに設定する)
//     if (is_admin() || $query->is_main_query()) {
//         return;
//     }

    //     return;
    // //トップページの場合
    // if ($query->is_front_page()) {
    //     $query->set('posts_per_page', 2);
    //     return;
    // }

    // 固定ページの場合
    // if ($query->is_page('post')) {
    //     $query->set('posts_per_page',5);
    //     $query->set('paged', get_query_var('paged') ? get_query_var('paged') : 1);
    //     return;
    // }

    // インタビュー一覧ページの場合
    // if ($query->is_post_type_archive('interview')) {
    //     $query->set('posts_per_page', 6);
    //     $query->set('paged', get_query_var('paged') ? get_query_var('paged') : 1);
    //     return;
    // }

        // 開催情報一覧ページの場合
    // if ($query->is_post_type_archive('event')) {
    //     $query->set('posts_per_page', 6);
    //     $query->set('paged', get_query_var('paged') ? get_query_var('paged') : 1);
    //     return;
    // }


    // エリア検索ページの場合
    // if ($query->is_tax('area')) {
    //     $query->set('posts_per_page', 9);
    //     $query->set('paged', get_query_var('paged') ? get_query_var('paged') : 1);
    //     return;
    // }

    // 条件検索ページの場合
    // if ($query->is_page('search')) {
    //     $query->set('posts_per_page', 9);
    //     $query->set('paged', get_query_var('paged') ? get_query_var('paged') : 1);
    //     return;
    // }

// }
// add_action('pre_get_posts', 'my_pre_get_posts');


//自作ページネーションを読み込ませる
function original_pagenation(){

    the_posts_pagination(
        array(
            'mid_size' => 1,
            'prev_next' => true,
            'prev_text' => '<div class="page_triangle_left"></div>',
            'next_text' => '<div class="page_triangle_right"></div>',
            'type' => 'plain',
            'screen_reader_text' => 'ページネーション',
        )
    );
}

function custom_the_posts_pagination( $template ) {
	$template = '
	<div class="p-posts-pagination %1$s" role="navigation">
		<h2 class="screen-reader-text">%2$s</h2>
		<div class="page_nav flex">%3$s</div>
	</div>';
	return $template;
}
add_filter( 'navigation_markup_template', 'custom_the_posts_pagination' );

//ico画像を追加できるようにする
function my_custom_mime_types( $mimes ) {
// New allowed mime types.
$mimes['ico'] = 'image/vnd.microsoft.icon';

// Optional. Remove a mime type.
unset( $mimes['exe'] );
return $mimes;
}
add_filter( 'upload_mimes', 'my_custom_mime_types' );

// page-contactのみセッション・キャッシュ・cookie削除
// if (is_page('contacgt')) {
//     session_start();
//     //連想配列の中身を空にする
//     $_SESSION = []; //$_SESSION = array()と同じ意味
//     //連想配列の中身を空にする
//     if(isset($_COOKIE[session_name()])){
//         $cparam = session_get_cookie_params();
//         setcookie(session_name(),"",
//         time() - 60 *60, //時間さかのぼり削除をここでしている
//         $cparam['path'],
//         $cparam['domain'],
//         $cparam['secure'],
//         $cparam['httponly'],

//     );
//     //sessionを切る
//     session_destroy();
//     }
// }