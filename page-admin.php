<?php get_header(); ?>
<main class="main_admin">
    <div class="main_inner">
        <div class="block"></div>
        <?php get_template_part('template-parts/breadcrumb'); ?>
        <section class="section_inner admin_inner">
            <div class="title">
                <h2 class="title_text">食堂運営者の方へ</h2>
            </div>
            <p class="text">
                「徳島こども食堂ナビ」では、徳島県下で活動されている、こども食堂さんであれば、所属に関わらず<span class="fontweight">無料で情報掲載が可能</span>です。
            </p>
            <p class="text">
            <span class="highlight fontweight ">このサイトの目的</span><br>
            このサイトは、 <span class="fontweight">"こども食堂を利用したい人、手伝いたい人、支援したい人"へ情報をお届けすることを目的</span> としています。<br>
            徳島県下の、こども食堂の活動がより活発に行われる事を願って、有志ボランティアにより運営されています。
            </p>
            <p class="text">
                情報掲載希望の食堂運営者の方は、<a class="link" href="<?php echo home_url('/contact/'); ?>">【お問い合わせ】</a>からご連絡ください。
            </p>
            <p class="text">
            <span class="highlight fontweight">掲載例</span><br>
            こども食堂紹介ページに、こども食堂の基本情報や特色、写真を掲載できます。<br>
            実際に掲載されている、食堂をご覧ください。<br>
            （例）<a class="link" href="<?php echo home_url('/cafeinfo/356/'); ?>">お結びコロコロ～お茶の間～</a>
            </p>
            <p class="text">
                このサイトは、完全ボランティアで運営しておりますので、レスポンスにお時間をいただきます。ご了承ください。
            </p>
            <div class="house"></div>
        </section>
    </div>
    <div class="vegetable"></div>
</main>
<?php get_footer(); ?>