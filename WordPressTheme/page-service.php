<?php get_header(); ?>

<main class="p-service">
    <section class="p-service__fv c-sub-fv">
        <!-- フロントページ以外のfv -->
        <?php get_template_part('template-parts/sections/section-sub-fv'); ?>
    </section>

    <section class="p-service__price p-service-price">
        <!-- 料金 -->
        <?php get_template_part('template-parts/sections/section-price'); ?>
    </section>

    <!-- faq -->
    <section class="p-service__faq p-service-faq">
        <div class="c-heading c-heading--service">
            <h3 class="c-heading01 c-heading01--lineWhite c-heading01--serviceH3" data-en="faq">よくあるご質問</h3>
        </div>

        <div class="p-service-faq__list p-service-faq-list">
            <?php
            $faq_group = SCF::get('faq_group');
            $index = 1;
            foreach ($faq_group as $faq) :
                $is_open = ($index === 1) ? 'is-open' : '';
                $is_hidden = ($index > 15) ? 'is-hidden' : '';
            ?>
                <div class="p-service-faq-list__item <?php echo $is_open . ' ' . $is_hidden; ?>">
                    <div class="p-service-faq-list__item-question js-faq-toggle">
                        <span class="p-service-faq-list__item-label">Q<?php echo $index; ?></span>
                        <span class="p-service-faq-list__item-text"><?php echo esc_html($faq['question']); ?></span> <span class="p-service-faq-list__item-icon"></span>
                    </div>
                    <div class="p-service-faq-list__item-answer">
                        <p><?php echo nl2br(esc_html($faq['answer'])); ?></p>
                    </div>
                </div>
            <?php
                $index++;
            endforeach;
            ?>
        </div>

        <?php if ($index > 15): ?>
            <div class="p-service-faq__more p-service-faq-more">
                <button class="p-service-faq-more__btn js-faq-more">もっと見る<span class="p-service-faq-more__arrow"></span></button>
            </div>
        <?php endif; ?>
    </section>


    <!-- リンクバナー contact / faq -->
    <section class="p-section-wrapper">
        <?php get_template_part('template-parts/sections/section-contact'); ?>
        <?php get_template_part('template-parts/sections/section-faq'); ?>
    </section>

</main>


<?php get_footer(); ?>