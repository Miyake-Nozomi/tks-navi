<?php get_header(); ?>
<?php
$cat = get_the_category();
$cat = $cat[0];
?>
<main>
    <div class="main_inner">
        <div class="block"></div>
        <?php get_template_part('template-parts/breadcrumb'); ?>

        <section class="section_inner s-p_between">
            <div class="  news_box">
                <div class="news_title">
                    <h2 class="title post_title"><?php the_title(); ?></h2>
                    <div class="tag_box">
                        <p class="category_tag"><?php echo $cat->cat_name; ?></p>
                    </div>
                </div>
                <div class="text">
                    <?php the_content(); ?>
                    <div class="btn_item">
                        <a href="<?php echo home_url('/post'); ?>">おしらせ一覧</a>
                    </div>
                </div>
            </div>

            <?php get_sidebar('categories'); ?>

        </section>

    </div>
</main>


<?php get_footer(); ?>