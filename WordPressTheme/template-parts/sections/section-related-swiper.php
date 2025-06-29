<?php
    if (is_singular(['works', 'voice'])) {
        $post_type = get_post_type();
        $taxonomy = ($post_type === 'voice') ? 'voice_category' : 'works_category';
        $summary_field = ($post_type === 'voice') ? 'voice_summary' : 'works_summary';

        $term_ids = [];
        $terms = get_the_terms(get_the_ID(), $taxonomy);
        if ($terms && !is_wp_error($terms)) {
            $term_ids = wp_list_pluck($terms, 'term_id');
        }

        $related_args = [
            'post_type'      => $post_type,
            'posts_per_page' => 10,
            'post__not_in'   => [get_the_ID()],
            'orderby'        => 'date',
            'order'          => 'DESC',
        ];

        if (!empty($term_ids)) {
            $related_args['tax_query'] = [
                [
                    'taxonomy' => $taxonomy,
                    'field'    => 'term_id',
                    'terms'    => $term_ids,
                ],
            ];
        }

        $related_query = new WP_Query($related_args);

        if ($related_query->have_posts()) :
    ?>
            <div class="swiper c-related-swiper">
                <div class="swiper-wrapper">
                    <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
                        <div class="swiper-slide">
                            <?php
                            $slide_terms = get_the_terms(get_the_ID(), $taxonomy);
                            $summary = get_field($summary_field);
                            ?>
                            <a href="<?php the_permalink(); ?>" class="c-related-swiper-card">
                                <?php if ($slide_terms && !is_wp_error($slide_terms)) : ?>
                                    <span class="c-related-swiper-card__label"><?php echo esc_html($slide_terms[0]->name); ?></span>
                                <?php endif; ?>

                                <div class="c-related-swiper-card__image">
                                    <?php the_post_thumbnail('large'); ?>
                                </div>

                                <div class="c-related-swiper-card__summary">
                                    <?php if ($summary) : ?>
                                        <p class="c-related-swiper-card__summary-text"><?php echo esc_html($summary); ?></p>
                                    <?php endif; ?>
                                </div>
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>

            <nav class="c-related-swiper__nav c-related-swiper-nav">
                <div class="c-related-swiper-nav__prev">
                    <div class="c-arrow-svg">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="16 4 8 12 16 20" />
                        </svg>
                    </div>
                </div>
                <div class="c-related-swiper-nav__next">
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