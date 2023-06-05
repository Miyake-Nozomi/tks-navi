<?php get_header(); ?>
<?php
$this_terms = get_the_terms($post->ID,'area');

// $event_id = get_field('event_id');
$cafeinfo_id = get_field('id');

$service_array = get_field('service');


if (empty(get_field('address_2'))) {
    $events = array(
'開催住所' => ['〒'. get_field('postcode'),get_field('address')],
'会場' => get_field('place_name'),
'参加条件' => get_field('conditions'),
);
}else{
$events = array(
'開催住所' => ['〒'. get_field('postcode'),get_field('address')],
'開催住所2' => ['〒'. get_field('postcode_2'),get_field('address_2')],
'会場' => get_field('place_name'),
'参加条件' => get_field('conditions'),
);
}

if (!empty(get_field('date'))) {
    $date = get_field('date');
    $event_day[] = $date;
}

if (!empty(get_field('time'))) {
    $time = get_field('time');
    $event_day[] = $time;
}

if (!empty($event_day)) {
    $time = get_field('time');
    $events['開催日時・頻度'] = $event_day;
}


$child_price = get_field('child_price');
if ($child_price == '0') {
    $child_price = '無料';
} else{
    $child_price = $child_price.'円';
}

if (!empty(get_field('child_price_info'))) {
    $child_price = $child_price.'【'.get_field('child_price_info').'】';
}

$price = array('こども '.$child_price);


if (!is_null(get_field('adult_price'))) {
    $adult_price = get_field('adult_price');
    if ($adult_price == '0') {
        $adult_price = '無料';
    } else{
        $adult_price = $adult_price.'円';
    }
    if (!empty(get_field('adult_price_info'))) {
    $adult_price = $adult_price.'【'.get_field('adult_price_info').'】';
    }
    $price[] = 'おとな '.$adult_price;
}

if (!empty(get_field('any'))) {
    $any = '募金制';
    if (!empty(get_field('any_info'))) {
    $any = $any.'【'.get_field('any_info').'】';
    $price = $any;
}
}

$events['参加料金'] = $price;


if (!empty(get_field('person'))) {
    $person = get_field('person');
    foreach ($person as $value) {


        if ($value == '誰でも行ける') {
            if (!empty(get_field('everyone'))) {
                $value = $value. '【' . get_field('everyone'). '】';
            }
            $person_info[] = $value;
        }elseif ($value == 'こどもだけで行ける') {
            if (!empty(get_field('child_only'))) {
                $value = $value. '【' . get_field('child_only'). '】';
            }
            $person_info[] = $value;
        }elseif ($value == '大人だけで行ける') {
            if (!empty(get_field('adult_only'))) {
                $value = $value. '【' . get_field('adult_only'). '】';
            }
            $person_info[] = $value;
        }elseif ($value == '大人は保護者だけ') {
            if (!empty(get_field('guardian_only'))) {
                $value = $value. '【' . get_field('guardian_only'). '】';
            }
            $person_info[] = $value;
        }elseif ($value == '地域の方だけ') {
            if (!empty(get_field('local_only'))) {
                $value = $value. '【' . get_field('local_only'). '】';
            }
            $person_info[] = $value;
        }elseif ($value == '会員登録制') {
            if (!empty(get_field('member'))) {
                $value = $value. '【' . get_field('member'). '】';
            }
            $person_info[] = $value;
        }
    }
    $events['参加対象'] = $person_info;
}

if (!empty(get_field('main_age'))) {
    $main_age =get_field('main_age');
    $events['参加者の主な年代'] = $main_age;
}

if (!empty(get_field('scale'))) {
    $scale =get_field('scale');
    $events['開催規模'] = $scale;
}

if (!empty(get_field('offer'))) {
    $offer = get_field('offer');
    $events['食事スタイル'] = $offer;
}

if (!empty(get_field('reserve'))) {
$reserve = get_field('reserve');
if ($reserve == '1') {
    $reserve = '必要あり';
} else{
    $reserve = '必要なし';
}

if (!empty(get_field('reserve_info'))) {
$reserve = $reserve. '【' . get_field('reserve_info'). '】';
}

$events['事前予約'] = $reserve;
}

if (!empty(get_field('parking'))) {
$parking = get_field('parking')[0];
if ($parking == '有り') {
    $parking = 'あり';
} else{
    $parking = 'なし';
}

if (!empty(get_field('parking_info'))) {
$parking = $parking. ' 【' . get_field('parking_info'). '】';
}

$events['駐車場'] = $parking;
}

if (!empty(get_field('note'))) {
    $note = get_field('note');

    $events['備考'] = $note;
}

//連絡先・SNSなど
$infos = array();

if (!empty(get_field('staff'))) {
    $infos['担当者'] = get_field('staff');
}

if (!empty(get_field('tel'))) {
    $tel = get_field('tel');
}

if (!empty(get_field('email'))) {
    $email = get_field('email');
    //＠を,に置換する（スパム対策）
    $email = strtr($email, '@', ',');
}

if (!empty(get_field('line_id'))) {
    $line_id = get_field('line_id');
}

if (!empty($contact)) {
    // $infos['連絡先'] = $contact;
}

if (!empty(get_field('line_qr'))) {
    $line_qr = get_field('line_qr');
}

if (!empty(get_field('line_url'))) {
    $line_url = get_field('line_url');
    $line_url = '<a href="'.$line_url.'">'.$line_url .'</a>';

}

if (!empty($line)) {
    // $infos['LINE QRコード'] = $line;
}

if (!empty(get_field('instagram'))) {
$instagram_url = get_field('instagram');

//
$instagram_account = substr($instagram_url, strpos($instagram_url, "/", strpos($instagram_url, "//") + 2) + 1);
if(strpos($instagram_account, '/') !== false){
    $instagram_account = substr($instagram_account, 0, strpos($instagram_account, "/"));
}elseif(strpos($instagram_account, '?') !== false){
    $instagram_account = substr($instagram_account, 0, strpos($instagram_account, "?"));
}
    $instagram_url = 'https://www.instagram.com/' . $instagram_account;
    $instagram = '<a href="'.$instagram_url.'">instagram: @'.$instagram_account .'</a>';

}

if (!empty(get_field('facebook'))) {
    $facebook_url = get_field('facebook');
$facebook_account = substr($facebook_url, strpos($facebook_url, "/", strpos($facebook_url, "//") + 2) + 1);
if(strpos($facebook_account, '/') !== false){
    $facebook_account = substr($facebook_account, 0, strpos($facebook_account, "/"));
}elseif(strpos($facebook_account, '?') !== false){
    $facebook_account = substr($facebook_account, 0, strpos($facebook_account, "?"));
}
    $facebook_url = 'https://www.facebook.com/' . $facebook_account;
    $facebook = '<a href="'.$facebook_url.'">facebook: @'.$facebook_account .'</a>';

}

if (!empty($sns)) {
    // $infos['SNS'] = $sns;
}

if (!empty(get_field('site_url'))) {
    $site_url = get_field('site_url');
    $site_url = '<a href="'.$site_url.'">'.$site_url .'</a>';
}

if (!empty(get_field('amapro'))) {
    $amapro = get_field('amapro');
    $amapro = '<a href="'.$amapro.'">'.get_field('name').'のAmazonみんなで応援プログラム</a>';
}

if (get_field('recruitment')=== true) {
    $volunteer= '現在、募集中！';
    if (!empty(get_field('recruitment_info'))) {
        $volunteer_info = get_field('recruitment_info') ;
    }
}


$pics = array(get_field('pic1'),get_field('pic2'),get_field('pic3'),get_field('pic4'),get_field('pic5'),get_field('pic6'),get_field('pic7'),get_field('pic8'),get_field('pic9'),get_field('pic10'));

$license = get_field('license');
$license = explode(",", $license);

$args = array(
		'post_type' => 'event',
        'posts_per_page' => 3,
        'post_status' => 'publish', // 公開された投稿を指定
        'meta_query' => array(
            'relation' => 'AND',
        array(
        'key' => 'class',
        'value' => 2,
        'compare' => '='
        ),
        array(
        'key' => 'id',
        'value' => $cafeinfo_id,
        'compare' => '='
        )
        ),
	);
$the_query = new WP_Query($args);

?>


<main>
    <div class="main_inner">
        <div class="block"></div>
        <!-- ページトップ -->
        <?php if (have_posts()) : ?>
        <?php while(have_posts()) : ?>
        <?php the_post(); ?>
        <section class="yellow">
            <?php get_template_part('template-parts/breadcrumb'); ?>
            <div class="section_inner">
                <h2 class="title"><?php the_field('name'); ?></h2>
                <div class="yellow_flex">
                    <div class="yellow_imgbox">
                        <?php
                        $eye_catching = get_field('eye_catching');
                        $image_id = attachment_url_to_postid( $eye_catching );
                        $image_alt = get_post_meta(  $image_id, '_wp_attachment_image_alt', true );
                        ?>
                        <?php if(!empty($eye_catching)): ?>
                        <img src="<?php echo $eye_catching; ?>" alt="<?php echo $image_alt; ?>">
                        <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/noimage/logo_eye_catch.png" alt="">
                        <?php endif; ?>
                        <div class="underimg cafeinfo_flex flex">
                            <p class="address">
                                <?php echo $this_terms[1]->name; ?>
                            </p>
                            <div class="good cafeinfo_flex flex">
                                <p><?php echo 'いいね'.do_shortcode('[wp_ulike]'); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="yellow_tokushoku">
                        <div class="single_tokushoku">
                            <h3 class="single_tokushoku_title">
                                <?php echo get_field_object('features')['label']; ?>
                            </h3>
                            <p class="text">
                                <?php the_field('features'); ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="btn_box">
                    <?php if (!empty(get_field('interview_id'))) : ?>
                    <div class="btn_item single_btn">
                        <a href="<?php echo home_url('/interview/' . get_field('interview_id')); ?>"><?php echo get_field('name').'の特集記事'; ?></a>
                    </div>
                    <?php endif; ?>
                    <?php if (!empty(get_field('interview_id_2'))) : ?>
                    <div class="btn_item single_btn">
                        <a href="<?php echo home_url('/interview/' . get_field('interview_id_2')); ?>"><?php echo get_field('name').'の特集記事2'; ?></a>
                    </div>
                    <?php endif; ?>
                </div>
                <!-- スクロール -->
                <div class="scroll"></div>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shabondama01.png" alt="シャボン玉" class="shingle-cafeinfo_img shabondama01" />
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shabondama02.png" alt="シャボン玉" class="shingle-cafeinfo_img shabondama02" />
            </div>
        </section>
        <section class="orange">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 100 10" preserveAspectRatio="none">
                <path d="M0,0 v5 q16.67,2 33.3,0 t33.3,0  t33.3,0 v-5 Z" fill="#fdffb0"></path>
            </svg>
            <div class="orange_inner section_inner">
                <h3 class="categorytitle orange_basic">
                    基本情報
                </h3>
                <table class="single_table">
                    <?php foreach( $events as $key => $event): ?>
                    <tr>
                        <?php if (!empty($event)) : ?>
                        <td class="single_table_tdtitle orange_td">
                            <?php echo $key; ?>
                        </td>
                        <?php if (!is_array($event)) : ?>
                        <td class="text text_single">
                            <?php echo $event; ?>
                        </td>
                        <?php else: ?>
                        <td class="text text_single">
                            <?php foreach( $event as $value): ?>
                            <p>
                                <?php echo $value; ?>
                            </p>
                            <?php endforeach; ?>
                        </td>
                        <?php endif; ?>
                        <?php endif; ?>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/beigebottom.png" alt="波" class="wave_img bbottom" />
        </section>
        <section class="green">
            <!-- <<<<<<< HEAD  -->
            <!-- <svg class="greentop svgwave" xmlns="http://www.w3.org/2000/svg" viewBox="0  200 1440 100">
                <path fill="#d7f794" fill-opacity="1" d="M0,256L48,261.3C96,267,192,277,288,282.7C384,288,480,288,576,282.7C672,277,768,267,864,250.7C960,235,1056,213,1152,213.3C1248,213,1344,235,1392,245.3L1440,256L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                </svg> -->
            <!-- ======= -->
            <svg class="greentop svgwave" xmlns="http://www.w3.org/2000/svg" viewBox="0  200 1440 100">
                <path fill="#d7f794" fill-opacity="1" d="M0,256L48,261.3C96,267,192,277,288,282.7C384,288,480,288,576,282.7C672,277,768,267,864,250.7C960,235,1056,213,1152,213.3C1248,213,1344,235,1392,245.3L1440,256L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                </path>
            </svg>
            <!-- >>>>>>> 0c574ad9ba3de9037f285134d23eb6aeb1b61f1b -->
            <div class="green_inner section_inner">
                <h3 class="categorytitle green_address">
                    連絡先・SNSなど
                </h3>
                <table class="single_table">
                    <tr>
                        <td class="single_table_tdtitle">
                            <h4>連絡先</h4>
                        </td>
                        <td class="text text_single">
                            <?php if (!empty($tel)) : ?>
                            <p>
                                電話番号:<br />
                                <?php echo $tel; ?>
                            </p>
                            <?php endif; ?>
                            <?php if (!empty($email)) : ?>
                            <p>
                                メールアドレス:<br />
                                <span class="nsm">
                                    <?php echo $email; ?>
                                </span>
                            </p>
                            <?php endif; ?>
                            <?php if (!empty($line_id)) : ?>
                            <p>
                                LINE: <br />
                                <?php echo $line_id; ?>
                            </p>
                            <?php endif; ?>
                        </td>
                    </tr>

                    <?php if (!empty($line_qr)) : ?>
                    <tr>
                        <td class="single_table_tdtitle">
                            <h4>LINE QRコード</h4>
                        </td>
                        <td class="text text_single">
                            <img src="<?php echo $line_qr; ?>" alt="LINEQRコード" class="qrcode" />
                            <?php if (!empty($line_url)) : ?>
                            <p class="subtitle_text"><?php echo $line_url; ?></p>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <?php if (!empty($instagram) || !empty($facebook)) : ?>
                    <tr>
                        <td class="single_table_tdtitle">
                            <h4>SNS</h4>
                        </td>
                        <td class="text text_single">
                            <?php if (!empty($instagram)): ?>
                            <p class="subtitle_text">
                                <?php echo $instagram; ?>
                            </p>
                            <?php endif; ?>
                            <?php if (!empty($facebook)): ?>
                            <p class=" subtitle_text">
                                <?php echo $facebook; ?>
                            </p>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <?php if (!empty($site_url)): ?>
                    <tr>
                        <td class="single_table_tdtitle">
                            <h4>公式WEBサイト</h4>
                        </td>
                        <td class="text text_single">
                            <p class="subtitle_text"><?php echo $site_url; ?></p>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <?php if (!empty($amapro)): ?>
                    <tr>
                        <td class="single_table_tdtitle">
                            <h4>
                                Amazonみんなで <br> 応援プログラム
                            </h4>
                        </td>
                        <td class="text text_single">
                            <?php echo $amapro; ?>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <?php if (!empty($volunteer)): ?>
                    <tr>
                        <td class="single_table_tdtitle">
                            <h4>
                                ボランティア募集
                            </h4>
                        </td>
                        <td class="text text_single">
                            <?php echo $volunteer; ?>
                            <?php if (!empty($volunteer_info)): ?>
                            <p><?php echo $volunteer_info; ?></p>
                            <?php endif; ?>
                        </td>
                    </tr>
                </table>
                <div class="volunteer">
                    <span class="volunteer_text">
                        ボランティア募集中
                    </span>
                </div>
                <?php endif; ?>
            </div>
            <!-- スクロール -->
            <div class="scroll"></div>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/greenbottmo.png" alt="波" class="wave_img gbottom" />
        </section>
        <?php endwhile; ?>
        <?php endif; ?>

        <section class="bgcolor">
            <!-- <<<<<<< HEAD  -->
            <!-- <svg class="bgtop svgwave" xmlns="http://www.w3.org/2000/svg" viewBox="0  200 1440 100">
                <path fill="#fff8e6" fill-opacity="1" d="M0,256L48,261.3C96,267,192,277,288,282.7C384,288,480,288,576,282.7C672,277,768,267,864,250.7C960,235,1056,213,1152,213.3C1248,213,1344,235,1392,245.3L1440,256L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                </svg> -->
            <!-- ======= -->
            <!-- >>>>>>> 0c574ad9ba3de9037f285134d23eb6aeb1b61f1b -->
            <div class="section_inner bgcolor_inner">
                <div class="bgcolor_flex">
                    <div class="others">
                        <h3 class="categorytitle base_other">
                            取り扱いのあるもの
                        </h3>
                        <div class="others_item">
                            <?php foreach($service_array as $service): ?>
                            <?php if ($service == 'その他資格者') : ?>
                            <?php if (!empty($license[0])): ?>
                            <?php foreach( $license as $value): ?>
                            <p>
                                <?php echo $value; ?>
                            </p>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            <?php else: ?>
                            <p>
                                <?php echo $service; ?>
                            </p>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="addressmap">
                        <h3 class="categorytitle base_access">アクセス</h3>
                        <?php the_field('map'); ?>
                    </div>
                </div>
                <?php if (!empty($pics)) :?>
                <h3 class="subtitle_ulineorange">活動の様子</h3>
                <ul class="ac_slide">
                    <?php foreach( $pics as $pic): ?>
                    <?php if (!empty($pic)) :?>
                    <li>
                        <?php
                        $pic_id = attachment_url_to_postid( $pic );
                        $pic_alt = get_post_meta(  $pic_id, '_wp_attachment_image_alt', true );
                    ?>
                        <img src="<?php echo $pic; ?>" alt="<?php echo $pic_alt; ?>" />
                    </li>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
                <?php if (!empty(get_field('video'))) :?>
                <video controls>
                    <source src="<?php the_field('video') ?>" type="video/mp4">
                </video>
                <?php endif; ?>
            </div>
            <!-- メインインナー終わり -->
        </section>
    </div>
</main>
<?php get_footer(); ?>