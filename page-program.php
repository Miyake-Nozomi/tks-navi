<?php get_header(); ?>

<main>
    <div class="main_inner">
        <div class="block"></div>
        <?php get_template_part('template-parts/breadcrumb'); ?>
        <section class="section_inner">
            <div class="title">
                <h2 class="title_text">Amazonみんなで応援プログラムとは</h2>
            </div>
            <div class="text">
                <p>
                    物資の支援を必要としている団体がAmazon「ほしい物リスト」を作成し、公開することで、支援したい人が遠隔地にいながら、記名または匿名で支援が行える制度です。
                </p>
                <p class="text_p">
                    こども食堂を運営するには、食材だけでなく、料理関連や衛生関連の消耗品等が必要で、ボランティアスタッフが持ち出しで購入している食堂も多くあります。
                </p>
                <p class="text_p">
                    ここでは、Amazonみんなで応援プログラムに参加しているこども食堂と、各こども食堂のAmazonみんなで応援プログラムURLを掲載しています。
                </p>
                <p>ご支援を宜しくお願いいたします。</p>
            </div>
            <div class="btn_item"><a href="<?php echo home_url('/programlist'); ?>">参加食堂一覧へ</a></div>
        </section>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/amazon/vegetable.png" alt="背景の野菜" class="amazon_img vegetable" />
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/amazon/family.png" alt="背景の親子" class="amazon_img family" />
    </div>
</main>

<?php get_footer(); ?>