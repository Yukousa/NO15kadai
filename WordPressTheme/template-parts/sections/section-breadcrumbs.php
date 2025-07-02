<nav class="c-breadcrumbs" aria-label="breadcrumb">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="c-breadcrumbs__top">TOP</a>

    <?php
    // contact / confirm / thanks ページは CONTACT に統一
    if (is_page('contact') || is_page('confirm') || is_page('thanks')) {
        echo '<span class="c-breadcrumbs__separator"> / </span>';
        echo '<span class="c-breadcrumbs__current">CONTACT</span>';
    } elseif (is_page()) {
        $ancestors = get_post_ancestors(get_the_ID());

        if (!empty($ancestors)) {
            $parent_id = end($ancestors);
            echo '<span class="c-breadcrumbs__separator"> / </span>';
            echo '<a href="' . esc_url(get_permalink($parent_id)) . '" class="c-breadcrumbs__parent">' . esc_html(get_the_title($parent_id)) . '</a>';
        }

        echo '<span class="c-breadcrumbs__separator"> / </span>';
        echo '<span class="c-breadcrumbs__current">' . esc_html(get_the_title()) . '</span>';
    } elseif (is_singular()) {
        $post_type = get_post_type();
        $post_type_obj = get_post_type_object($post_type);

        if ($post_type_obj && $post_type_obj->has_archive) {
            echo '<span class="c-breadcrumbs__separator"> / </span>';
            echo '<a href="' . esc_url(get_post_type_archive_link($post_type)) . '" class="c-breadcrumbs__current">' . esc_html($post_type_obj->labels->name) . '</a>';
        }
    } elseif (is_post_type_archive()) {
        $post_type = get_post_type();
        $post_type_obj = get_post_type_object($post_type);

        if ($post_type_obj) {
            echo '<span class="c-breadcrumbs__separator"> / </span>';
            echo '<span class="c-breadcrumbs__current">' . esc_html($post_type_obj->labels->name) . '</span>';
        }
    }
    ?>
</nav>