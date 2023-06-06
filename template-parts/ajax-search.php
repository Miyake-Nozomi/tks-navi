<?php

//エリアとボランティア募集だけ検索の場合
// eventの時点で該当するものがない場合 cafeinfo_idsが空になってしまい、エリアとボランティアだけになってしまう

// エリア（タクソノミーに存在）を取得
// $area_slug = get_query_var('area');

if (isset($_GET['area'])) {
    $area_slug = $_GET['area'];
}

$area = json_encode($area_slug);

// $volunteer ='';
if (isset($_GET['volunteer'])) {
$volunteer = $_GET['volunteer'];
}

$metaquerysp = ['relation' => 'AND'];

$adult_price = null;
if (isset($_GET['adult_price'])) {
$adult_price = $_GET['adult_price'];
    $metaquerysp[] = [
        'key' => 'adult_price',
        'value' => $adult_price,
        'compare' => '='
    ];
}

$child_price = null;
if (isset($_GET['child_price'])) {
$child_price = $_GET['child_price'];
    $metaquerysp[] = [
        'key' => 'child_price',
        'value' => $child_price,
        'compare' => '='
    ];
}

// $parking ='';
if (isset($_GET['parking'])) {
$parking = $_GET['parking'];
    $metaquerysp[] = [
        'key' => 'parking',
        'value' => $parking,
        'compare' => 'LIKE'
    ];
}

// $person ='';
if (isset($_GET['person'])) {
$person = $_GET['person'];
    $metaquerysp[] = [
        'key' => 'person',
        'value' => $person,
        'compare' => 'LIKE'
    ];
}

// $learning_support ='';
if (isset($_GET['learning_support'])) {
$learning_support = $_GET['learning_support'];
    $metaquerysp[] = [
        'key' => 'service',
        'value' => $learning_support,
        'compare' => 'LIKE'
    ];
}



// $food_pantry ='';
if (isset($_GET['food_pantry'])) {
$food_pantry = $_GET['food_pantry'];
    $event_metaquerysp[] = [
        'key' => 'service',
        'value' => $food_pantry,
        'compare' => 'LIKE'
    ];
}

// ページ番号;
// if (isset($_GET['page'])) {
// $page = $_GET['pege'];
// }

$show_page = $_GET['show_page'];

// $now_post_num = $_POST['now_post_num'];
// $get_post_num = $_POST['get_post_num'];
// $loopcounter = 0;
$html = '';


    // $post__in = $cafeinfo_ids;
// クエリ作成
$args = [
    'post_type' => 'cafeinfo',
    'posts_per_page' => 6,
    // 'posts_per_page' => $get_post_num,
    // 'offset' => $now_post_num,
    // 'paged' =>  'page', //何ページ目の情報を表示すれば良いか
    'paged' =>  $show_page, //何ページ目の情報を表示すれば良いか
    'post_status' => 'publish', // 公開された投稿を指定
    'orderby' => 'date',
    'order' => 'ASC',
];


$args[] = ['relation' => 'AND'];


// 選択していない場合も考慮して条件で絞り込む。
if (!empty($area_slug)) {
    $taxquerysp[] = [
        'taxonomy' => 'area',           //タクソノミー：『エリア』
        'terms' => $area_slug,          //スラッグ名
        'field' => 'slug',              //スラッグ指定
    ];
    $args['tax_query'] = $taxquerysp;       // 絞り込んだ情報を $args に代入する。
}

// 選択していない場合も考慮して条件で絞り込む。
if (!empty($volunteer)) {
    $metaquerysp[] = [
        'key' => 'recruitment',
        'value' => $volunteer,
        'compare' => '='
    ];
}

$args['meta_query'] = $metaquerysp;       // 絞り込んだ情報を $args に代入する。



$the_query = new WP_Query($args);



?>

<div class="title">
    <h2 class="title_text">検索結果一覧</h2>
</div>
<div class="searcharea_item searcharea_flex">
    <?php if ($the_query->have_posts()) : ?>
    <?php while ($the_query->have_posts()) : ?>
    <?php $the_query->the_post(); ?>
    <a href="<?php the_permalink() ?>">
        <div class="item_card">
            <?php $eye_catching = get_field('eye_catching');?>
            <?php if(!empty($eye_catching)): ?>
            <img src="<?php the_field('eye_catching'); ?>" alt="">
            <?php else: ?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/text_kakko_kari.png" alt="">
            <?php endif; ?>
            <p class="item_card_title"><?php the_field('name') ?></p>
            <p class="item_card_title border">
                <?php echo get_the_terms($post->ID, 'area')[1]->name; ?>
            </p>
            <p class="item_card_text">
                <?php $features = get_field('features');
                    //40文字にする
                    if(mb_strlen($features) > 40) {
                        $features = mb_substr($features,0,40);
                        echo $features . '・・・' ;
                    } else {
                        echo $features;
                    }
                ?>
            </p>
        </div>
    </a>
    <?php endwhile; ?>
    <?php else:?>
    <div class="not_found_inner ">
        <p>お探しのこども食堂が見つかりませんでした。</p>
        <img src="<?php echo get_template_directory_uri();?>/assets/images/index/notfind.png" alt="" class="not_found_img" />
    </div>
    <?php endif;?>
    <?php wp_reset_postdata(); ?>
</div>
<!--  HTML要素にデータ属性として埋め込む -->
<div class="my-element" <?php if (isset($_GET['area'])) :?> data-area="<?php echo esc_attr( $area ); ?>" <?php endif; ?> <?php if (isset($_GET['child_price'])) :?> data-child_price="<?php echo esc_attr( $child_price ); ?>" <?php endif; ?> <?php if (isset($_GET['adult_price'])) :?>data-adult_price="<?php echo esc_attr( $adult_price ); ?>" <?php endif; ?> <?php if (isset($_GET['person'])) :?>data-person="<?php echo esc_attr( $person ); ?>" <?php endif; ?> <?php if (isset($_GET['parking'])) :?>data-parking="<?php echo esc_attr( $parking ); ?>" <?php endif; ?><?php if (isset($_GET['food_pantry'])) :?>data-food_pantry="<?php echo esc_attr( $food_pantry ); ?>" <?php endif; ?> <?php if (isset($_GET['learning_support'])) :?>data-learning_support="<?php echo esc_attr( $learning_support ); ?>" <?php endif; ?> <?php if (!empty($_GET['volunteer'])) :?>data-volunteer="<?php echo esc_attr( $volunteer ); ?>" <?php endif; ?>></div>
<!-- ページナビ -->
<div class="page_nav flex">
    <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        if (isset($show_page)) {
            $paged = $show_page;
        }
    ?>
    <?php
        global $wp_rewrite;
        $paginate_base = get_pagenum_link(1);
        // $paginate_base = str_replace("wp-admin/admin-ajax.php", "find", $paginate_base);
        if(strpos($paginate_base, '?') || !$wp_rewrite->using_permalinks()){
            $paginate_format = '';
            $paginate_base = add_query_arg('paged', '%#%', $paginate_base);
        }else{
            $paginate_format = (substr($paginate_base,-1,1) == '/' ? '' : '/') .
            user_trailingslashit('page/%#%/','paged');
            $paginate_base = $paginate_base . '%_%';
        }
        echo paginate_links(array(
            'base' => $paginate_base,
            'format' => $paginate_format,
            'total' => $the_query->max_num_pages,
            'mid_size' => 1,
            'current' => ($paged ? $paged : 1),
            'prev_text' => '<div class="page_triangle_left"></div>',
            'next_text' => '<div class="page_triangle_right"></div>',
        ));
    ?>
</div>