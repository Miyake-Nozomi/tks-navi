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
                <a class="link_a" href="<?php the_field('s_url'); ?>" target="_blank" rel="noopener noreferrer">
                    <div class="link_item">
                        <p class="link_item_name">
                            <?php the_field('s_name'); ?>
                        </p>
                        <?php if (!empty(get_field('s_img'))): ?>
                        <img src="<?php the_field('s_img'); ?>" alt="">
                        <?php endif; ?>
                        <p class="link_item_text">
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
        <div class="text text_inner">
            <p class="text_title">協賛団体リンク集・バナー画像の掲載について</p>
            <p>
                本サイトの存在意義や活動に協賛してくださる団体・企業様は<br>
                5,000円以上のご支援をいただけますと、協賛団体リンク集に掲載が可能です。<br>
                10,000円以上のご支援をいただけますと、トップページにバナー画像が表示できます。<br>
                徳島県に住む全ての人にとって、大切で役に立つ情報を掲載できていると自負しております。<br>
                本サイトの運営費をご支援いただくことで、永くこのサイトを存続させることができます。<br>
                ご支援をよろしくお願い申し上げます。
            </p>
            <p class="mt1em">
                ご支援いただける場合は、<a href="<?php echo home_url('/contact'); ?>">【お問い合わせ】</a>よりお気軽にご連絡ください。
            </p>
        </div>
    </div>
</main>




<?php get_footer(); ?>