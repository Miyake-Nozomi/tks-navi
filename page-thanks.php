<?php get_header(); ?>


<main>
    <div class="main_inner">
        <div class="block"></div>
        <?php get_template_part('template-parts/breadcrumb'); ?>
        <h2 class="title">お問い合わせ</h2>

        <!-- 全体への問い合わせ -->
        <?php echo do_shortcode('[contact-form-7 id="780" title="送信完了用"]'); ?>
        <!-- 全体への問い合わせ 終了-->
    </div>
</main>


<?php get_footer(); ?>