<?php
// フロントページかどうかを判定して modifier を付ける
$modifier = is_front_page() ? ' c-meta--front' : '';
?>
<div class="c-meta<?php echo $modifier; ?>">
    <span class="c-meta__date"><?php echo get_the_date('Y.m.d'); ?></span>

    <?php
    $terms = get_the_terms(get_the_ID(), 'news_category');
    if (!empty($terms) && !is_wp_error($terms)) :
    ?>
        <span class="c-meta__category">
            <?php foreach ($terms as $term) : ?>
                <span class="c-meta__category-name"><?php echo esc_html($term->name); ?></span>
            <?php endforeach; ?>
        </span>
    <?php endif; ?>
</div>
