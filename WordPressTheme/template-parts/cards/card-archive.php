<?php
$post_type = get_post_type(); // 'voice' or 'works'

// 投稿タイプごとに必要な情報を出し分け
if ($post_type === 'works') {
    $terms = get_the_terms(get_the_ID(), 'works_category');
    $summary = get_field('works_summary');
} elseif ($post_type === 'voice') {
    $terms = get_the_terms(get_the_ID(), 'voice_category');
    $summary = get_field('voice_summary');
} else {
    $terms = null;
    $summary = '';
}
?>

<a href="<?php the_permalink(); ?>" class="c-archive-card">
    <?php if ($terms && !is_wp_error($terms)) : ?>
        <span class="c-archive-card__label"><?php echo esc_html($terms[0]->name); ?></span>
    <?php endif; ?>

    <div class="c-archive-card__image">
        <?php the_post_thumbnail('large'); ?>
    </div>

    <div class="c-archive-card__summary">
        <?php if ($summary) : ?>
            <p class="c-archive-card__summary-text"><?php echo esc_html($summary); ?></p>
        <?php endif; ?>
    </div>
</a>
