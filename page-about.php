<?php get_header(); ?>
<main>
    <div class="main_inner">
        <div class="block"></div>
        <?php get_template_part('template-parts/breadcrumb'); ?>
        <section class="section_inner">
            <div class="title">
                <h2 class="title_text">このサイトについて</h2>
            </div>
            <p class="text">
                このサイトは、「徳島県に住む全ての人にとって、役立つ情報を提供したい！」という熱い想いを持った「徳島こども食堂ナビ」管理運営委員会のメンバーが、ボランティアで管理運営しています。<br>
            </p>
            <p class="text text_sub">
                サイトのサーバー代や、保守管理の費用をご支援いただけますと大変嬉しいです。<br>
                このサイトに意義を感じてくださった方は、是非ご支援をお願いします！<br>
                <a href="<?php echo home_url('/contact/'); ?>">【お問い合わせ】</a>からご連絡ください。
            </p>
        </section>
        <section class="section_inner">
            <div class="title">
                <h3 class="title_text">このサイトの使い方</h3>
            </div>
            <div class="text">
                <p class="text_title">こども食堂のさがしかた</p>
                <p>
                    <a href="<?php echo home_url('/area/east'); ?>">【エリアからさがす】</a>を使うと、地図からお近くのこども食堂をさがす事ができます。
                    <a href="<?php echo home_url('/find'); ?>">【条件からさがす】</a>を使うと、いろいろなこだわり条件で絞り込めます。
                </p>
            </div>
            <div class="text">
                <p class="text_title">特集記事について</p>
                <p>
                    <a href="<?php echo home_url('/interview'); ?>">【Pick up
                        インタビュー】</a>と題して、こども食堂を運営している人に熱い思いや、こだわり、おすすめポイント、参加者の声などを取材し、記事にしました。
                    素敵な記事がたくさんあります。
                    こども食堂へ行ってみたい人・手伝いたい人・支援したい人へのメッセージもあります。ぜひ読んでみてください。
                </p>
            </div>
            <div class="text">
                <p class="text_title">支援したい方へ</p>
                <p>
                    徳島県のこども食堂を支援したい方に向けて幾つかの支援の方法を紹介しています。
                    詳しくは<a href="<?php echo home_url('/support'); ?>">【支援したい方へ】</a>のページをご覧ください。<br>
                    このサイトの運営費を支援することもできます。<a href="<?php echo home_url('/contact'); ?>">【お問い合わせ】</a>からご連絡ください。
                </p>
            </div>
            <div class="text">
                <p class="text_title">お問い合わせ</p>
                <p>
                    徳島県のこども食堂についてやこのサイトに関するお問い合わせは<a href="<?php echo home_url('/contact'); ?>">【コチラ！】</a>
                </p>
            </div>
            <div class="text">
                <p class="text_title">お役立ちリンク集</p>
                <p>こども食堂以外のお役立ち情報をまとめてあります。</p>
                <p><a href="<?php echo home_url('/link/care'); ?>">【子育て支援関連】</a></p>
                <p><a href="<?php echo home_url('/link/third'); ?>">【こどもの居場所関連】</a></p>
            </div>
            <div class="text">
                <p class="text_title">ロゴデザインについて</p>
                <p>ロゴデザインについてもご一読ください。</p>
                <p><a href="<?php echo home_url('/logo'); ?>">【ロゴデザインについて】</a></p>
            </div>
            <div class="onigiri">
            </div>
            <div class="tokosyo">
            </div>
        </section>
    </div>
</main>

<?php get_footer(); ?>