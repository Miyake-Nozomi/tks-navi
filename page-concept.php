<?php get_header(); ?>

<main>
    <div class="main_inner">
        <div class="block"></div>
        <?php get_template_part('template-parts/breadcrumb'); ?>
        <section class="concept section_inner">
            <h2 class="title">こども食堂とは</h2>
            <div class="textbox">
                <div class="text">
                    <p>
                        こども食堂と聞くと、「貧困層のための場所」や「こどもや子育て世代向けのもの」といったイメージを抱く方も多いと思います。
                        実際はそうではなく、こどものための場であることはもちろんですが、地域の人や大人、様々な世代の人が集まって、一緒にごはんを食べて交流できる場です。地域とのつながりや、多世代交流をする地域コミュニティとしての役割も担っています。
                    </p>
                </div>
                <div class="text">
                    <p>
                        こども食堂は、子どもたちの食生活や栄養バランスの改善、社会的孤立の解消、地域の交流促進など、様々な社会問題に取り組む場でもあります。また、地域の食材や調理方法など、地域特有の食文化を守り、伝える役割も担っています。
                    </p>
                </div>
                <div class="text">
                    <p>
                        こども食堂は、子どもたちの健やかな成長を支援するために、全国各地で展開されています。
                    </p>
                </div>
            </div>
            <div class="rice"></div>
            <div class="curry"></div>
            <!-- <div class="btn"> -->
            <div class="btn_item">
                <a href="<?php echo home_url('/faq'); ?>">
                    FAQ
                </a>
            </div>
            <!-- </div> -->

        </section>
    </div>
</main>



<?php get_footer(); ?>