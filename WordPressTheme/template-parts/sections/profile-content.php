                <!-- 投稿画面ACF -->
                <?php for ($i = 1; $i <= 2; $i++) : // セクション数に合わせてループ範囲を変更 
                ?>
                    <?php
                    $heading_top = get_field("section_post_heading_{$i}_top");
                    $heading_bottom = get_field("section_post_heading_{$i}_bottom");
                    $content = get_field("section_post_content_{$i}");
                    $image = get_field("section_post_image_{$i}");

                    if (empty($heading_top) && empty($heading_bottom) && empty($content) && empty($image)) {
                        continue;
                    }
                    ?>
                    <div class="c-single-content c-single-content--profile">
                        <div class="c-single-content__wrapper">
                            <h3 class="c-heading02--up">
                                <?php if ($heading_top) : ?>
                                    <?php echo esc_html($heading_top); ?>
                                <?php endif; ?>
                            </h3>
                            <h3 class="c-heading02--left">
                                <?php if ($heading_bottom) : ?>
                                    <span><?php echo esc_html($heading_bottom); ?></span>
                                <?php endif; ?>
                            </h3>

                            <?php if ($content) : ?>
                                <div class="c-single-content__post c-single-content__post--profile">
                                    <?php echo nl2br(esc_html($content)); ?> </div>
                            <?php endif; ?>
                        </div>

                        <?php if ($image) : ?>
                            <div class="c-single-content__image c-single-content__image--profile">
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" width="950" height="327" loading="lazy">
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endfor; ?>