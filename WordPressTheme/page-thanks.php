<?php get_header(); ?>

<main class="p-profile">
    <section class="p-contact__mv p-contact-mv">
        <div class="p-contact-mv_inner p-contact-mv-inner">
            <div class="p-contact-mv-inner__title">
                <h2 class="c-heading01 c-heading01--large03" data-en="contact">お問い合わせ</h2>
            </div>
            <div class="p-contact-mv-inner__breadcrumbs">
                <?php get_template_part('template-parts/sections/section-breadcrumbs'); ?>
            </div>
        </div>
    </section>

    <section class="p-contact-thanks__inner p-contact-thanks-inner">
        <div class="p-contact-thanks-inner__text">
            <p class="p-contact-thanks-inner__text--1">送信が完了いたしました</p>
            <p class="p-contact-thanks-inner__text--2">お問い合わせいただきありがとうございます。<br>お問い合わせ頂いた内容については、<br class="u-mobile">確認の上ご返信させていただきます。</p>
        </div>
        <div class="p-contact-thanks__back">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="c-readMore c-readMore--thanks">TOPへ戻る<span class="c-arrow01_right c-arrow01_right--white"></span></a>
        </div>
    </section>

</main>
<?php get_template_part('template-parts/sections/section-cta'); ?>
<?php get_footer(); ?>