<div class="p-top-voice__list p-top-voice-list">
            <?php
            $args = array(
              'post_type'      => 'voice',
              'posts_per_page' => 6,
            );
            $the_query = new WP_Query($args);

            $index = 0;
            if ($the_query->have_posts()) :
              while ($the_query->have_posts()) : $the_query->the_post();
                $index++;
            ?>
                <div class="p-top-voice-list__item p-top-voice-list-item" data-index="<?php echo $index; ?>">
                  <a href="<?php the_permalink(); ?>" class="p-top-voice-list-item__card p-top-voice-list-item-card">
                    <?php
                    // voiceカテゴリー取得
                    $terms = get_the_terms(get_the_ID(), 'voice_category');
                    ?>
                    <?php if ($terms && !is_wp_error($terms)) : ?>
                      <span class="p-top-voice-list-item-card__label"><?php echo esc_html($terms[0]->name); ?></span>
                    <?php endif; ?>

                    <div class="p-top-voice-list-item-card__image">
                      <?php the_post_thumbnail('large'); ?>
                    </div>

                    <div class="p-top-voice-list-item-card__summary">
                      <?php if ($summary = get_field('voice_summary')) : ?>
                        <p class="p-top-voice-list-item-card__text"><?php echo esc_html($summary); ?></p>
                      <?php endif; ?>
                    </div>
                  </a>
                </div>
            <?php
              endwhile;
              wp_reset_postdata();
            else :          echo '<p>まだ投稿がありません。</p>';
            endif;
            ?>
          </div>
