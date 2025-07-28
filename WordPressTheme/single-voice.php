<?php get_header(); ?>

<main class="p-voiceDetail">
    <div class="p-voiceDetail__inner p-voiceDetail-inner l-inner">
        <div class="p-voiceDetail-inner__eye-catch">
            <?php
            if (has_post_thumbnail()) {
                the_post_thumbnail('full', [
                    'alt' => get_the_title(),
                    'loading' => 'lazy',
                    'width' => 1440,
                    'height' => 480,
                ]);
            } else {
                // 代替画像を指定する場合
                echo '<img src="' . esc_url(get_template_directory_uri()) . '/assets/images/default-eye-catch.jpg" alt="イメージ画像" width="1440" height="480" loading="lazy">';
            }
            ?>
        </div>
    </div>
    <!-- pc時　2カラム -->
    <section class="p-voiceDetail__wrapper">
        <div class="p-voiceDetail__content p-voiceDetail-content">
            <article class="p-voiceDetail-content__body p-voiceDetail-content-body l-inner">
                <!-- 投稿画面ACF -->
                <?php for ($i = 1; $i <= 2; $i++) : // セクション数に合わせてループ範囲を変更 
                ?>
                    <?php
                    $heading_top = get_field("section_post_heading_{$i}_top");
                    $heading_bottom = get_field("section_post_heading_{$i}_bottom");
                    $content = get_field("section_post_content_{$i}");
                    $image = get_field("section_post_image_{$i}");

                    if (empty($heading_top) && empty($heading_bottom) && empty($content) && empty($image)) {
                        continue;
                    }
                    ?>
                    <section class="c-single-content c-single-content--voice">
                        <div class="c-single-content__wrapper">
                            <h2 class="c-heading02--up">
                                <?php if ($heading_top) : ?>
                                    <?php echo esc_html($heading_top); ?>
                                <?php endif; ?>
                            </h2>
                            <h2 class="c-heading02--left">
                                <?php if ($heading_bottom) : ?>
                                    <span><?php echo esc_html($heading_bottom); ?></span>
                                <?php endif; ?>
                            </h2>
                            <?php if ($content) : ?>
                                <div class="c-single-content__post c-single-content__post--voice">
                                    <?php echo nl2br(esc_html($content)); ?> </div>
                            <?php endif; ?>
                        </div>

                        <?php if ($image) : ?>
                            <div class="c-single-content__image">
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" width="950" height="327" loading="lazy">
                            </div>
                        <?php endif; ?>
                    </section>
                <?php endfor; ?>
            </article>
            <div class="p-voiceDetail-content__image">
                <div class="p-voiceDetail-content__image--01">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image28.png" alt="仕事のイメージ画像" width="462" height="286" loading="lazy">
                </div>
                <div class="p-voiceDetail-content__image--02">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image29.png" alt="仕事のイメージ画像" width="462" height="286" loading="lazy">
                </div>
            </div>
        </div>
        <!-- プロフィール -->
        <aside class="p-voiceDetail__profile p-voiceDetail-profile">
            <!-- 社長プロフィールのカード -->
            <div class="p-voiceDetail-profile__body">
                <div class="p-voiceDetail-profile__image">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/president01.png" alt="代表 田中 太郎の写真">
                </div>
                <div class="p-voiceDetail-profile__text">
                    <p class="p-voiceDetail-profile__text--company">株式会社 XXXXXX</p>
                    <p class="p-voiceDetail-profile__text--ja">田中 太郎</p>
                    <p class="p-voiceDetail-profile__text--ja2">代表 田中 太郎</p>
                    <p class="p-voiceDetail-profile__text--en">Tanaka Taro</p>
                </div>
            </div>
            <div class="p-voiceDetail-profile__btn">
                <a href="/voice/" class="c-return c-return--voiceDetail">
                    一覧に戻る<span class="c-arrow01__right"></span>
                </a>
            </div>
        </aside>
    </section>

    <!-- 関連記事 Swiper -->
    <div class="p-voiceDetail__swiper">
        <?php get_template_part('template-parts/sections/section-related-swiper'); ?>
    </div>
</main>

<?php get_template_part('template-parts/sections/section-cta'); ?>
<?php get_footer(); ?>