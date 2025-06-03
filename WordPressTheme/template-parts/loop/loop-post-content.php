<?php
for ($i = 1; $i <= 10; $i++) {
    $heading_top = get_field("section_heading_{$i}_top");
    $heading_bottom = get_field("section_heading_{$i}_bottom");
    $content = get_field("section_content_{$i}");
    $image = get_field("section_image_{$i}"); // ← 画像フィールドを追加

    // すべて未入力ならスキップ
    if (empty($heading_top) && empty($heading_bottom) && empty($content) && empty($image)) {
        continue;
    }
?>
    <section class="c-single-content">
        <div class="c-single-content__wrapper">
            <h3 class="c-subtitle">
                <?php if ($heading_top): ?>
                    <span class="c-subtitle--line1"><?php echo esc_html($heading_top); ?></span>
                <?php endif; ?>
                <?php if ($heading_bottom): ?>
                    <span class="c-subtitle--line2 c-heading02"><?php echo esc_html($heading_bottom); ?></span>
                <?php endif; ?>
            </h3>

            <?php if ($content): ?>
                <div class="c-single-content__post">
                    <?php echo wp_kses_post($content); ?>
                </div>
            <?php endif; ?>
        </div>

        <?php if ($image): ?>
            <div class="c-single-content__image">
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
            </div>
        <?php endif; ?>
    </section>
<?php
}
?>