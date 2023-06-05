<?php get_header(); ?>
<main>
    <div class="main_inner">
        <div class="block"></div>
        <?php get_template_part('template-parts/breadcrumb'); ?>
        <section class="section_inner">
            <div class="title">
                <h2 class="title_text">FAQ</h2>
            </div>
            <div class="faq">
                <div class="text">
                    <p>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/qicon.png" alt="qicon" />
                        徳島県のこども食堂の活動に寄付したいです。
                    </p>
                    <p>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/aicon.png" alt="aicon" />
                        ご支援を頂ける場合は、各こども食堂紹介ページから支援したいこども食堂に直接ご連絡ください。<br>
                        <a href="<?php echo home_url('/area/east'); ?>">エリアからさがす</a>または<a href="<?php echo home_url('/find'); ?>">条件からさがす</a>から探してみてください。
                    </p>
                </div>
                <div class="text">
                    <p>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/qicon.png" alt="qicon" />
                        こども食堂の活動を手伝いたいです。
                    </p>
                    <p>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/aicon.png" alt="aicon" />
                        ボランティアスタッフを募集している食堂はたくさんあります。
                        <a href="<?php echo home_url('/find'); ?>">条件からさがす</a>から『ボランティアスタッフ募集中』で絞り込み、支援したいこども食堂に直接コンタクトを取ってみてください。
                    </p>
                </div>
                <div class="text">
                    <p>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/qicon.png" alt="qicon" />
                        誰でも行っていいの？
                    </p>
                    <p>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/aicon.png" alt="aicon" />
                        こども食堂ごとに参加条件がありますが、誰でも来ていいというところが多いです。
                        <a href="<?php echo home_url('/find'); ?>">条件からさがす</a>から探してみてください。
                    </p>
                </div>
                <div class="text">
                    <p>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/qicon.png" alt="qicon" />
                        こども食堂とはなんですか？
                    </p>
                    <p>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/aicon.png" alt="aicon" />
                        <a href="<?php echo home_url('/concept'); ?>">こども食堂とは</a>のページで解説しています。
                        また、 <a href="<?php echo home_url('/interview'); ?>">特集記事
                            Pickupインタビュー</a>で運営者の想いを記事にしています。ぜひご一読ください。
                    </p>
                </div>
                <div class="text">
                    <p>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/qicon.png" alt="qicon" />
                        どんな人が運営していますか？
                    </p>
                    <p>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/aicon.png" alt="aicon" />
                        地域のボランティアの方が運営していることが殆どです。
                        NPO法人や介護福祉施設等の事業所、レストラン等のお店が運営しているところもあります。
                    </p>
                </div>
                <div class="text">
                    <p>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/qicon.png" alt="qicon" />
                        経済的に困っていなくても行っていいのでしょうか？
                    </p>
                    <p>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/aicon.png" alt="aicon" />
                        こども食堂ごとに参加条件がありますが、誰でも来ていいというところが多いです。
                        <a href="<?php echo home_url('/find'); ?>">条件からさがす</a>から探してみてください。
                    </p>
                </div>
                <div class="btn_item btn_faq">
                    <a href="<?php echo home_url('/contact'); ?>">お問い合わせはこちら</a>
                </div>

            </div>
        </section>
    </div>
</main>

<?php get_footer(); ?>