<?php get_header(); ?>

<main class="p-worksDetail">
    <div class="p-worksDetail__inner p-worksDetail-inner l-inner">
        <h2 class="p-worksDetail-inner__title">
            <?php echo nl2br(get_field('works_heading')); ?>
        </h2>
        <div class="p-worksDetail-inner__eye-catch">
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
    <section class="p-worksDetail__wrapper p-worksDetail-wrapper l-inner">
        <div class="p-worksDetail-wrapper__content p-worksDetail-wrapper-content">
            <!-- 投稿画面ACFのループ -->
            <?php
            $heading_top = get_field("section_post__heading_1_top");
            $heading_bottom = get_field("section_post__heading_1_bottom");
            $content = get_field("section_content_1");

            if (!empty($heading_top) || !empty($heading_bottom) || !empty($content)) :
            ?>
                <div class="p-worksDetail-wrapper-content__body p-worksDetail-wrapper-content-body">
                    <h3 class="c-heading02--up">
                        <?php if ($heading_top) : ?>
                            <?php echo esc_html($heading_top); ?>
                        <?php endif; ?>
                    </h3>
                    <h3 class="c-heading02--left">
                        <?php if ($heading_bottom) : ?>
                            <span><?php echo esc_html($heading_bottom); ?></span>
                        <?php endif; ?>
                    </h3>

                    <?php if ($content) : ?>
                        <dl class="p-worksDetail-wrapper-content-body__list p-worksDetail-wrapper-content-body-list">
                            <div class="p-worksDetail-wrapper-content-body-list__item p-worksDetail-wrapper-content-body-list-item">
                                <dt class="p-worksDetail-wrapper-content-body-list-item__term">ジャンル</dt>
                                <dd class="p-worksDetail-wrapper-content-body-list-item__desc"><?php echo esc_html(get_field('genre')); ?></dd>
                            </div>
                            <div class="p-worksDetail-wrapper-content-body-list__item p-worksDetail-wrapper-content-body-list-item">
                                <dt class="p-worksDetail-wrapper-content-body-list-item__term">担当と作業範囲</dt>
                                <dd class="p-worksDetail-wrapper-content-body-list-item__desc"><?php echo esc_html(get_field('role_scope')); ?></dd>
                            </div>
                            <div class="p-worksDetail-wrapper-content-body-list__item p-worksDetail-wrapper-content-body-list-item">
                                <dt class="p-worksDetail-wrapper-content-body-list-item__term">制作環境と使用言語</dt>
                                <dd class="p-worksDetail-wrapper-content-body-list-item__desc"><?php echo esc_html(get_field('environment')); ?></dd>
                            </div>
                            <div class="p-worksDetail-wrapper-content-body-list__item p-worksDetail-wrapper-content-body-list-item">
                                <dt class="p-worksDetail-wrapper-content-body-list-item__term">制作期間</dt>
                                <dd class="p-worksDetail-wrapper-content-body-list-item__desc"><?php echo esc_html(get_field('period')); ?></dd>
                            </div>
                            <div class="p-worksDetail-wrapper-content-body-list__item p-worksDetail-wrapper-content-body-list-item">
                                <dt class="p-worksDetail-wrapper-content-body-list-item__term">URL</dt>
                                <dd class="p-worksDetail-wrapper-content-body-list-item__desc c-url-link">
                                    <?php if (get_field('url')): ?>
                                        <a href="<?php echo esc_url(get_field('url')); ?>" target="_blank" rel="noopener">
                                            <?php echo esc_html(get_field('url')); ?>
                                        </a>
                                    <?php endif; ?>
                                </dd>
                            </div>
                            <div class="p-worksDetail-wrapper-content-body-list__item p-worksDetail-wrapper-content-body-list-item">
                                <dt class="p-worksDetail-wrapper-content-body-list-item__term">クライアント情報</dt>
                                <dd class="p-worksDetail-wrapper-content-body-list-item__desc"><?php echo esc_html(get_field('client')); ?></dd>
                            </div>
                            <div class="p-worksDetail-wrapper-content-body-list__item p-worksDetail-wrapper-content-body-list-item">
                                <dt class="p-worksDetail-wrapper-content-body-list-item__term">クライアントの意向と課題、制作経緯</dt>
                                <dd class="p-worksDetail-wrapper-content-body-list-item__desc"><?php echo esc_html(get_field('client_notes')); ?></dd>
                            </div>
                        </dl>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php
            $heading_top2 = get_field("section_post_heading_2_top");
            $heading_bottom2 = get_field("section_post_heading_2_bottom");
            $content2 = get_field("section_post_content_2");

            if (!empty($heading_top2) || !empty($heading_bottom2) || !empty($content2)) :
            ?>
                <div class="p-worksDetail-wrapper-content__body p-worksDetail-wrapper-content-body p-worksDetail-wrapper-content__body--second">
                    <h3 class="c-heading02--up">
                        <?php if ($heading_top) : ?>
                            <?php echo esc_html($heading_top); ?>
                        <?php endif; ?>
                    </h3>
                    <h3 class="c-heading02--left">
                        <?php if ($heading_bottom) : ?>
                            <span><?php echo esc_html($heading_bottom); ?></span>
                        <?php endif; ?>
                    </h3>
                    <div class="p-worksDetail-wrapper-content-body__text">
                        <?php if ($content2) : ?>
                            <?php echo nl2br(esc_html($content2)); ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- singleページ用ページネーション -->
            <div class="p-worksDetail-content-body__page-nation">
                <nav class="c-single-page-nation">
                    <?php
                    $prev_post = get_previous_post(false);
                    if ($prev_post) :
                    ?>
                        <div class="c-single-page-nation__prev">
                            <a href="<?php echo get_permalink($prev_post->ID); ?>" class="c-single-page-nation__link">
                                <div class="c-arrow02__right"></div>
                                <span>前の記事へ</span>
                            </a>
                        </div>
                    <?php endif; ?>

                    <?php
                    $next_post = get_next_post(false);
                    if ($next_post) :
                    ?>
                        <div class="c-single-page-nation__next">
                            <a href="<?php echo get_permalink($next_post->ID); ?>" class="c-single-page-nation__link">
                                <span>次の記事へ</span>
                                <div class="c-arrow02__left"></div>
                            </a>
                        </div>
                    <?php endif; ?>
                </nav>
            </div>
        </div>
        <!-- プロフィール -->
        <aside class="p-worksDetail-wrapper__profile p-worksDetail-wrapper-profile">
            <!-- 社長プロフィールのカード -->
            <div class="p-worksDetail-wrapper-profile__card p-worksDetail-wrapper-profile-card">
                <div class="p-worksDetail-wrapper-profile-card__image">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/president01.png" alt="代表 田中 太郎の写真 " width="320" height="210" loading="lazy">
                </div>
                <div class="p-worksDetail-wrapper-profile-card__text">
                    <p class="p-worksDetail-wrapper-profile-card__text--company">株式会社 XXXXXX</p>
                </div>
            </div>
            <div class="p-worksDetail-wrapper-profile__return">
                <a href="/works/" class="c-return c-return--worksDetail">
                    一覧に戻る<span class="c-arrow01__right c-arrow01__right--large"></span>
                </a>
            </div>
        </aside>
    </section>

    <!-- 関連記事 Swiper -->
    <div class="p-worksDetail__swiper">
        <?php get_template_part('template-parts/sections/section-related-swiper'); ?>
    </div>






</main>

<?php get_template_part('template-parts/sections/section-cta'); ?>
<?php get_footer(); ?>