<footer class="footer">
    <div class="footer_inner">

        <nav class="footer_container with_girl">
            <?php
            $fuga = array(
            'menu' => 'footer-navigation',  //管理画面で作成したメニューの名前
            'menu_class' => 'footer_nav flex', //メニューを構成するulタグのクラス名
            'container' => false, //<ul>タグを囲んでいる<div>タグを削除
            );
            wp_nav_menu($fuga);
            ?>
            <!-- footer_nav end -->
            <div class="footer_copyright">
                <p>copyright©<?php echo bloginfo('name'); ?></p>
            </div>
        </nav>
    </div>
    <!-- footer_inner end -->
</footer>
<?php wp_footer(); ?>
</body>

</html>