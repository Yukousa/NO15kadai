<?php get_header(); ?>

<main class="p-message">
    <section class="p-message__fv c-sub-fv">
        <!-- フロントページ以外のfv -->
        <?php get_template_part('template-parts/sections/section-sub-fv'); ?>
    </section>
    <!-- 本文１　pc２カラム -->
    <section class="p-message__container p-message-container">
        <!-- 本文１ -->
        <article class="p-message-container__body p-message-container-body">
            <!-- 本文１　タイトル -->
            <h3 class="c-subtitle">
                <span class="c-subtitle--line1"><?php the_field('section_heading_1_top'); ?></span>
                <span class="c-subtitle--line2 c-heading02"><?php the_field('section_heading_1_bottom'); ?></span>
            </h3>
            <!-- 本文１　テキスト -->
            <div class="p-message-container-body__text"><?php the_field('section_content_1'); ?></div>
            <!-- 本文１　画像 -->
            <?php $image1 = get_field('section_image_1'); ?>
            <?php if ($image1): ?>
                <div class="p-message-container-body__image">
                    <img src="<?php echo esc_url($image1['url']); ?>" alt="">
                </div>
            <?php endif; ?>
        </article>
        <!-- 代表プロフィール -->
        <article class="p-message-container__profile">
            <?php get_template_part('template-parts/cards/card-president-profile'); ?>
        </article>
    </section>

    <!-- スライダー -->
    <article class="p-message__slider">
        <?php get_template_part('template-parts/sections/section-css-slide'); ?>
    </article>

    <!-- 本文2 -->
    <section class="p-message__container p-message-container">
         <article class="p-message-container__body p-message-container__body--02 p-message-container-body">
             <!-- 本文１　タイトル -->
             <h3 class="c-subtitle">
                 <span class="c-subtitle--line1"><?php the_field('section_heading_2_top'); ?></span>
                 <span class="c-subtitle--line2 c-heading02"><?php the_field('section_heading_2_bottom'); ?></span>
             </h3>
             <!-- 本文１　テキスト -->
             <div class="p-message-container-body__text"><?php the_field('section_content_2'); ?></div>
             <!-- 本文１　画像 -->
             <?php $image2 = get_field('section_image_2'); ?>
             <?php if ($image2): ?>
                 <div class="p-message-container-body__image">
                     <img src="<?php echo esc_url($image1['url']); ?>" alt="">
                 </div>
             <?php endif; ?>
         </article>
     </section>

    <!-- リンクバナー contact / faq -->
    <section class="p-section-wrapper">
        <?php get_template_part('template-parts/sections/section-contact'); ?>
        <?php get_template_part('template-parts/sections/section-faq'); ?>
    </section>

</main>

<?php get_footer(); ?>