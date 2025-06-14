<?php get_header(); ?>

<main class="p-profile">
    <!-- fv -->
    <section class="p-single-voice__fv c-sub-fv">
        <!-- フロントページ以外のfv -->
        <?php get_template_part('template-parts/sections/section-sub-fv'); ?>
    </section>

    <!-- メイン部分 -->
    <!-- コードスキル　アイコン群 -->
    <section class="p-profile-skill">
        <?php get_template_part('template-parts/sections/section-profile-icons'); ?>
    </section>

    <!-- pc時　2カラム -->
    <section class="p-profile__wrapper">
        <div class="p-profile__container p-profile-container">
            <!-- 本文1 -->
            <article class="p-profile-container__body p-profile-container-body">
                <!-- 本文１　タイトル -->
                <div class="p-profile-container-body__wrapper p-profile-container-body-wrapper">
                    <h3 class="c-subtitle">
                        <span class="c-subtitle--line1"><?php the_field('section_heading_1_top'); ?></span>
                        <span class="c-subtitle--line2 c-heading02"><?php the_field('section_heading_1_bottom'); ?></span>
                    </h3>
                    <!-- 本文１　テキスト -->
                    <div class="p-profile-container-body-wrapper__text"><?php the_field('section_content_1'); ?></div>
                </div>
                <!-- 本文１　画像 -->
                <?php $image1 = get_field('section_image_1'); ?>
                <?php if ($image1): ?>
                    <div class="p-profile-container-body__image">
                        <img src="<?php echo esc_url($image1['url']); ?>" alt="">
                    </div>
                <?php endif; ?>
            </article>

            <!-- 本文2 -->
            <article class="p-profile-container__body p-profile-container-body">
                <!-- 本文１　タイトル -->
                <div class="p-profile-container-body__wrapper p-profile-container-body-wrapper">

                    <h3 class="c-subtitle">
                        <span class="c-subtitle--line1"><?php the_field('section_heading_2_top'); ?></span>
                        <span class="c-subtitle--line2 c-heading02"><?php the_field('section_heading_2_bottom'); ?></span>
                    </h3>
                    <!-- 本文１　テキスト -->
                    <div class="p-profile-container-body-wrapper__text"><?php the_field('section_content_2'); ?></div>
                </div>
                <!-- 本文１　画像 -->
                <?php $image2 = get_field('section_image_2'); ?>
                <?php if ($image2): ?>
                    <div class="p-profile-container-body__image">
                        <img src="<?php echo esc_url($image1['url']); ?>" alt="">
                    </div>
                <?php endif; ?>
            </article>

            <!-- スライダー -->
            <article class="p-profile-body__slider">
                <?php get_template_part('template-parts/sections/section-css-slide'); ?>
            </article>
        </div>

        <!-- プロフィール pc時サイドバー -->
        <aside class="p-profile__profile p-profile-profile">
            <?php
            set_query_var('hide_back_button', true);
            get_template_part('template-parts/cards/card-president-profile');
            ?>

            <div class="p-profile-profile__content">
                <h4 class="p-profile-profile__title">経歴</h4>
                <p class="p-profile-profile__text">ここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入る</p>
            </div>
            <div class="p-profile-profile__content">
                <h4 class="p-profile-profile__title">職歴</h4>
                <p class="p-profile-profile__text">ここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入る</p>
            </div>

        </aside>
    </section>



    <!-- リンクバナー contact / faq -->
    <section class="p-section-wrapper">
        <?php get_template_part('template-parts/sections/section-contact'); ?>
        <?php get_template_part('template-parts/sections/section-faq'); ?>
    </section>

</main>

<?php get_footer(); ?>