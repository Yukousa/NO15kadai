<?php
$post_type = get_post_type(); // 'voice' or 'works'
$summary_field = ($post_type === 'voice') ? 'voice_summary' : 'works_summary';
$taxonomy = ($post_type === 'voice') ? 'voice_category' : 'works_category';
$terms = get_the_terms(get_the_ID(), $taxonomy);
$modifier = 'c-card-post--' . esc_attr($post_type);
?>

<a href="<?php the_permalink(); ?>" class="c-card-post <?php echo $modifier; ?>">
  <div class="c-card-post__inner c-card-post-inner">
    <?php if ($terms && !is_wp_error($terms)) : ?>
      <span class="c-card-post-inner__label"><?php echo esc_html($terms[0]->name); ?></span>
    <?php endif; ?>
    <div class="c-card-post-inner__image">
      <?php the_post_thumbnail('large'); ?>
    </div>
  </div>
  <?php if ($summary = get_field($summary_field)) : ?>
    <p class="c-card-post__summary"><?php echo esc_html($summary); ?></p>
  <?php endif; ?>
</a>
