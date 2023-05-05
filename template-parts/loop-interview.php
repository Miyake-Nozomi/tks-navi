<li>
    <a href="<?php the_permalink(); ?>">
        <div class="item_card">
            <?php $eye_catching = get_field('eye_catching');?>
            <?php if(!empty($eye_catching)): ?>
            <img src="<?php the_field('eye_catching'); ?>" alt="">
            <?php else: ?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/text_kakko_kari.png" alt="">
            <?php endif; ?>
            <p class="item_card_title">
                <?php the_field('title'); ?>
            </p>
            <p class="item_card_title">
                <?php echo get_field('name'); ?>
            </p>
            <hr>
            <p class="item_card_text">
                <?php
                $excerpt = get_field('excerpt');
                echo $excerpt . '・・・' ;
            ?>
            </p>
        </div>
    </a>
</li>