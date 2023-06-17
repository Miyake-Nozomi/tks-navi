<?php get_header(); ?>

<main>
    <div class="main_inner">
        <div class="block"></div>
        <?php get_template_part('template-parts/breadcrumb'); ?>
        <div class="title">
            <h2 class="title_text">支援したい方へ</h2>
        </div>
        <section class="section_inner">
            <p class="support_inner text">
                こども食堂は、ほとんどがボランティアスタッフによって運営されています。<br>
                行政等からの助成金がもらえる場合もありますが、それでは間に合わないことも多いです。<br>
                自分にできることから、支援してみませんか？一言に「支援」と言っても、いくつかの方法があります。<br>
                下記の3つのタブ、「物資」・「寄付」・「手伝い」から、自分に合った支援の方法を見つけてみてください。
            </p>
        </section>
        <!-- 項目タブ -->
        <ul class="tab flex">
            <li class="tab_1 tab_js tab-a">物資</li>
            <li class="tab_2 tab_js tab-b">寄付</li>
            <li class="tab_3 tab_js tab-c">手伝い</li>
        </ul>
        <section class="section_inner support_content">
            <div class="support_supplies panel tab-a is-show">
                <h3 class="subtitle support_subtitle01">
                    物資を支援する
                </h3>
                <p>
                    支援したいと思うこども食堂が決まっている方は、各こども食堂へ直接お問い合わせください。
                    Amazonみんなで応援プログラムに参加している食堂はこちら!
                </p>
                <div class="font_awsome">
                    <i class="fa-solid fa-circle-arrow-down fa-bounce fa-lg" style="color: #23ac38"></i>
                </div>
                <div class="btn_item btn01">
                    <a href="<?php echo home_url('programlist'); ?>">参加食堂一覧へ</a>
                </div>
            </div>
            <div class="support_money tab-b panel">
                <h3 class="subtitle support_subtitle02">
                    金銭的に<wbr>支援する
                </h3>
                <p>
                    支援したいと思うこども食堂が決まっている方は、各こども食堂へ直接お問い合わせください。
                    こども食堂はお住まいの地域から検索できます。
                </p>
                <div class="font_awsome">
                    <i class="fa-solid fa-circle-arrow-down fa-bounce fa-lg" style="color: #23ac38"></i>
                </div>
                <div class="btn_item btn02">
                    <a href="<?php echo home_url('area/east'); ?>">エリアからさがす</a>
                </div>
            </div>
            <div class="support_help tab-c panel">
                <h3 class="subtitle support_subtitle03">
                    ボランティア<wbr>スタッフ<wbr>として手伝う
                </h3>
                <p>
                    スタッフを募集している食堂はこちらのページから条件を絞り込んで検索できます！
                </p>
                <div class="font_awsome">
                    <i class="fa-solid fa-circle-arrow-down fa-bounce fa-lg" style="color: #23ac38"></i>
                </div>
                <div class="btn_item btn03">
                    <a href="<?php echo home_url('find'); ?>">条件からさがす</a>
                </div>
            </div>
        </section>
        <div class="btn support_btn">
            <a href="<?php echo home_url('contact'); ?>">
                <nobr>
                    お問い合わせは<wbr>
                    こちら
                </nobr>
            </a>
        </div>
        <div class="text text_inner text_support">
            <p class="text_title">サイトの運営費をご支援ください</p>
            <p>
            サイトのサーバー代や、保守管理の費用をご支援いただけますと大変嬉しいです。<br>
            このサイトに意義を感じてくださった方は、是非ご支援をお願いします！<br>
            1,000円から受付しております。<br>
            <span class="mt1em">
            本サイトの存在意義や活動に協賛してくださる団体・企業様で<br>
            協賛団体リンク集・バナー画像の掲載希望の場合は<br>
            5,000円以上のご支援をいただけますと、協賛団体リンク集に掲載が可能です。<br>
            10,000円以上のご支援をいただけますと、トップページにバナー画像が表示できます。<br>
        </span>
        <span class="mt1em">
            <a href="<?php echo home_url('/contact'); ?>">【お問い合わせ】</a>からご連絡ください
            </span>
        </p>
        </div>
    </div>
</main>


<?php get_footer(); ?>