<?php

?>

<?php get_header(); ?>

<main>
    <div class="main_inner">
        <div class="block"></div>
        <?php get_template_part('template-parts/breadcrumb'); ?>
        <div class="title">
            <h2 class="title_text">お問い合わせ</h2>
        </div>
        <!-- 各子供食堂 -->
        <section class="section_inner contact1">

            <div class="text">
                <h3 class="text_look subtitle">
                    このサイトに関する<wbr>お問い合わせはこちらから！
                </h3>
                <p class="contact1_text_p1">
                    ※各こども食堂へのお問い合わせは、それぞれの食堂詳細ページの連絡先へ個別にお問い合わせください。
                </p>
                <ul class="contact1_text_p2">
                    <p> 問い合わせ(例)</p>
                    <li>このサイトの運営費を寄付したいのですが、どうすれば良いですか？
                    </li>
                    <li>こども食堂の情報を、新たに掲載して欲しいです。</li>
                    <li> こども食堂の情報を更新（変更）して欲しいです。</li>
                    <li> こども食堂の情報を削除して欲しいです。</li>
                    <li> リンク集に、自分（団体・企業）のサイトやInstagramのURLを掲載して欲しいです。
                    </li>
                    <p> なお、各こども食堂の開催日時等の運営状況や人員の都合により、返信までに時間がかかる場合があります。予めご了承ください。</p>
                </ul>
            </div>
            <div class="btn_item btn_contact">
                <a href="<?php echo home_url('/cafeinfo'); ?>">各こども食堂一覧</a>
            </div>
        </section>
        <!-- 各子供食堂 終了-->

        <!-- 全体への問い合わせ -->
        <?php echo do_shortcode('[contact-form-7 id="323" title="contact"]'); ?>
        <!-- 全体への問い合わせ 終了-->
    </div>
</main>


<?php get_footer(); ?>