<?php get_header(); ?>

<main class="p-profile">
    <section class="p-profile__mv p-profile-mv">
        <div class="p-profile-mv__title">
            <h2 class="c-heading01 c-heading01--large01" data-en="profile">経歴・職歴</h2>
        </div>
        <div class="p-profile-mv__image">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/image08.png" alt="イメージ画像" width="1440" height="480" loading="lazy">
        </div>
    </section>
    <div class="p-profile__breadcrumbs p-profile-breadcrumbs">
        <div class="p-profile-breadcrumbs__inner l-inner">
            <?php get_template_part('template-parts/sections/section-breadcrumbs'); ?>
        </div>
    </div>

    <!-- コードスキル　アイコン群 -->
    <section class="p-profile-skill">
        <div class="p-profile-skill__inner p-profile-skill-inner l-inner">
            <h2 class="c-heading01 c-heading01--large02small" data-en="CODE SKILL">対応が可能なコーディングスキルと<br class="u-mobile">デザインデータ</h2>

            <div class="p-profile-skill-inner__wrapper p-profile-skill-inner-wrapper">
                <!-- コーディング -->
                <div class="p-profile-skill-inner-wrapper__cording p-profile-skill-inner-wrapper-cording">
                    <h3 class="p-profile-skill-inner-wrapper-cording__title">コーディング</h3>
                    <div class="p-profile-skill-inner-wrapper-cording__icons p-profile-skill-inner-wrapper-cording-icons">
                        <div class="p-profile-skill-inner-wrapper-cording-icons__item p-profile-skill-inner-wrapper-cording-icons__item--html">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/html.png" alt="icon">
                            <p>HTML</p>
                        </div>
                        <div class="p-profile-skill-inner-wrapper-cording-icons__item p-profile-skill-inner-wrapper-cording-icons__item--css">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/css.png" alt="icon">
                            <p>CSS</p>
                        </div>
                        <div class="p-profile-skill-inner-wrapper-cording-icons__item p-profile-skill-inner-wrapper-cording-icons__item--sass">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sass.png" alt="icon">
                            <p>Sass</p>
                        </div>
                        <div class="p-profile-skill-inner-wrapper-cording-icons__item p-profile-skill-inner-wrapper-cording-icons__item--js">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/js.png" alt="icon">
                            <p>JavaScript</p>
                        </div>
                        <div class="p-profile-skill-inner-wrapper-cording-icons__item p-profile-skill-inner-wrapper-cording-icons__item--php">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/php.png" alt="icon">
                            <p>PHP</p>
                        </div>
                    </div>
                </div>

                <!-- cms -->
                <div class="p-profile-skill-inner-wrapper__cms p-profile-skill-inner-wrapper-cms">
                    <h3 class="p-profile-skill-inner-wrapper-cms__title">CMS</h3>
                    <div class="p-profile-skill-inner-wrapper-cms__icons p-profile-skill-inner-wrapper-cms-icons">
                        <div class="p-profile-skill-inner-wrapper-cms-icons__item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/wordpress.png" alt="icon">
                            <p>WordPress</p>
                        </div>
                    </div>
                </div>

                <!-- デザイン -->
                <div class="p-profile-skill-inner-wrapper__design p-profile-skill-inner-wrapper-design">
                    <h3 class="p-profile-skill-inner-wrapper-design__title">デザイン</h3>
                    <div class="p-profile-skill-inner-wrapper-design__icons p-profile-skill-inner-wrapper-design-icons">
                        <div class="p-profile-skill-inner-wrapper-design-icons__item p-profile-skill-inner-wrapper-design-icons__item--ai">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/ai.png" alt="icon">
                            <p>Illustrator</p>
                        </div>
                        <div class="p-profile-skill-inner-wrapper-design-icons__item p-profile-skill-inner-wrapper-design-icons__item--ps">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/ps.png" alt="icon">
                            <p>Photoshop</p>
                        </div>
                        <div class="p-profile-skill-inner-wrapper-design-icons__item p-profile-skill-inner-wrapper-design-icons__item--xd">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/xd.png" alt="icon">
                            <p>XD</p>
                        </div>
                        <div class="p-profile-skill-inner-wrapper-design-icons__item p-profile-skill-inner-wrapper-design-icons__item--figma">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/figma.png" alt="icon">
                            <p>Figma</p>
                        </div>
                    </div>
                </div>

                <!-- コミュニケーション -->
                <div class="p-profile-skill-inner-wrapper__communication p-profile-skill-inner-wrapper-communication">
                    <h3 class="p-profile-skill-inner-wrapper-communication__title">コミュニケーション</h3>
                    <div class="p-profile-skill-inner-wrapper-communication__icons p-profile-skill-inner-wrapper-communication-icons">
                        <div class="p-profile-skill-inner-wrapper-communication-icons__item p-profile-skill-inner-wrapper-communication-icons__item--chatwork">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/chatwork.png" alt="icon">
                            <p>chatwork</p>
                        </div>
                        <div class="p-profile-skill-inner-wrapper-communication-icons__item p-profile-skill-inner-wrapper-communication-icons__item--mail">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mail.png" alt="icon">
                            <p>メール</p>
                        </div>
                        <div class="p-profile-skill-inner-wrapper-communication-icons__item p-profile-skill-inner-wrapper-communication-icons__item--slack">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slack.png" alt="icon">
                            <p>slack</p>
                        </div>
                        <div class="p-profile-skill-inner-wrapper-communication-icons__item p-profile-skill-inner-wrapper-communication-icons__item--line">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/line.png" alt="icon">
                            <p>line</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- pc時　2カラム -->
    <section class="p-profile__container p-profile-container">
        <div class="p-profile-container__wrapper p-profile-container-wrapper">
            <article class="p-profile-container-wrapper__body p-profile-container-wrapper__body">
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
                    <div class="c-single-content c-single-content--profile">
                        <div class="c-single-content__wrapper">
                            <h3 class="c-subtitle">
                                <?php if ($heading_top) : ?>
                                    <span class="c-subtitle--line1"><?php echo esc_html($heading_top); ?></span>
                                <?php endif; ?>
                                <?php if ($heading_bottom) : ?>
                                    <span class="c-subtitle--line2 c-heading02"><?php echo esc_html($heading_bottom); ?></span>
                                <?php endif; ?>
                            </h3>
                            <?php if ($content) : ?>
                                <div class="c-single-content__post c-single-content__post--profile">
                                    <?php echo nl2br(esc_html($content)); ?> </div>
                            <?php endif; ?>
                        </div>

                        <?php if ($image) : ?>
                            <div class="c-single-content__image">
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endfor; ?>
            </article>
            <!-- スライダー -->
            <div class="p-profile-container-wrapper__body__slider">
                <section class="c-slide">
                    <div class="c-slide-track">
                        <div class="c-slide-item">
                            <div class="c-slide-row1">
                                <div class="c-slide-image1">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image11.png" alt="WORKイメージ">
                                </div>
                                <div class="c-slide-image2">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image19.png" alt="WORKイメージ">
                                </div>
                            </div>
                            <div class="c-slide-row2">
                                <div class="c-slide-image3">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image04.png" alt="WORKイメージ">
                                </div>
                                <div class="c-slide-image4">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image12.png" alt="WORKイメージ">
                                </div>
                            </div>
                        </div>

                        <!-- クローンをつなげて無限ループ感を出す -->
                        <div class="c-slide-item">
                            <div class="c-slide-row1">
                                <div class="c-slide-image1">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image11.png" alt="WORKイメージ">
                                </div>
                                <div class="c-slide-image2">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image19.png" alt="WORKイメージ">
                                </div>
                            </div>
                            <div class="c-slide-row2">
                                <div class="c-slide-image3">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image04.png" alt="WORKイメージ">
                                </div>
                                <div class="c-slide-image4">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image12.png" alt="WORKイメージ">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- プロフィール pc時サイドバー -->
        <aside class="p-profile-container__profile p-profile-container-profile l-inner">
            <div class="p-profile-container-profile__body p-profile-container-profile-body">
                <div class="p-profile-container-profile-body__image">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/president01.png" alt="代表 田中 太郎の写真">
                </div>
                <div class="p-profile-container-profile-body__text">
                    <p class="p-profile-container-profile-body--company">株式会社 XXXXXX</p>
                    <p class="p-profile-container-profile-body--ja">田中 太郎</p>
                    <p class="p-profile-container-profile-body--ja2">代表 田中 太郎</p>
                    <p class="p-profile-container-profile-body--en">Tanaka Tarou</p>
                </div>
            </div>

            <div class="p-profile-container-profile__content p-profile-container-profile-content">
                <div class="p-profile-container-profile-content__inner p-profile-container-profile-content-inner">
                    <h4 class="p-profile-container-profile-content-inner__title">経歴</h4>
                    <p class="p-profile-container-profile-content-inner__text">ここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入る</p>
                </div>
                <div class="p-profile-profile-content__inner p-profile-profile-content-inner">
                    <div class="p-profile-profile__content p-profile-profile-content">
                        <h4 class="p-profile-container-profile-content-inner__title">職歴</h4>
                        <p class="p-profile-container-profile-content-inner__text">ここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入る</p>
                    </div>
                </div>
            </div>

        </aside>
    </section>

</main>
<?php get_template_part('template-parts/sections/section-cta'); ?>
<?php get_footer(); ?>