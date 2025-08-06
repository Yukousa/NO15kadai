<?php
$heading_top = get_field('section_post_heading_1_top');
$heading_bottom = get_field('section_post_heading_1_bottom');
$image = get_field('section_post_image_1');
$content = get_field('section_post_content_1');

// 全て空なら出力しない
if (!empty($heading_top) || !empty($heading_bottom) || !empty($content) || !empty($image)) :
?>
  <div class="c-content">
    <?php if ($heading_top) : ?>
      <h3 class="c-content__title--top c-heading02--up">
        <?php echo esc_html($heading_top); ?>
      </h3>
    <?php endif; ?>

    <?php if ($heading_bottom) : ?>
      <h3 class="c-content__title--bottom c-heading02--left">
        <span><?php echo esc_html($heading_bottom); ?></span>
      </h3>
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
