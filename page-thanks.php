<?php get_header(); ?>


<main>
    <div class="main_inner">
        <div class="block"></div>
        <?php get_template_part('template-parts/breadcrumb'); ?>
        <div class="title">
            <h2 class="title_text">お問い合わせ</h2>
        </div>
        <!-- 全体への問い合わせ -->
        <?php //echo do_shortcode('[contact-form-7 id="780" title="送信完了用"]'); ?>
        <!-- 全体への問い合わせ 終了-->
        <section class="contact2">
            <h3 class="text_look subtitle">お問い合わせありがとうございます</h3>
            <div class="form">
                <div class="contact2_inner">
                    <div class="contact_message">
                        <p class="message_text">ご記入いただいた情報は無事に送信されました。<br>
                    確認のため、自動返信メールをお送りしております。</p>
                    </div>
                </div>
                <!-- ボタン -->
                <div class="btn_top"><a class="btn return_btn" href="<?php echo home_url('/'); ?>">トップページに戻る</a></div>
            </div>
        </section>
    </div>
</main>


<?php get_footer(); ?>