<?php get_header(); ?>
<main class="p-single-news">
    <section class="p-single-news__mv p-single-news-mv">
        <div class="p-single-news-mv__inner p-single-news-mv-inner l-inner">
            <div class="p-single-news-mv-inner__title">
                <h3 class="c-heading01 c-heading01--large03" data-en="news">お知らせ</h3>
            </div>
            <div class="p-single-news-mv-inner__breadcrumbs">
                <?php get_template_part('template-parts/sections/section-breadcrumbs'); ?>
            </div>
        </div>
    </section>

    <section class="p-single-news__wrapper p-single-news-wrapper">
        <article class="p-single-news-wrapper__inner p-single-news-wrapper-inner l-inner">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <h2 class="p-single-news-wrapper-inner__postTitle ">
                    <?php
    $title = get_the_title(); // $ID は不要。現在の投稿タイトルを取得
    $title = str_replace(" ", "<br>", $title);
    echo $title;
  ?></h2>
            <?php endwhile;
            endif; ?>

            <div class="p-single-news-wrapper-inner__meta p-single-news-wrapper-inner-meta">
                <div class="p-single-news-wrapper-inner-meta__date"><?php echo get_the_date('Y.m.d'); ?></div>

                <?php
                $terms = get_the_terms(get_the_ID(), 'news_category');
                if (!empty($terms) && !is_wp_error($terms)) :
                ?>
                    <div class="p-single-news-wrapper-inner-meta__category">
                        <?php foreach ($terms as $term) : ?>
                            <span class="p-single-news-wrapper-inner-meta__category-name"><?php echo esc_html($term->name); ?></span>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="p-single-news-wrapper-inner__eye-catch">
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

            <div class="p-single-news-wrapper-inner__content p-single-news-wrapper-inner-content">
                <div class="p-single-news-wrapper-inner-content__body p-single-news-wrapper-inner-content-body">
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
                        <div class="c-single-content c-single-content--news">
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
                                    <div class="c-single-content__post c-single-content__post--news">
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
                </div>

                <div class="p-single-news-wrapper-inner-content__btn">
                    <a href="#" class="c-return c-return--single-news">
                        一覧に戻る<span class="c-arrow01_right"></span>
                    </a>
                </div>

            </div>
        </article>
        <!-- pc時　サイドバー -->
         <aside class="p-single-news-wrapper__sidebar">
             <?php get_template_part('template-parts/sections/section-news-sidebar'); ?>
         </aside>
    </section>

</main>

<?php get_template_part('template-parts/sections/section-cta'); ?>
<?php get_footer(); ?>