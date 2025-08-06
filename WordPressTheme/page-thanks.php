<?php get_header(); ?>

<main>
    <section class="p-mv">
        <div class="p-mv__inner">
            <h2 class="p-mv__title l-inner" data-en="contact">お問合せ</h2>
        </div>
    </section>
    <nav class="p-breadcrumbs" aria-label="breadcrumb">
        <?php get_template_part('template-parts/sections/section-breadcrumbs'); ?>
    </nav>

    <section class="p-contact-thanks">
        <div class="p-contact-thanks__text">
            <p class="p-contact-thanks__text--1">送信が完了いたしました</p>
            <p class="p-contact-thanks__text--2">お問い合わせいただきありがとうございます。<br>お問い合わせ頂いた内容については、<br class="u-mobile">確認の上ご返信させていただきます。</p>
        </div>
        <div class="p-contact-thanks__back">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="c-readMore c-readMore--thanks">TOPへ戻る<span class="c-arrow01__right c-arrow01__right--white"></span></a>
        </div>
    </section>

</main>
<?php get_template_part('template-parts/sections/section-cta'); ?>
<?php get_footer(); ?>