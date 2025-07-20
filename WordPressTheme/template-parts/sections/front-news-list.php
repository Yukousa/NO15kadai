<div class="p-front-news-inner-content__list p-front-news-inner-content-list">
          <?php
          $is_front = is_front_page();

          $paged = get_query_var('paged') ? get_query_var('paged') : 1;
          $posts_per_page = $is_front ? 3 : 10;

          $args = [
            'post_type'      => 'news',
            'posts_per_page' => $posts_per_page,
            'paged'          => $paged,
          ];

          $news_query = new WP_Query($args);
          if ($news_query->have_posts()) :
            while ($news_query->have_posts()) : $news_query->the_post();
          ?>
              <div class="p-front-news-inner-content-list__link p-front-news-inner-content-list-link">
                <a href="<?php the_permalink(); ?>">
                  <div class="p-front-news-inner-content-list-link__meta p-front-news-inner-content-list-link-meta">
                    <span class="p-front-news-inner-content-list-link-meta__date"><?php echo get_the_date('Y.m.d'); ?></span>

                    <?php
                    $terms = get_the_terms(get_the_ID(), 'news_category');
                    if (!empty($terms) && !is_wp_error($terms)) :
                    ?>
                      <span class="p-front-news-inner-content-list-link-meta__category">
                        <?php foreach ($terms as $term) : ?>
                          <span class="p-front-news-inner-content-list-link-meta__category-name"><?php echo esc_html($term->name); ?></span>
                        <?php endforeach; ?>
                      </span>
                    <?php endif; ?>
                  </div>


                  <h3 class="p-front-news-inner-content-list-link-post__title p-front-news-inner-content-list-link-post-title">
                    <p class="p-front-news-inner-content-list-link-post-title__text">
                      <?php echo esc_html(get_the_title()); ?>
                    </p>
                  </h3>


                </a>
              </div>
            <?php
            endwhile;
            wp_reset_postdata();
          else :
            ?>
            <p class="p-front-news-inner-content-list__none">まだ投稿がありません。</p>
          <?php endif; ?>
          <div class="p-front-news-inner-content-list__pagenavi--sp u-mobile">
            <?php if (function_exists('wp_pagenavi')) : ?>
              <?php wp_pagenavi(); ?>
            <?php endif; ?>
          </div>
        </div>
