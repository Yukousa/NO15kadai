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
        <div class="p-profile__content p-profile-content">
            <!-- 本文 -->
            <article class="p-profile-content__body p-profile-content-body">
                <!-- 段落1 -->
                <div class="p-profile-body__paragraph p-profile-body-paragraph">
                    <h3 class="c-subtitle__wrapper">
                        <span class="c-subtitle c-subtitle--line1">丁寧な作業とコミュニケーションで</span>
                        <span class="c-subtitle c-subtitle--line2">ハイクオリティなコードを納品。</span>
                    </h3>
                    <p class="p-profile-body__paragraph--ext">
                        ここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入る<br><br>
                        ここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入る
                    </p>
                </div>

                <!-- 画像1 -->
                <div class="p-profile-body__image01">
                    <picture>
                        <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/image22.png" media="(max-width: 767px)">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image23.png" alt="イメージ画像">
                    </picture>
                </div>

                <!-- 段落2 -->
                <div class="p-profile-body__paragraph p-profile-body-paragraph">
                    <h3 class="c-subtitle__wrapper">
                        <span class="c-subtitle c-subtitle--line1">丁寧な作業とコミュニケーションで</span>
                        <span class="c-subtitle c-subtitle--line2 c-heading02">ハイクオリティなコードを納品。</span>
                    </h3>
                    <p class="p-profile-body__paragraph--text">
                        ここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入る<br><br>
                        ここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入る
                    </p>
                </div>
            </article>

            <!-- スライダー -->
            <article class="p-profile-body__slider">
                <?php get_template_part('template-parts/sections/section-css-slide'); ?>
            </article>
        </div>

        <!-- プロフィール -->
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