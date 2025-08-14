<?php
$heading_top = get_field('section_post_heading_1_top');
$heading_bottom = get_field('section_post_heading_1_bottom');
$image = get_field('section_post_image_1');
$content = get_field('section_post_content_1');

// 全て空なら出力しない
if (!empty($heading_top) || !empty($heading_bottom) || !empty($content) || !empty($image)) :
?>
  <div class="p-message-content-top__inner c-content">
    <?php if ($heading_top) : ?>
      <h2 class="p-message-content-top__title c-heading02 u-slide-up">
        <?php echo esc_html($heading_top); ?>
      </h2>
    <?php endif; ?>

    <?php if ($heading_bottom) : ?>
      <h2 class="p-message-content-top__title c-heading02 c-heading02--black u-slide-left">
        <?php echo esc_html($heading_bottom); ?>
      </h2>
    <?php endif; ?>

    <?php if ($content) : ?>
      <div class="c-content__text">
        <?php echo wp_kses_post(nl2br($content)); ?>
      </div>
    <?php endif; ?>
  </div>

  <?php if ($image) : ?>
    <div class="c-content__image">
      <img src="<?php echo esc_url($image['url']); ?>"
           alt="<?php echo esc_attr($image['alt']); ?>"
           width="950" height="327" loading="lazy">
    </div>
  <?php endif; ?>
<?php endif; ?>
