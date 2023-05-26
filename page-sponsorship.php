<?php get_header(); ?>
<?php
    $args = array(
        'post_type' => 'sponsorship',
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
        <h2 class="title">協賛団体リンク集</h2>
        <section class="section_inner">
            <p class="support_inner text">
                テキストテキストテキストテキストテキストテキストテキストテキストテキスト<br>
                テキストテキストテキストテキストテキストテキストテキストテキストテキスト<br>
                テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト<br>
                テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
            </p>
        </section>
        <!-- 関連リンク -->
        <section>
            <h3>テキスト</h3>
            <div class="link_wrap">
                <?php if ($the_query->have_posts()) : ?>
                <?php while($the_query->have_posts()) : ?>
                <?php $the_query->the_post(); ?>
                <a class="link_a" href="<?php the_field('s_url'); ?>">
                    <div class="link_item">
                        <p class="link_item_name">
                            <?php the_field('s_name'); ?>
                        </p>
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