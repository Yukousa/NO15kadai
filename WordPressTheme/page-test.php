<?php get_header(); ?>



<div class="swiper p-front-__swiper p-front-works-swiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <a href="">
                <span class="p-front-swiper__label"></span>
                <div class="p-front-swipe__image">
                    <img src="sample.png">
                </div>
                <div class="p-front-swiper__text">
                    <p>テキストテキストテキストテキストテキスト</p>
                </div>
            </a>
        </div>
    </div>
</div>
<div class="p-front-swiper__nav">
    <button class="p-front-swiper-nav__prev" aria-label="前へ"></button>
    <button class="p-front-swiper-nav__next" aria-label="次へ"></button>
</div>





<?php get_template_part('template-parts/sections/section-cta'); ?>
<?php get_footer(); ?>