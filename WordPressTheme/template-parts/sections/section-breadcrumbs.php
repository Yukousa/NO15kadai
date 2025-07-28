<nav class="c-breadcrumbs" aria-label="breadcrumb">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="c-breadcrumbs__top">TOP</a>

    <?php
    // contact / confirm / thanks ページは CONTACT に統一
    if (is_page('contact') || is_page('confirm') || is_page('thanks')) {
        echo '<span class="c-breadcrumbs__separator"> / </span>';
        echo '<span class="c-breadcrumbs__current">CONTACT</span>';

        // 固定ページ
    } elseif (is_page()) {
        $ancestors = get_post_ancestors(get_the_ID());
        if (!empty($ancestors)) {
            $parent_id = end($ancestors);
            echo '<span class="c-breadcrumbs__separator"> / </span>';
            echo '<a href="' . esc_url(get_permalink($parent_id)) . '" class="c-breadcrumbs__parent">' . esc_html(get_the_title($parent_id)) . '</a>';
        }
        echo '<span class="c-breadcrumbs__separator"> / </span>';
        echo '<span class="c-breadcrumbs__current">' . esc_html(get_the_title()) . '</span>';

        // 投稿（シングル）
    } elseif (is_single()) {
        echo '<span class="c-breadcrumbs__separator"> / </span>';
        echo '<span class="c-breadcrumbs__current">NEWS</span>';

        // カテゴリーアーカイブ
    } elseif (is_category()) {
        echo '<span class="c-breadcrumbs__separator"> / </span>';
        echo '<a href="' . esc_url(home_url('/news/')) . '" class="c-breadcrumbs__parent">NEWS</a>';

        echo '<span class="c-breadcrumbs__separator"> / </span>';
        echo '<span class="c-breadcrumbs__current">' . single_cat_title('', false) . '</span>';

        // 月別アーカイブ
    } elseif (is_date()) {
        echo '<span class="c-breadcrumbs__separator"> / </span>';
        echo '<a href="' . esc_url(home_url('/news/')) . '" class="c-breadcrumbs__parent">NEWS</a>';

        echo '<span class="c-breadcrumbs__separator"> / </span>';
        if (is_year()) {
            echo '<span class="c-breadcrumbs__current">' . get_the_time('Y年') . '</span>';
        } elseif (is_month()) {
            echo '<span class="c-breadcrumbs__current">' . get_the_time('Y年n月') . '</span>';
        } elseif (is_day()) {
            echo '<span class="c-breadcrumbs__current">' . get_the_time('Y年n月j日') . '</span>';
        }

        // 投稿一覧（home）
    } elseif (is_home()) {
        echo '<span class="c-breadcrumbs__separator"> / </span>';
        echo '<span class="c-breadcrumbs__current">NEWS</span>';
    }
    ?>
</nav>