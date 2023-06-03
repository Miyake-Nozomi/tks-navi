<?php get_header(); ?>
<?php

//市町村一覧
$east = get_terms(array(
    'taxonomy' => 'area',
    'parent' => get_term_by('slug', 'east', 'area')->term_id
));

$south = get_terms(array(
    'taxonomy' => 'area',
    'parent' => get_term_by('slug', 'south', 'area')->term_id
));

$west = get_terms(array(
    'taxonomy' => 'area',
    'parent' => get_term_by('slug', 'west', 'area')->term_id
));



?>
<main>
    <div class="main_inner">
        <div class="block"></div>
        <?php get_template_part('template-parts/breadcrumb'); ?>
        <h2 class="title">条件からさがす</h2>
        <h3 class="text_look text subtitle">
            チェックしてさがしてみよう！
        </h3>


        <!-- <form action="<?php echo home_url('/find'); ?>" method="get" class="search_form"> -->
        <form class="search_form">
            <section class="form">
                <div class="form_wrap">
                    <!-- エリア検索欄 -->
                    <div class="form_item">
                        <h3 class="item_title">地域</h3>
                        <!-- 東部 -->
                        <div class="item_wrap">
                            <div class="ac_label">東部</div>
                            <div class="ac_list east_list">
                                <label for="east_all">
                                    <input type="checkbox" id="east_all" />東部全て
                                </label>
                                <?php foreach ($east as $town) :  ?>
                                <label for="<?php echo $town->slug; ?>">
                                    <input type="checkbox" id="<?php echo $town->slug; ?>" name="area[]" value="<?php echo $town->slug; ?>" class="east_list" /><?php echo $town->name; ?>
                                </label>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- 南部 -->
                        <div class="item_wrap">
                            <div class="ac_label south_label">南部</div>
                            <div class="ac_list">
                                <label for="south_all">
                                    <input type="checkbox" id="south_all" />南部全て
                                </label>
                                <?php foreach ($south as $town) :  ?>
                                <label for="<?php echo $town->slug; ?>">
                                    <input type="checkbox" id="<?php echo $town->slug; ?>" name="area[]" value="<?php echo $town->slug; ?>" class="south_list" /><?php echo $town->name; ?>
                                </label>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <!-- 西部 -->
                        <div class="item_wrap">
                            <div class="ac_label west_label">西部</div>
                            <div class="ac_list west_list">
                                <label for="west_all">
                                    <input type="checkbox" id="west_all" />西部全て
                                </label>
                                <?php foreach ($west as $town) :  ?>
                                <label for="<?php echo $town->slug; ?>">
                                    <input type="checkbox" id="<?php echo $town->slug; ?>" name="area[]" value="<?php echo $town->slug; ?>" class="west_list" /><?php echo $town->name; ?>
                                </label>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <!-- エリア検索欄終了 -->
                    <!-- チェックボックス欄 -->
                    <div class="form_item">
                        <h3 class="item_title02">こだわり条件</h3>
                        <div class="checkbox-001">
                            <label>
                                <input type="checkbox" name="child_price" value="0" />こども無料
                            </label>
                            <label>
                                <input type="checkbox" name="adult_price" value="0" />おとな無料
                            </label>
                            <label>
                                <input type="checkbox" name="person" value="こどもだけで行ける" />こどもだけで行ける
                            </label>
                            <label>
                                <input type="checkbox" name="parking" value="有り" />駐車場あり
                            </label>
                            <label>
                                <input type="checkbox" name="food_pantry" value="フードパントリー" />フードパントリーあり
                            </label>
                            <label>
                                <input type="checkbox" name="learning_support" value="学習支援" />学習支援あり
                            </label>
                            <label>
                                <input type="checkbox" name="volunteer" value="1" />ボランティア募集中
                            </label>
                        </div>
                    </div>
                    <!--チェックボックス欄  終了-->
                </div>
                <!-- ボタン -->
                <div class="form_btns flex">
                    <input class="submit_btn" type="submit" value="さがす" />
                    <input class="reset_btn" type="reset" value="リセット" />
                </div>
            </section>
        </form>


        <!-- 検索結果表示 -->
        <div class="searcharea">
        </div>
        <!-- 検索結果表示 終了-->
    </div>
</main>



<?php get_footer(); ?>