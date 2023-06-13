<?php get_header(); ?>
<?php
$args = array(
		'post_type' => 'cafeinfo',
        'posts_per_page' => 6,
        'paged' => get_query_var('paged'), //何ページ目の情報を表示すれば良いか
        'meta_query' => array(
            array(
                'key' => 'amapro',
                'value' => 'http',
                'compare' => 'LIKE',
            )
            )
            );

$the_query = new WP_Query($args);
?>
<!-- 参加食堂一覧 -->
<main>
    <div class="main_inner">
        <div class="block"></div>
        <?php get_template_part('template-parts/breadcrumb'); ?>
        <div class="title">
            <h2 class="title_text">Amazonみんなで応援プログラム<br>参加こども食堂一覧</h2>
        </div>
        <div class="text">
            <div class="text_inner">
                <p>
                    Amazonみんなで応援プログラムに参加している食堂です。遠隔地から、各こども食堂が欲しいものを支援することが可能です！消耗品など、公的な支援では手が回らない物品を贈ることができます。
                </p>
            </div>
        </div>
        <div class="amazon_item flex">
            <?php if ($the_query->have_posts()) : ?>
            <?php while($the_query->have_posts()) : ?>
            <?php $the_query->the_post(); ?>
            <div class="item_card flex">
                <?php $eye_catching = get_field('eye_catching');?>
                <?php if(!empty($eye_catching)): ?>
                <?php
                            $eye_catching = get_field('eye_catching');
                            $image_id = attachment_url_to_postid( $eye_catching );
                            $image_alt = get_post_meta(  $image_id, '_wp_attachment_image_alt', true );
                        ?>
                <img src="<?php echo $eye_catching; ?>" alt="<?php echo $image_alt; ?>">
                <?php else: ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/text_kakko_kari.png" alt="">
                <?php endif; ?>
                <p class="item_card_title"><?php the_field('name') ?></p>
                <p class="item_card_title border">
                                <?php echo get_the_terms($post->ID, 'area')[1]->name; ?>
                            </p>
                <div class="btn_item btn_cafeinfo">
                    <a href="<?php the_permalink() ?>">食堂紹介</a>
                </div>
                <div class="btn_item btn_amapro">
                    <a href="<?php the_field('amapro'); ?>" target="_blank" rel="noopener noreferrer">Amazon応援プログラム</a>
                </div>
            </div>
            <?php endwhile; ?>
            <?php endif ?>
            <?php wp_reset_postdata(); ?>
        </div>

        <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                ?>

        <div class="page_nav flex">
            <?php
                    global $wp_rewrite;
                    $paginate_base = get_pagenum_link(1);
                    if(strpos($paginate_base, '?') || !$wp_rewrite->using_permalinks()){
                        $paginate_format = '';
                        $paginate_base = add_query_arg('paged','%#%');
                    }else{
                        $paginate_format = (substr($paginate_base,-1,1) == '/' ? '' : '/') .
                        user_trailingslashit('page/%#%/','paged');
                        $paginate_base .= '%_%';
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

    </div>
</main>
<!-- 参加食堂一覧 終了-->

<?php get_footer(); ?>