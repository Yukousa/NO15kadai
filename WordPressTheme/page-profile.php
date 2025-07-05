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
        <div class="p-profile-breadcrumbs__inner">
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
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/html.png" alt="html" width="90" height="104" loading="lazy">
                            <p>HTML</p>
                        </div>
                        <div class="p-profile-skill-inner-wrapper-cording-icons__item p-profile-skill-inner-wrapper-cording-icons__item--css">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/css.png" alt="css" width="90" height="104" loading="lazy">
                            <p>CSS</p>
                        </div>
                        <div class="p-profile-skill-inner-wrapper-cording-icons__item p-profile-skill-inner-wrapper-cording-icons__item--sass">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sass.png" alt="sass" width="129" height="97" loading="lazy">
                            <p>Sass</p>
                        </div>
                        <div class="p-profile-skill-inner-wrapper-cording-icons__item p-profile-skill-inner-wrapper-cording-icons__item--js">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/js.png" alt="js" width="115" height="115" loading="lazy">
                            <p>JavaScript</p>
                        </div>
                        <div class="p-profile-skill-inner-wrapper-cording-icons__item p-profile-skill-inner-wrapper-cording-icons__item--php">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/php.png" alt="php" width="158" height="83" loading="lazy">
                            <p>PHP</p>
                        </div>
                    </div>
                </div>

                <!-- cms -->
                <div class="p-profile-skill-inner-wrapper__cms p-profile-skill-inner-wrapper-cms">
                    <h3 class="p-profile-skill-inner-wrapper-cms__title">CMS</h3>
                    <div class="p-profile-skill-inner-wrapper-cms__icons p-profile-skill-inner-wrapper-cms-icons">
                        <div class="p-profile-skill-inner-wrapper-cms-icons__item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/wordpress.png" alt="wordpress" width="134" height="130" loading="lazy">
                            <p>WordPress</p>
                        </div>
                    </div>
                </div>

                <!-- デザイン -->
                <div class="p-profile-skill-inner-wrapper__design p-profile-skill-inner-wrapper-design">
                    <h3 class="p-profile-skill-inner-wrapper-design__title">デザイン</h3>
                    <div class="p-profile-skill-inner-wrapper-design__icons p-profile-skill-inner-wrapper-design-icons">
                        <div class="p-profile-skill-inner-wrapper-design-icons__item p-profile-skill-inner-wrapper-design-icons__item--ai">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/ai.png" alt="ai" width="97" height="97" loading="lazy">
                            <p>Illustrator</p>
                        </div>
                        <div class="p-profile-skill-inner-wrapper-design-icons__item p-profile-skill-inner-wrapper-design-icons__item--ps">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/ps.png" alt="ps" width="97" height="97" loading="lazy">
                            <p>Photoshop</p>
                        </div>
                        <div class="p-profile-skill-inner-wrapper-design-icons__item p-profile-skill-inner-wrapper-design-icons__item--xd">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/xd.png" alt="xd" width="97" height="97" loading="lazy">
                            <p>XD</p>
                        </div>
                        <div class="p-profile-skill-inner-wrapper-design-icons__item p-profile-skill-inner-wrapper-design-icons__item--figma">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/figma.png" alt="figma" width="67" height="100" loading="lazy">
                            <p>Figma</p>
                        </div>
                    </div>
                </div>

                <!-- コミュニケーション -->
                <div class="p-profile-skill-inner-wrapper__communication p-profile-skill-inner-wrapper-communication">
                    <h3 class="p-profile-skill-inner-wrapper-communication__title">コミュニケーション</h3>
                    <div class="p-profile-skill-inner-wrapper-communication__icons p-profile-skill-inner-wrapper-communication-icons">
                        <div class="p-profile-skill-inner-wrapper-communication-icons__item p-profile-skill-inner-wrapper-communication-icons__item--chatwork">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/chatwork.png" alt="chatwork" width="94" height="94" loading="lazy">
                            <p>chatwork</p>
                        </div>
                        <div class="p-profile-skill-inner-wrapper-communication-icons__item p-profile-skill-inner-wrapper-communication-icons__item--mail">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mail.png" alt="mail" width="100" height="100" loading="lazy">
                            <p>メール</p>
                        </div>
                        <div class="p-profile-skill-inner-wrapper-communication-icons__item p-profile-skill-inner-wrapper-communication-icons__item--slack">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slack.png" alt="slack" width="93" height="93" loading="lazy">
                            <p>slack</p>
                        </div>
                        <div class="p-profile-skill-inner-wrapper-communication-icons__item p-profile-skill-inner-wrapper-communication-icons__item--line">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/line.png" alt="line" width="109" height="109" loading="lazy">
                            <p>line</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- pc時　2カラム -->
    <section class="p-profile__container p-profile-container">
        <div class="p-profile-container__content p-profile-container-content">
            <article class="p-profile-container-content__body p-profile-container-content-body l-inner">
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
                            <div class="c-single-content__image c-single-content__image--profile">
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" width="950" height="327" loading="lazy">
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endfor; ?>
            </article>
            <div class="p-profile-container-content__image">
                <div class="p-profile-container-content__image--01">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image28.png" alt="仕事のイメージ画像" width="462" height="286" loading="lazy">
                </div>
                <div class="p-profile-container-content__image--02">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image29.png" alt="仕事のイメージ画像" width="462" height="286" loading="lazy">
                </div>
            </div>

        </div>
        <!-- プロフィール pc時サイドバー -->
        <aside class="p-profile-container__profile p-profile-container-profile l-inner">
            <div class="p-profile-container-profile__body p-profile-container-profile-body">
                <div class="p-profile-container-profile-body__image">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/president01.png" alt="代表 田中 太郎の写真" width="320" height="200" loading="lazy">
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
                <div class="p-profile-container-profile-content__inner p-profile-container-profile-content-inner">
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