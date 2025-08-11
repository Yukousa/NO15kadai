<?php
if (is_singular(['works', 'voice'])) {
    $post_type  = get_post_type();
    $taxonomy   = ($post_type === 'voice') ? 'voice_category' : 'works_category';
    $lead_field = ($post_type === 'voice') ? 'voice_lead' : 'works_lead';

    $term_ids = [];
    $terms = get_the_terms(get_the_ID(), $taxonomy);
    if ($terms && !is_wp_error($terms)) {
        $term_ids = wp_list_pluck($terms, 'term_id');
    }

    $related_args = [
        'post_type'      => $post_type,
        'posts_per_page' => 12,
        'post__not_in'   => [get_the_ID()],
        'orderby'        => 'date',
        'order'          => 'DESC',
    ];

    if (!empty($term_ids)) {
        $related_args['tax_query'] = [[
            'taxonomy' => $taxonomy,
            'field'    => 'term_id',
            'terms'    => $term_ids,
        ]];
    }

    $related_query = new WP_Query($related_args);

    if ($related_query->have_posts()) :
?>
        <div class="swiper c-related-swiper" aria-label="関連記事スライダー">
            <ul class="swiper-wrapper c-related-swiper__list" role="list">
                <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
                    <?php
                    $slide_terms = get_the_terms(get_the_ID(), $taxonomy);
                    $lead = get_field('post-lead');
                    ?>
                    <li class="swiper-slide c-related-swiper__item" role="listitem">
                        <a href="<?php the_permalink(); ?>" class="c-related-swiper__card c-related-swiper-card">
                            <?php if ($slide_terms && !is_wp_error($slide_terms)) : ?>
                                <span class="c-related-swiper-card__label">
                                    <?php echo esc_html($slide_terms[0]->name); ?>
                                </span>
                            <?php endif; ?>

                            <div class="c-related-swiper-card__image">
                                <?php the_post_thumbnail('large'); ?>
                            </div>

                            <div class="c-related-swiper-card__lead">
                                <?php if ($lead) : ?>
                                    <p class="c-related-swiper-card__lead-text">
                                        <?php echo esc_html( wp_strip_all_tags( $lead, true ) ); ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>

        <nav class="c-related-swiper__nav c-related-swiper-nav" aria-label="スライド操作">
            <div class="c-related-swiper-nav__prev" aria-label="前へ">
                <div class="c-arrow-svg">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="16 4 8 12 16 20" />
                    </svg>
                </div>
            </div>
            <div class="c-related-swiper-nav__next" aria-label="次へ">
                <div class="c-arrow-svg c-arrow-svg--left">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="8 4 16 12 8 20" />
                    </svg>
                </div>
            </div>
        </nav>
        <?php wp_reset_postdata(); ?>
<?php
    endif;
}
?>
