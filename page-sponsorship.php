<?php get_header(); ?>
<?php
    $args = array(
        'post_type' => 'sponsor',
        'paged' => get_query_var('paged'), //何ページ目の情報を表示すれば良いか
        'orderby' => 'menu_order',
        'order' => ' ASC',
    );
    $the_query = new WP_Query($args);
?>

<main>
    <div class="main_inner">
        <div class="block"></div>
        <?php get_template_part('template-parts/breadcrumb'); ?>
        <div class="title">
            <h2 class="title_text">協賛団体リンク集</h2>
        </div>
        <section class="section_inner">
            <div class="text text_color">
                <p>
                    このサイトの存在意義や、活動に協賛しご支援下さった団体・企業様のリンク集です。<br>
                    素敵な団体ばかりですので、ぜひご覧ください。
                </p>
            </div>
        </section>

        <!-- 関連リンク -->
        <section class="section_inner link_care">
            <div class="link_wrap">
                <?php if ($the_query->have_posts()) : ?>
                <?php while($the_query->have_posts()) : ?>
                <?php $the_query->the_post(); ?>
                <a class="link_a" href="<?php the_field('s_url'); ?>">
                    <div class="link_item">
                        <p class="link_item_name">
                            <?php the_field('s_name'); ?>
                        </p>
                        <?php if (!empty(get_field('s_img'))): ?>
                        <img src="<?php the_field('s_img'); ?>" alt="">
                        <?php endif; ?>
                        <p>
                            <?php the_field('s_desc'); ?>
                        </p>
                    </div>
                </a>
                <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </div>
            <!-- ページナビ -->
            <?php original_pagenation(); ?>
        </section>
    </div>
    </div>
</main>




<?php get_footer(); ?>