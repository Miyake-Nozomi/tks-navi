<?php get_header(); ?>
<main>
    <div class="main_inner">
        <div class="block"></div>
        <?php get_template_part('template-parts/breadcrumb'); ?>
        <section class="section_inner">
            <h2 class="title">食堂運営者の方へ</h2>
            <p class="text">
                「徳島こども食堂ナビ」では、徳島県下で活動されている、こども食堂さんであれば、所属に関わらずどこでも無料で情報掲載が可能です。
            </p>
            <p class="text">
                このサイトは、"こども食堂を利用したい人、手伝いたい人、支援したい人"へ情報をお届けすることを目的としています。<br>
                徳島県下の、こども食堂の活動がより活発に行われる事を願って、有志ボランティアにより運営されています。
            </p>
            <p class="text">
                情報掲載希望の食堂運営者の方は、<a href="<?php echo home_url('/contact/'); ?>">【お問い合わせ】</a>からご連絡ください。
            </p>
            <p class="text ">
                こども食堂紹介ページに、こども食堂の基本情報や特色、写真を掲載できます。<br>
                実際に掲載されている、食堂をご覧ください。<br>
                （例）<a href="<?php echo home_url('/cafeinfo/356/'); ?>">お結びコロコロ～お茶の間～</a>
            </p>
            <p class="text">
                このサイトは、完全ボランティアで運営しておりますので、レスポンスにお時間をいただきます。ご了承ください。
            </p>
        </section>
    </div>
</main>
<?php get_footer(); ?>