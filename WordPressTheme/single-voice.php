<?php get_header(); ?>

<main>
    <section class="p-mv p-mv--voice">
        <div class="p-mv__inner">
            <div class="p-mv__image p-mv__image--voice">
                <?php the_post_thumbnail('large'); ?>
            </div>
        </div>
    </section>

    <div class="p-voice">
        <div class="p-voice__inner l-inner">
            <article class="p-voice__post p-voice-post">
                <?php if (get_field('voice_heading_top') || get_field('voice_heading_bottom')) : ?>
                    <?php if (get_field('voice_heading_top')) : ?>
                        <h2 class="p-voice-post__title c-heading02 u-slide-up"><?php the_field('voice_heading_top'); ?></h2>
                    <?php endif; ?>
                    <?php if (get_field('voice_heading_bottom')) : ?>
                        <h2 class="p-voice-post__title c-heading02 c-heading02--black u-slide-left"><span><?php the_field('voice_heading_bottom'); ?></span></h2>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if (get_field('post-lead')) : ?>
                    <div class="p-voice-post__lead">
                        <?php the_field('post-lead'); ?>
                    </div>
                <?php endif; ?>

                <?php
                $has_section_1 = get_field('section_post_heading_1_top') || get_field('section_post_heading_1_bottom') || get_field('section_post_image_1') || get_field('section_post_content_1');
                if ($has_section_1) :
                ?>
                    <section class="p-voice-post__content p-voice-post__content--1 p-voice-post-content">
                        <?php if (get_field('section_post_heading_1_top')) : ?>
                            <h2 class="p-voice-post-content__title c-heading02 u-slide-up"><?php the_field('section_post_heading_1_top'); ?></h2>
                        <?php endif; ?>
                        <?php if (get_field('section_post_heading_1_bottom')) : ?>
                            <h2 class="p-voice-post-content__title c-heading02 c-heading u-slide--left"><span><?php the_field('section_post_heading_1_bottom'); ?></span></h2>
                        <?php endif; ?>

                        <?php
                        $image1 = get_field('section_post_image_1');
                        if ($image1) : ?>
                            <div class="p-voice-post-content__image">
                                <img src="<?php echo esc_url($image1['url']); ?>" alt="<?php echo esc_attr($image1['alt']); ?>">
                            </div>
                        <?php endif; ?>

                        <?php if (get_field('section_post_content_1')) : ?>
                            <div class="p-voice-post-content__text">
                                <?php the_field('section_post_content_1'); ?>
                            </div>
                        <?php endif; ?>
                    </section>
                <?php endif; ?>

                <?php
                $has_section_2 = get_field('section_post_heading_2_top') || get_field('section_post_heading_2_bottom') || get_field('section_post_image_2') || get_field('section_post_content_2');
                if ($has_section_2) :
                ?>
                    <section class="p-voice-post__content p-voice-post__content--2 p-voice-post-content">
                        <?php if (get_field('section_post_heading_2_top')) : ?>
                            <h2 class="p-voice-post-content__title c-heading02 u-slide-up"><?php the_field('section_post_heading_2_top'); ?></h2>
                        <?php endif; ?>
                        <?php if (get_field('section_post_heading_2_bottom')) : ?>
                            <h2 class="p-voice-post-content__title c-heading02 c-heading02--black u-slide-left"><span><?php the_field('section_post_heading_2_bottom'); ?></span></h2>
                        <?php endif; ?>

                        <?php
                        $image2 = get_field('section_post_image_2');
                        if ($image2) : ?>
                            <div class="p-voice-post-content__image">
                                <img src="<?php echo esc_url($image2['url']); ?>" alt="<?php echo esc_attr($image2['alt']); ?>">
                            </div>
                        <?php endif; ?>

                        <?php if (get_field('section_post_content_2')) : ?>
                            <div class="p-voice-post-content__text">
                                <?php the_field('section_post_content_2'); ?>
                            </div>
                        <?php endif; ?>
                    </section>
                <?php endif; ?>
            </article>
            <div class="p-voice__slider c-slide">
                <div class="c-slide__track">
                    <div class="c-slide__item c-slide-item">
                        <div class="c-slide-item__row1">
                            <div class="c-slide-item__image1">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/image11.png" alt="WORKイメージ" width="310" height="200" loading="lazy">
                            </div>
                            <div class="c-slide-item__image2">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/image19.png" alt="WORKイメージ" width="620" height="200" loading="lazy">
                            </div>
                        </div>
                        <div class="c-slide-item__row2">
                            <div class="c-slide-item__image3">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/image04.png" alt="WORKイメージ" width="310" height="200" loading="lazy">
                            </div>
                            <div class="c-slide-item__image4">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/image12.png" alt="WORKイメージ" width="620" height="200" loading="lazy">
                            </div>
                        </div>
                    </div>
                    <div class="c-slide__item c-slide-item">
                        <div class="c-slide-item__row1">
                            <div class="c-slide-item__image1">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/image11.png" alt="WORKイメージ" width="310" height="200" loading="lazy">
                            </div>
                            <div class="c-slide-item__image2">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/image19.png" alt="WORKイメージ" width="620" height="200" loading="lazy">
                            </div>
                        </div>
                        <div class="c-slide-item__row2">
                            <div class="c-slide-item__image3">
                                <div class="c-slide-image1">
                                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/image04.png" alt="WORKイメージ" width="310" height="200" loading="lazy">
                                </div>
                                <div class="c-slide-item__image4">
                                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/image12.png" alt="WORKイメージ" width="620" height="200" loading="lazy">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <aside class="p-voice__president p-voice-president">
                <div class="p-voice-president__body p-voice-president-body">
                    <div class="p-voice-president-body__image">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/president01.png" alt="代表 田中 太郎の写真">
                    </div>
                    <div class="p-voice-president-body__text">
                        <p class="p-voice-president-body__text--company u-desktop">株式会社 XXXXXX</p>
                        <p class="p-voice-president-body__text--ja">田中 太郎</p>
                        <p class="p-voice-president-body__text--en u-mobile">Tanaka Taro</p>
                    </div>
                </div>
                <div class="p-voice-president__btn u-desktop">
                    <a href="/voice/" class="c-btn02">一覧に戻る</a>
                </div>

            </aside>
        </div>
        <div class="p-voice__swiper">
            <?php get_template_part('template-parts/sections/section-related-swiper'); ?>
        </div>
    </div>
</main>

<?php get_template_part('template-parts/sections/section-cta'); ?>
<?php get_footer(); ?>