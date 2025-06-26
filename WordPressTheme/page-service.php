<?php get_header(); ?>

<main class="p-service">
    <section class="p-service__fv c-sub-fv">
        <!-- フロントページ以外のfv -->
        <?php get_template_part('template-parts/sections/section-sub-fv'); ?>
    </section>

    <section class="p-service__price p-service-price">
        <!-- 料金 -->
        <div class="p-service-price__inner">

<div class="c-heading c-heading--service">
    <h3 class="c-heading01 c-heading01--lineWhite c-heading01--serviceH3" data-en="price">料金</h3>
</div>

<!-- 料金表のタイル表示 -->
<div class="c-card-price-grid">
    <!-- card01 お見積り -->
    <div class="c-card-price c-card-price--estimate">
        <div class="c-card-price__title">お見積もり</div>
        <div class="c-card-price__body c-card-price-body c-card-price-body--estimate">
            <p class="c-card-price-body__text">
                <span class="js-count-num">0</span><span>円</span>
            </p>
        </div>
    </div>

    <!-- card02 基本料金 -->
    <div class="c-card-price c-card-price--basicFee">
        <div class="c-card-price__title">基本料金</div>
        <div class="c-card-price__body c-card-price-body c-card-price-body--basicFee">
            <div class="c-card-price-body__image c-card-price-body__image--basicFee">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image14.png" alt="priceイメージイラスト">
            </div>
            <div class="c-card-price-body__text-block c-card-price-body__text-block--basicFee">
                <p class="c-card-price-body__text c-card-price-body__text--top" data-before="トップ" data-after="円～">00,000</p>
                <p class="c-card-price-body__text c-card-price-body__text--bottom" data-before="下層" data-after="円～">00,000</p>
            </div>
        </div>
    </div>

    <!-- card03 アニメーション -->
    <div class="c-card-price c-card-price--animation">
        <div class="c-card-price__title">アニメーション</div>
        <div class="c-card-price__body c-card-price-body c-card-price-body--animation">
            <p class="c-card-price-body__text" data-after="円～">00,000</p>
        </div>
    </div>

    <!-- card04 レスポンシブ -->
    <div class="c-card-price c-card-price--responsive">
        <div class="c-card-price__title">レスポンシブ</div>
        <div class="c-card-price__body c-card-price-body c-card-price-body--responsive">
            <div class="c-card-price-body__image c-card-price-body__image--responsive">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image15.png" alt="priceイメージイラスト">
            </div>
            <div class="c-card-price-body__text-block">
                <p class="c-card-price-body__text c-card-price-body__text--responsive" data-after="円～">00,000</p>
            </div>
        </div>
    </div>

    <!-- card05 実装工期 -->
    <div class="c-card-price c-card-price--deadline">
        <div class="c-card-price__title">実装工期</div>
        <div class="c-card-price__body c-card-price-body c-card-price-body--deadline">
            <div class="c-card-price-body__text-block">
                <p class="c-card-price-body__text" data-before="平均" data-after="週間">00</p>
            </div>
            <div class="c-card-price-body__image c-card-price-body__image--deadline">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image16.png" alt="priceイメージイラスト">
            </div>
        </div>
        <p class="c-card-price__note">※コーポレートサイト00ページあたり</p>
    </div>
</div>
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

</main>

<?php get_template_part('template-parts/sections/section-cta'); ?>
<?php get_footer(); ?>