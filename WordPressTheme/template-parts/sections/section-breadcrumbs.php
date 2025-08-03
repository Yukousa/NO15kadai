    <ul class="p-breadcrumbs__list">
        <li class="p-breadcrumbs__item">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="p-breadcrumbs__link">TOP</a>
        </li>

        <?php
        // contact / confirm / thanks ページは CONTACT に統一
        if (is_page('contact') || is_page('confirm') || is_page('thanks')) {
            echo '<li class="p-breadcrumbs__item">CONTACT</li>';

        // 固定ページ
        } elseif (is_page()) {
            $ancestors = get_post_ancestors(get_the_ID());
            if (!empty($ancestors)) {
                $parent_id = end($ancestors);
                echo '<li class="p-breadcrumbs__item"><a href="' . esc_url(get_permalink($parent_id)) . '" class="p-breadcrumbs__link">' . esc_html(get_the_title($parent_id)) . '</a></li>';
            }
            echo '<li class="p-breadcrumbs__item" aria-current="page">' . esc_html(get_the_title()) . '</li>';

        // 投稿（シングル）
        } elseif (is_single()) {
            echo '<li class="p-breadcrumbs__item" aria-current="page">NEWS</li>';

        // カテゴリーアーカイブ
        } elseif (is_category()) {
            echo '<li class="p-breadcrumbs__item"><a href="' . esc_url(home_url('/news/')) . '" class="p-breadcrumbs__link">NEWS</a></li>';
            echo '<li class="p-breadcrumbs__item" aria-current="page">' . single_cat_title('', false) . '</li>';

        // 月別アーカイブ
        } elseif (is_date()) {
            echo '<li class="p-breadcrumbs__item"><a href="' . esc_url(home_url('/news/')) . '" class="p-breadcrumbs__link">NEWS</a></li>';
            if (is_year()) {
                echo '<li class="p-breadcrumbs__item" aria-current="page">' . get_the_time('Y年') . '</li>';
            } elseif (is_month()) {
                echo '<li class="p-breadcrumbs__item" aria-current="page">' . get_the_time('Y年n月') . '</li>';
            } elseif (is_day()) {
                echo '<li class="p-breadcrumbs__item" aria-current="page">' . get_the_time('Y年n月j日') . '</li>';
            }

        // 投稿一覧（home）
        } elseif (is_home()) {
            echo '<li class="p-breadcrumbs__item" aria-current="page">NEWS</li>';
        }
        ?>
    </ul>
