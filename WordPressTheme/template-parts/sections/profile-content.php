<?php for ($i = 1; $i <= 3; $i++) : ?>
  <?php
    $heading_top = get_field("section_post_heading_{$i}_top");
    $heading_bottom = get_field("section_post_heading_{$i}_bottom");
    $image = get_field("section_post_image_{$i}");
    $content = get_field("section_post_content_{$i}");

    // 全て空ならスキップ
    if (empty($heading_top) && empty($heading_bottom) && empty($content) && empty($image)) {
        continue;
    }
  ?>

  <div class="p-profile-content">
    <?php if ($heading_top) : ?>
      <h3 class="p-profile-content__title c-heading02 u-slide-up">
        <?php echo esc_html($heading_top); ?>
      </h3>
    <?php endif; ?>

    <?php if ($heading_bottom) : ?>
      <h3 class="p-profile-content__title c-heading02 c-heading02--black u-slide-left">
        <span><?php echo esc_html($heading_bottom); ?></span>
      </h3>
    <?php endif; ?>

    <?php if ($content) : ?>
  <div class="p-profile-content__text">
    <?php echo wp_kses_post(nl2br($content)); ?>
  </div>
<?php endif; ?>  </div>

  <?php if ($image) : ?>
    <div class="p-profile-content__image">
      <img src="<?php echo esc_url($image['url']); ?>"
           alt="<?php echo esc_attr($image['alt']); ?>"
           width="950" height="327" loading="lazy">
    </div>
  <?php endif; ?>
<?php endfor; ?>
