<a href="<?php the_permalink(); ?>" class="p-front-works-swiper__card p-front-works-swiper-card">
    <?php
    // worksカテゴリー取得
    $terms = get_the_terms(get_the_ID(), 'works_category');
    ?>
    <?php if ($terms && !is_wp_error($terms)) : ?>
        <span class="p-front-works-swiper-card__label"><?php echo esc_html($terms[0]->name); ?></span>
    <?php endif; ?>

    <div class="p-front-works-swiper-card__image">
        <?php the_post_thumbnail('large'); ?>
    </div>

    <div class="p-front-works-swiper-card__summary">
        <?php if ($summary = get_field('works_summary')) : ?>
            <p class="p-front-works-swiper-card__summary-text"><?php echo esc_html($summary); ?></p>
        <?php endif; ?>
    </div>
</a>