<?php get_header(); ?>
<?php
$current_url = $_SERVER['REQUEST_URI'];
$current_slug = basename($current_url);

$categories = get_categories();
?>

<main>
    <div class="main_inner relative">
        <div class="block"></div>
        <?php get_template_part('template-parts/breadcrumb'); ?>
        <section class="section_inner">
            <div class="title">
                <h2 class="title_text">
                    <?php
                        foreach ($categories as $category) {
                            if ($category->slug === $current_slug) {
                                echo $category->name . '記事一覧';
                                break;
                            }
                        }
                    ?>
                </h2>
            </div>
            <div class="news_flex">
                <div class="tcenter column">
                    <?php if (have_posts()) : ?>
                    <?php while(have_posts()) : ?>
                    <?php the_post(); ?>
                    <a href="<?php the_permalink(); ?>" class="news_title">
                        <?php the_title(); ?>
                    </a>
                    <?php endwhile; ?>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
                <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            ?>
                <div class="page_nav flex pc_none">
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
                'total' => $wp_query->max_num_pages,
                'mid_size' => 1,
                'current' => ($paged ? $paged : 1),
                'prev_text' => '<div class="page_triangle_left"></div>',
                'next_text' => '<div class="page_triangle_right"></div>',
                ));
            ?>
                </div>
                <?php get_sidebar('categories'); ?>
            </div>
            <!-- ページナビ -->
            <div class="page_nav flex sp_none">
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
                'total' => $wp_query->max_num_pages,
                'mid_size' => 1,
                'current' => ($paged ? $paged : 1),
                'prev_text' => '<div class="page_triangle_left"></div>',
                'next_text' => '<div class="page_triangle_right"></div>',
                ));
            ?>
            </div>
        </section>
    </div>
    </div>
</main>

<?php get_footer(); ?>