<?php get_header(); ?>

<main>
    <div class="main_inner">
        <div class="block"></div>
        <?php get_template_part('template-parts/breadcrumb'); ?>
        <h2 class="title">支援したい方へ</h2>
        <section class="section_inner">
            <p class="support_inner text">
                こども食堂は、ほとんどがボランティアスタッフによって運営されています。<br>
                行政等からの助成金がもらえる場合もありますが、それでは間に合わないことも多いです。<br>
                自分にできることから、支援してみませんか？一言に”支援”と言っても、いくつかの方法があります。<br>
                下記の3つのタブ、”物資”・”寄付”・”手伝い”から、自分に合った支援の方法を見つけてみてください。
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
                <div class="support_btn_item btn01">
                    <a href="<?php echo home_url('programlist'); ?>">参加食堂一覧へ</a>
                </div>
            </div>
            <div class="support_money tab-b panel">
                <h3 class="subtitle support_subtitle02">
                    金銭的に支援する
                </h3>
                <p>
                    支援したいと思うこども食堂が決まっている方は、各こども食堂へ直接お問い合わせください。
                    こども食堂はお住まいの地域から検索できます。
                </p>
                <div class="font_awsome">
                    <i class="fa-solid fa-circle-arrow-down fa-bounce fa-lg" style="color: #23ac38"></i>
                </div>
                <div class="support_btn_item btn02">
                    <a href="<?php echo home_url('area/east'); ?>">エリアからさがす</a>
                </div>
            </div>
            <div class="support_help tab-c panel">
                <h3 class="subtitle support_subtitle03">
                    こども食堂のボランティアスタッフとして手伝う
                </h3>
                <p>
                    スタッフを募集している食堂はこちらのページから条件を絞り込んで検索できます！
                </p>
                <div class="font_awsome">
                    <i class="fa-solid fa-circle-arrow-down fa-bounce fa-lg" style="color: #23ac38"></i>
                </div>
                <div class="support_btn_item btn03">
                    <a href="<?php echo home_url('find'); ?>">条件からさがす</a>
                </div>
            </div>
        </section>
        <a href="<?php echo home_url('contact'); ?>">
            <div class="btn support_btn">
                お問い合わせはこちら
            </div>
        </a>
    </div>
</main>


<?php get_footer(); ?>