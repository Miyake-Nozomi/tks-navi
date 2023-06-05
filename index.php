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
                    <div class="title">
                        <h2 class="title_text post_title"><?php the_title(); ?></h2>
                    </div>
                    <div class="tag_box">
                        <p class="category_tag"><?php echo $cat->cat_name; ?></p>
                    </div>
                </div>
                <div class="text">
                    <?php the_content(); ?>
                    <!-- ページナビ -->
                    <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                ?>

                    <?php if ($paged != 1): ?>
                    <div class="page_nav flex">
                        <?php
                    global $wp_rewrite;
                    $paginate_base = get_pagenum_link(1);
                    if(strpos($paginate_base, '?') || !$wp_rewrite->using_permalinks()){
                        $paginate_format = '';
                        $paginate_base = add_query_arg('paged','%#%');
                    }else{
                        $paginate_format = (substr($paginate_base,-1,1) == '/' ? '' : '/') .
                        user_trailingslashit('page/%#%/','paged');
                        $paginate_base .= '%_%';
                    }
                    echo paginate_links(array(
                        'base' => $paginate_base,
                        'format' => $paginate_format,
                        'total' => $the_query->max_num_pages,
                        'mid_size' => 1,
                        'current' => ($paged ? $paged : 1),
                        'prev_text' => '<div class="page_triangle_left"></div>',
                        'next_text' => '<div class="page_triangle_right"></div>',
                    ));
                ?>

                        <?php //original_pagenation(); ?>

                    </div>
                    <?php endif ?>

                </div>
                <div class="btn_item">
                    <a href="<?php echo home_url('/post'); ?>">おしらせ一覧</a>
                </div>
            </div>

            <?php get_sidebar('categories'); ?>

        </section>

    </div>
</main>


<?php get_footer(); ?>