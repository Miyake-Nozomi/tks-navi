<?php
$this_terms = get_the_terms($post->ID,'area');
?>

<a href="<?php the_permalink() ?>">
    <div class="item_card">
        <?php $eye_catching = get_field('eye_catching');?>
        <?php if(!empty($eye_catching)): ?>
        <?php
            $eye_catching = get_field('eye_catching');
            $image_id = attachment_url_to_postid( $eye_catching );
            $image_alt = get_post_meta(  $image_id, '_wp_attachment_image_alt', true );
        ?>
        <?php if(!empty($eye_catching)): ?>
        <img src="<?php echo $eye_catching; ?>" alt="<?php echo $image_alt; ?>">
        <?php else: ?>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/text_kakko_kari.png" alt="">
        <?php endif; ?>
        <p class="item_card_title"><?php the_field('name') ?></p>
        <?php //'ボランティアは'.the_field('recruitment'); ?>
        <p class="item_card_title border">
            <?php echo get_the_terms($post->ID, 'area')[1]->name; ?>
        </p>
        <p class="item_card_text">
            <?php $features = get_field('features');
                                //40文字にする
                                if(mb_strlen($features) > 40) {
                                    $features = mb_substr($features,0,40);
                                    echo $features . '・・・' ;
                                } else {
                                    echo $features;
                                }
                            ?>
        </p>
    </div>
</a>