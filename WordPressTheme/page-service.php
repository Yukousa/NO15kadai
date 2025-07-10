<?php get_header(); ?>
<main class="p-service">
    <section class="p-service__mv p-service-mv">
        <div class="p-service-mv_inner p-service-mv-inner">
            <div class="p-service-mv-inner__title">
                <h2 class="c-heading01 c-heading01--large01" data-en="service">サービス</h2>
            </div>
            <div class="p-service-mv-inner__image">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/image13.png" alt="イメージ画像" width="1440" height="480" loading="lazy">
            </div>
        </div>
    </section>

    <div class="p-service__breadcrumbs">
        <?php get_template_part('template-parts/sections/section-breadcrumbs'); ?>
    </div>

    <section class="p-service__price p-service-price l-inner">
        <div class="p-service-price__inner">
            <div class="p-service-price__title">
                <h3 class="c-heading01  c-heading01--large02" data-en="price">料金</h3>
            </div>

            <div class="p-card-price-grid">
                <!-- card01 お見積り -->
                <div class="p-card-price p-card-price--estimate">
                    <div class="p-card-price__title">お見積もり</div>
                    <div class="p-card-price__body p-card-price-body p-card-price-body--estimate">
                        <p class="p-card-price-body__text">
                            <span class="js-count-num">0</span><span>円</span>
                        </p>
                    </div>
                </div>

                <!-- card02 基本料金 -->
                <div class="p-card-price p-card-price--basicFee">
                    <div class="p-card-price__title">基本料金</div>
                    <div class="p-card-price__body p-card-price-body p-card-price-body--basicFee">
                        <div class="p-card-price-body__image p-card-price-body__image--basicFee">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image14.png" alt="priceイメージイラスト" width="231" height="187" loading="lazy">
                        </div>
                        <div class="p-card-price-body__text-block p-card-price-body__text-block--basicFee">
                            <p class="p-card-price-body__text p-card-price-body__text--top" data-before="トップ" data-after="円～">00,000</p>
                            <p class="p-card-price-body__text p-card-price-body__text--bottom" data-before="下層" data-after="円～">00,000</p>
                        </div>
                    </div>
                </div>

                <!-- card03 アニメーション -->
                <div class="p-card-price p-card-price--animation">
                    <div class="p-card-price__title">アニメーション</div>
                    <div class="p-card-price__body p-card-price-body p-card-price-body--animation">
                        <p class="p-card-price-body__text p-card-price-body__text--animation" data-after="円～">00,000</p>
                    </div>
                </div>

                <!-- card04 レスポンシブ -->
                <div class="p-card-price p-card-price--responsive">
                    <div class="p-card-price__title">レスポンシブ</div>
                    <div class="p-card-price__body p-card-price-body p-card-price-body--responsive">
                        <div class="p-card-price-body__image p-card-price-body__image--responsive">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image15.png" alt="priceイメージイラスト" width="141" height="194" loading="lazy">
                        </div>
                        <div class="p-card-price-body__text-block">
                            <p class="p-card-price-body__text p-card-price-body__text--responsive" data-after="円～">00,000</p>
                        </div>
                    </div>
                </div>

                <!-- card05 実装工期 -->
                <div class="p-card-price p-card-price--deadline">
                    <div class="p-card-price__title">実装工期</div>
                    <div class="p-card-price__body p-card-price-body p-card-price-body--deadline">
                        <div class="p-card-price-body__text-block">
                            <p class="p-card-price-body__text" data-before="平均" data-after="週間">00</p>
                        </div>
                        <div class="p-card-price-body__image p-card-price-body__image--deadline">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image16.png" alt="priceイメージイラスト" width="466" height="215" loading="lazy">
                        </div>
                    </div>
                    <p class="p-card-price__note">※コーポレートサイト00ページあたり</p>
                </div>
            </div>
        </div></section>

    <section class="p-service__faq p-service-faq l-inner">
        <div class="p-service-faq__title">
            <h3 class="c-heading01 c-heading01--large02" data-en="faq">よくあるご質問</h3>
        </div>

        <div class="p-service-faq__list p-service-faq-list">
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

        <div class="p-service-faq__more p-service-faq-more">
            <button class="p-service-faq-more__btn js-faq-more">もっと見る</button>
        </div>
    </section>

</main>

<?php get_template_part('template-parts/sections/section-cta'); ?>
<?php get_footer(); ?>