<?php get_header(); ?>
<?php
// $custom_query = new WP_Query(
//     array(
//         $post__in = wp_ulike_get_popular_items_ids(array(
//             'type'       => 'post',
//             'rel_type'   => 'interview',
//             'status'     => 'like',
//             'period'     => 'all',
//         )),
//         'posts_per_page' => -1, // 全件表示
//         'post__in' => $post__in,
//         'post_type' => 'interview', // カスタム投稿名
//         'orderby' => 'post__in',
//         'order' => 'DESC' // いいねの降順
//     )
// );

    // $post__in = array(
    //                     'type'       => 'post',
    //                     'rel_type'   => 'interview',
    //                     'period'     => 'all',
    //                     'meta_query' => array(
    //                         'relation' => 'OR',
    //                             array(
    //                                 'key' => 'like_status',
    //                                 'value' => 'like',
    //                                 'compare' => '=',
    //                             ),
    //                             array(
    //                                 'relation' => 'AND',
    //                                 array(
    //                                     'key' => 'like_status',
    //                                     'value' => '',
    //                                     'compare' => '=',
    //                                 ),
    //                                 array(
    //                                     'key' => 'like_count',
    //                                     'value' => '0',
    //                                     'compare' => '=',
    //                                 ),
    //                                 'orderby' => 'rand'
    //                             )
    //                         ));

//     //いいねされている記事を取得
//     $like_posts = wp_ulike_get_popular_items_ids(
//     array(
//         'type'       => 'post',
//         'rel_type'   => 'interview',
//         'status'     => 'like',
//         'period'     => 'all',
//     )
// );

// // いいねが設定されていない記事を取得
// $not_like_posts = array(
//     'post_type'      => 'interview', // カスタム投稿名
//     'meta_query'     => array(
//         'relation' => 'OR',
//         array(
//             'key'     => 'like_status',
//             'compare' => 'NOT EXISTS',
//         ),
//         array(
//             'relation' => 'AND',
//             array(
//                 'key'     => 'like_status',
//                 'value'   => '',
//                 'compare' => '!=',
//             ),
//             array(
//                 'key'     => 'like_count',
//                 'value'   => '0',
//                 'compare' => '>',
//                 'type'    => 'NUMERIC',
//             ),
//         ),
//     ),
//     'post__not_in' => $like_posts,
//     'orderby'      => 'rand'
// );

// // 2つの配列をマージ
// $post__in = array_merge( $like_posts, $not_like_posts );

//     $hoge = array(
//         'posts_per_page' => -1, // 全件表示
//         'post__in' => $post__in,
//         'post_type' => 'interview', // カスタム投稿名
//         'orderby' => 'post__in',
//         'order' => 'DESC' // いいねの降順
//     );
//     $custom_query = new WP_Query($hoge);

//おしらせ一覧のサブクエリ
$args = array(
		'post_type' => 'post',
		'posts_per_page' => 3,
	);
$the_query = new WP_Query($args);


// いいねが押されている記事を取得し、いいね順にソート
$like_posts = wp_ulike_get_popular_items_ids(
    array(
        'type'       => 'post',
        'rel_type'   => 'interview',
        'status'     => 'like',
        'period'     => 'all',
    )
);
// いいねが押されていない記事をランダムに取得
$not_like_posts = get_posts(
    array(
        'post_type'      => 'interview', // カスタム投稿名
        'posts_per_page' => -1,
        'post__not_in'   => $like_posts, // いいねされている記事のIDを除外
        'orderby'        => 'rand',
    )
);
// いいねが押されている記事といいねが押されていない記事を順番を保ったままマージ
$merged_posts = array_merge( $like_posts, wp_list_pluck( $not_like_posts, 'ID' ) );
// クエリを作成し、記事を取得
$custom_query = new WP_Query( array(
    'post_type'      => 'interview',
    'post__in'       => $merged_posts,
    'orderby'        => 'post__in',
    'posts_per_page' => -1,
) );

	// $hoge = array(
	// 	'post_type' => 'interview',
	// 	'posts_per_page' => -1, //全件表示
    //     'orderby' => 'rand',
	// );
	// $custom_query = new WP_Query($hoge);

$current_time = date_i18n('Y-m-d');
$fuga = array(
		'post_type' => 'event',
		'posts_per_page' => 3,
        //非公開のは出さないようにする！！


        'meta_key' => 'class',
        //不定期のもの
        'meta_value' => 2,
        'meta_query' => array(
		array(
			'key' => 'datetime', // 記事の日付を表すカスタムフィールドのキーを指定
			'value' => $current_time, // 現在の日付以降の記事を表示するために、現在の日付を指定
			'compare' => '>=', // 指定した値以上のものを取得する
			'type' => ' DATETIME', // カスタムフィールドの値が日付形式であることを指定
        )
        )

	);
$event_query = new WP_Query($fuga);

// $piyo = array(
    // 'post_type'      => 'cafeinfo',
    // 'post_in'       => array(480,473,455,459,461),
    // 'posts_per_page' => 5,
    // 'orderby'        => 'date',
        // 'orderby'        => 'rand',
    // 'order'          => 'ASC',
    // //なぜか紬だけ出てしまう・・・
    // // 'post__not_in'   => 448,
    // 'meta_query'     => array(
    //     array(
    //         'name'    => 'pic1',
    //         'value'   => 'http',
    //         'compare' => 'LIKE',
    //     ),
    // ),
// );
// $pic_query = new WP_Query($piyo);

?>

<main class="main">
    <div class="main_inner">
        <!-- headerがposition fixedなのでheader分の余白調整のためblock -->
        <div class="block"></div>
        <!-- キービジュアル -->
        <section>
            <!-- <form class="hbg_search_pc" action="<?php //echo home_url('/'); ?>" method="get">
                <input type="hidden" name="search_type" value="keywords">
                <input class="hbg_form" size="25" type="search" name="s" value="<?php //the_search_query(); ?>" name="search" placeholder="キーワードを入力" id="" />
                <input class="hbg_submit fas" type="submit" value="">
            </form> -->
            <ul class="kv_slider">
                <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/kv/kv1.jpg" alt="KV画像">
                </li>
                <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/kv/kv2.jpg" alt="KV画像">
                </li>
                <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/kv/kv3.jpg" alt="KV画像">
                </li>
                <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/kv/kv4.jpg" alt="KV画像">
                </li>
                <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/kv/kv5.jpeg" alt="KV画像">
                </li>
                <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/kv/kv6.jpg" alt="KV画像">
                </li>
                <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/kv/kv7.jpg" alt="KV画像">
                </li>
                <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/kv/kv8.jpg" alt="KV画像">
                </li>
                <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/kv/kv9.jpg" alt="KV画像">
                </li>
            </ul>
            <h2 class="kvphrase">
                誰でもおいで！<br />
                &emsp;みんなでごはん、<br />
                &emsp;&emsp;食べるんじょ！
            </h2>
        </section>
        <!-- こども食堂とは -->
        <section class="concept">
            <div class="section_inner onigiri_inner">
                <div class="title concept_title">
                    <h2>こども食堂とは</h2>
                </div>
                <div class="concept_text">
                    <div class="text text_border">
                        <p>
                            こども食堂と聞くと、”貧困層のための場所”や、”こどもや子育て世代向けのもの”といったイメージを抱く方も多いと思います。実際はそうではなく、こどもの為の場であることはもちろんですが、地域の人や大人、様々な世代の人が集まって、一緒にごはんを食べて交流できる場です。地域とのつながりや、多世代交流をする地域コミュニティとしての役割も担っています。
                        </p>
                    </div>
                    <img class="onigiri"
                        src="<?php echo get_template_directory_uri(); ?>/assets/images/index/onigiri.png" alt="おにぎり" />
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/index/onigiri.png"
                        class="onigiri_small" aria-hidden="true" />
                    <a href="<?php echo home_url('/concept'); ?>">
                        <div class="btn_item">もっと見る</div>
                    </a>
                </div>
            </div>
        </section>
        <!-- <img src="<?php //echo get_template_directory_uri(); ?>/assets/images/index/rainbowbottom.png" alt="#" class="concept_wave" /> -->

        <!-- このサイトについて -->
        <section>
            <!-- <svg class="infotop svgwave" xmlns="http://www.w3.org/2000/svg" viewBox="0  200 1440 100">
                <path fill="#FFF8E6" fill-opacity="1"
                    d="M0,256L48,261.3C96,267,192,277,288,282.7C384,288,480,288,576,282.7C672,277,768,267,864,250.7C960,235,1056,213,1152,213.3C1248,213,1344,235,1392,245.3L1440,256L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                </path>
            </svg> -->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                viewBox="0 0 100 10" preserveAspectRatio="none">
                <path d="M0,0 v5 q25,2 50,0 t50,0  v-5 Z" fill="#d7f794"></path>
            </svg>
            <div class="section_inner rainbow_inner">
                <h2 class="title">このサイトについて</h2>
                <div class="about_box">
                    <div class="logo_act">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo_act.png" alt="ロゴ">
                    </div>
                    <div class="text about_text">
                        <p>
                            徳島県には、こども食堂がたくさんあります。<br>
                            ”こども食堂って何なの？という人”や、”こども食堂へ行ってみたい人・手伝いたい人・支援したい人”へ分かりやすく情報をお届けする！をスローガンにこのサイトを作りました。ぜひ、自分の家の近くのこども食堂を探して行ってみてください！
                        </p>
                    </div>
                </div>


                <a href="<?php echo home_url('/about'); ?>" class="">
                    <div class="btn_item">
                        もっと見る
                    </div>
                </a>
                <!-- <img src="<?php //echo get_template_directory_uri(); ?>/assets/images/index/rainbow.png" alt="虹" -->
                <!-- class="rainbow"> -->
            </div>
        </section>
        <!-- Pick Upインタビュー一覧 -->
        <section class="interviews">
            <!-- <img src="<?php //echo get_template_directory_uri(); ?>/assets/images/index/interviewtop.png" alt="波" class="interview" /> -->
            <!-- <svg class="interviewtop svgwave" xmlns="http://www.w3.org/2000/svg" viewBox="0  200 1440 100">
                <path fill="#FDFFB0" fill-opacity="1"
                    d="M0,256L48,261.3C96,267,192,277,288,282.7C384,288,480,288,576,282.7C672,277,768,267,864,250.7C960,235,1056,213,1152,213.3C1248,213,1344,235,1392,245.3L1440,256L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                </path>
            </svg> -->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                viewBox="0 0 100 10" preserveAspectRatio="none">
                <path d="M0,0 v5 q16.67,2 33.3,0 t33.3,0  t33.3,0 v-5 Z" fill="#fff8e6"></path>
            </svg>
            <div class="section_inner interviews_section_inner">
                <div class="title taleft">
                    <h2>
                        特集記事 <br />
                        Pick upインタビュー一覧
                    </h2>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/index/pink_marker.png"
                        alt="マーカー" class="crayon" />
                </div>
                <div class="pickup_slide">
                    <ul class="pickup_slider flex">
                        <?php if ($custom_query->have_posts()) : ?>
                        <?php while($custom_query->have_posts()) : ?>
                        <?php $custom_query->the_post(); ?>
                        <?php get_template_part('template-parts/loop', 'interview'); ?>
                        <?php endwhile; ?>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>
                    </ul>
                </div>
                <a href="<?php echo home_url('/interview'); ?>">
                    <div class="btn_item">もっと見る</div>
                </a>
            </div>
            <!-- <img src="<?php //echo get_template_directory_uri(); ?>/assets/images/index/interviewbottom.png" alt="波" class="interview" /> -->
        </section>
        <!--エリアからこども食堂をさがす -->
        <section class="map w100">
            <!-- <svg class="maptop svgwave" xmlns="http://www.w3.org/2000/svg" viewBox="0  200 1440 100">
                <path fill="#fff8e6" fill-opacity="1"
                    d="M0,256L48,261.3C96,267,192,277,288,282.7C384,288,480,288,576,282.7C672,277,768,267,864,250.7C960,235,1056,213,1152,213.3C1248,213,1344,235,1392,245.3L1440,256L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                </path>
            </svg> -->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                viewBox="0 0 100 10" preserveAspectRatio="none">
                <path d="M0,0 v5 q25,-2 50,0 t50,0  v-5 Z" fill="#fdffb0"></path>
            </svg>
            <div class="section_inner">
                <h2 class="title">
                    エリアから </br> こども食堂をさがす
                </h2>
                <div class="serch_map_img_inner">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/index/map_serch.png" alt="虫眼鏡"
                        class="serch_map_img" />
                </div>
                <div class="map_pic">
                    <a href="<?php echo home_url('/area/east'); ?>" class="serch_btn north">東部</a>
                    <a href="<?php echo home_url('/area/south'); ?>" class="serch_btn south">南部</a>
                    <a href="<?php echo home_url('/area/west'); ?>" class="serch_btn west">西部</a>
                    <img class="pic"
                        src="<?php echo get_template_directory_uri(); ?>/assets/images/index/tokushima_map.png"
                        alt="地図" />
                </div>
                <a href="<?php echo home_url('/find'); ?>">
                    <div class="btn_item">条件からさがす</div>
                </a>
            </div>
        </section>
        <!-- 支援したい方へ -->
        <section class="childcafe w100">
            <!-- <img src="<?php //echo get_template_directory_uri(); ?>/assets/images/index/onigiriup.png" alt="波" class="onigiriup" /> -->
            <!-- <svg class="childcafetop svgwave" xmlns="http://www.w3.org/2000/svg" viewBox="0  200 1440 100">
                <path fill="#D7F794" fill-opacity="1"
                    d="M0,256L48,261.3C96,267,192,277,288,282.7C384,288,480,288,576,282.7C672,277,768,267,864,250.7C960,235,1056,213,1152,213.3C1248,213,1344,235,1392,245.3L1440,256L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                </path>
            </svg> -->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                viewBox="0 0 100 10" preserveAspectRatio="none">
                <path d="M0,0 v5 q16.67,2 33.3,0 t33.3,0  t33.3,0 v-5 Z" fill="#fff8e6"></path>
            </svg>
            <div class="section_inner">
                <h2 class="title">支援したい方へ</h2>
                <div class="shien_box">
                    <div class="text shien_text text_border">
                        <p>
                            こども食堂は、ほとんどがボランティアスタッフよって運営されています。
                            行政等からの助成金がもらえる場合もありますが、それでは間に合わないことも多いです。
                            自分にできることから、支援してみませんか？
                            一言に”支援”と言っても、いくつかの方法があります。
                        </p>
                    </div>
                    <div class="shien_act">
                        <img class="pc_pic yasai_woman"
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/index/yasai_woman.png"
                            alt="野菜を収穫した人">
                        <img class="mobile_pic yasai_man"
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/index/yasai_man.png"
                            alt="野菜を収穫した人" />
                    </div>
                </div>
                <a href="<?php echo home_url('/support'); ?>">
                    <div class="btn_item">もっと見る</div>
                </a>
            </div>
            <!-- <img src="<?php //echo get_template_directory_uri(); ?>/assets/images/index/onigiribottom.png" alt="波" class="onigiribottom" /> -->
        </section>
        <!-- リンク集 -->
        <section class="surporters w100">
            <!-- <svg class="surporterstop svgwave" xmlns="http://www.w3.org/2000/svg" viewBox="0  200 1440 100">
                <path fill="#fff8e6" fill-opacity="1"
                    d="M0,256L48,261.3C96,267,192,277,288,282.7C384,288,480,288,576,282.7C672,277,768,267,864,250.7C960,235,1056,213,1152,213.3C1248,213,1344,235,1392,245.3L1440,256L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                </path>
            </svg> -->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                viewBox="0 0 100 10" preserveAspectRatio="none">
                <path d="M0,0 v5 q25,2 50,0 t50,0  v-5 Z" fill="#d7f794"></path>
            </svg>
            <div class="section_inner">
                <h2 class="title link_title">リンク集</h2>
                <div class="link_flex">
                    <a href="<?php echo home_url('/link/cafe'); ?>" class="link_cover">
                        <div class="link_item">
                            <div class="btn_item_link link_sample">こども食堂関連</div>
                            <div class="link_text">
                                <p>
                                    こども食堂関連のNPO法人や、徳島県ホームページのリンク集です。
                                </p>
                            </div>
                        </div>
                    </a>
                    <a href="<?php echo home_url('/link/care'); ?>" class="link_cover">
                        <div class="link_item">
                            <div class="btn_item_link  link_sample02">子育て支援関連</div>
                            <div class="link_text">
                                <p>
                                    子育て支援に繋がる団体のWEBサイトやInstagramのリンク集です。
                                </p>
                            </div>
                        </div>
                    </a>
                    <a href="<?php echo home_url('/link/third'); ?>" class="link_cover">
                        <div class="link_item">
                            <div class="btn_item_link btntest">こどもの居場所関連</div>
                            <div class="link_text">
                                <p>
                                    家と学校以外の、第3の居場所になるような団体のリンク集です。
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>
        <!-- 食堂運営者の方へ -->
        <section class="link w100">
            <!-- <img src="<?php //echo get_template_directory_uri(); ?>/assets/images/index/linktop.png" alt="波" class="link_wave" /> -->
            <!-- <svg class="linktop svgwave" xmlns="http://www.w3.org/2000/svg" viewBox="0  200 1440 100">
                <path fill="#fdffb0" fill-opacity="1"
                    d="M0,256L48,261.3C96,267,192,277,288,282.7C384,288,480,288,576,282.7C672,277,768,267,864,250.7C960,235,1056,213,1152,213.3C1248,213,1344,235,1392,245.3L1440,256L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                </path>
            </svg> -->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                viewBox="0 0 100 10" preserveAspectRatio="none">
                <path d="M0,0 v5 q16.67,2 33.3,0 t33.3,0  t33.3,0 v-5 Z" fill="#fff8e6"></path>
            </svg>
            <div class="section_inner">
                <h2 class="title link_title">食堂運営者の方へ</h2>
                <div class="text">
                    <p>
                        「このサイトに関するお問い合わせはこちらから！<br>
                        ※各こども食堂へのお問い合わせは、それぞれの食堂詳細ページの連絡先へ個別にお問い合わせください。
                    </p>
                </div>
                <a href="<?php echo home_url('/admin/'); ?>">
                    <div class="btn_item">もっと見る</div>
                </a>
            </div>
            <!-- <img src="<?php //echo get_template_directory_uri(); ?>/assets/images/index/linkbottom.png" alt="波" class="link_wave" /> -->
        </section>


        <!-- お問い合わせ -->
        <section class="notice w100">
            <!-- <svg class="noticetop svgwave" xmlns="http://www.w3.org/2000/svg" viewBox="0  200 1440 100">
                <path fill="#fff8e6" fill-opacity="1"
                    d="M0,256L48,261.3C96,267,192,277,288,282.7C384,288,480,288,576,282.7C672,277,768,267,864,250.7C960,235,1056,213,1152,213.3C1248,213,1344,235,1392,245.3L1440,256L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                </path>
            </svg> -->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                viewBox="0 0 100 10" preserveAspectRatio="none">
                <path d="M0,0 v5 q25,-2 50,0 t50,0  v-5 Z" fill="#fdffb0"></path>
            </svg>
            <div class="section_inner">
                <h2 class="title">お問い合わせ</h2>
                <div class="text">
                    <p>
                        「このサイトに関するお問い合わせはこちらから！<br>
                        ※各こども食堂へのお問い合わせは、それぞれの食堂詳細ページの連絡先へ個別にお問い合わせください。
                    </p>
                </div>
                <a href="<?php echo home_url('/contact'); ?>">
                    <div class="btn_item">お問い合わせはこちら</div>
                </a>
            </div>
        </section>
        <!-- 活動のようす -->
        <section class="contact w100">
            <!-- <img src="<?php //echo get_template_directory_uri(); ?>/assets/images/index/contacttop.png" alt="波" class="contact_wave" /> -->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                viewBox="0 0 100 10" preserveAspectRatio="none">
                <path d="M0,0 v5 q16.67,2 33.3,0 t33.3,0  t33.3,0 v-5 Z" fill="#fff8e6"></path>
            </svg>
            <div class="section_inner">
                <h2 class="title">活動の様子</h2>
                <div class="text">
                    <p>
                        「徳島こども食堂ナビ」に掲載している、様々なこども食堂の活動の様子をスライドショーでご覧いただけます。
                    </p>
                </div>
                <!-- 活動風景スライド -->
                <div class="activity_slide">
                    <?php //if ($pic_query->have_posts()) : ?>
                    <?php //while($pic_query->have_posts()) : ?>
                    <?php //$pic_query->the_post(); ?>
                    <div class="activity_slider">
                        <?php
                           //if (!is_null(get_field('pic1'))) : ?>
                        <?php
                           // $pic = get_field('pic1');
                           // $pic_id = attachment_url_to_postid( $pic );
                           // $pic_alt = get_post_meta( $pic_id, '_wp_attachment_image_alt', true );
                        ?>
                        <?php //if (is_null($pic)) : ?>
                        <!-- <img src="<?php //echo $pic; ?>" alt="<?php //echo $pic_alt; ?>" /> -->
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/act/kawashima_egaosyokudo_party_06.JPG"
                            alt="">
                    </div>
                    <div class="activity_slider">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/act/kitajima_kodomosyokudo_party_01.jpg"
                            alt="">
                    </div>
                    <div class="activity_slider">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/act/kodomonosyokudominasyokudo_party_04.jpg"
                            alt="">
                    </div>
                    <div class="activity_slider">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/act/manaka_shokudou_party_04.jpg"
                            alt="">
                    </div>
                    <div class="activity_slider">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/act/nikonikokodomosyokudo_food_01.jpg"
                            alt="">
                    </div>
                    <div class="activity_slider">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/act/pokapoka_shokudou_party_01.png"
                            alt="">
                    </div>
                    <?php //endif;?>
                    <?php //endif; ?>
                </div>
                <?php //endwhile; ?>
                <?php //endif; ?>
                <?php wp_reset_postdata(); ?>
            </div>
            <!-- <img src="<?php //echo get_template_directory_uri(); ?>/assets/images/index/contactbottom.png" alt="波"
                class="contact_wave" /> -->
        </section>
        <!-- 活動風景 -->

        <!-- テスト -->
        <?php //if ($pic_query->have_posts()) : ?>
        <?php //while($pic_query->have_posts()) : ?>
        <?php //$pic_query->the_post(); ?>
        <p>
            <?php
            //     echo '<pre>';
            //  print_r(get_field_objects());
            //  echo '</pre>';
            ?>
        </p>
        <?php //endwhile; ?>
        <?php //endif; ?>

    </div>
    <!-- メインインナー終わり -->
</main>
<?php get_footer(); ?>