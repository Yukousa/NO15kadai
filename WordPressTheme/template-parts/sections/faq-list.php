<?php
            $faq_group = SCF::get('faq_group');
            $index = 1;
            foreach ($faq_group as $faq) :
                $is_open = ($index === 1) ? 'is-open' : '';
                $is_hidden = ($index > 7) ? 'is-hidden' : '';
            ?>
                <div class="p-service-faq-list__item <?php echo $is_open . ' ' . $is_hidden; ?>">
                    <div class="p-service-faq-list__item-question js-faq-toggle">
                        <span class="p-service-faq-list__item-label">Q<?php echo $index; ?></span>
                        <span class="p-service-faq-list__item-text"><?php echo esc_html($faq['question']); ?></span>
                        <span class="p-service-faq-list__item-icon"></span>
                    </div>
                    <div class="p-service-faq-list__item-answer">
                        <p><?php echo nl2br(esc_html($faq['answer'])); ?></p>
                    </div>
                </div>
            <?php
                $index++;
            endforeach;
            ?>
