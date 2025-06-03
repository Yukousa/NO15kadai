<nav class="c-single-page-nation">
  <?php
  $prev_post = get_previous_post(false);
  if ($prev_post): ?>
    <div class="c-single-page-nation__prev">
      <a href="<?php echo get_permalink($prev_post->ID); ?>" class="c-single-page-nation__link">
        <div class="c-arrow02_right"></div>
        <span>前の記事へ</span>
      </a>
    </div>
  <?php endif; ?>

  <?php
  $next_post = get_next_post(false);
  if ($next_post): ?>
    <div class="c-single-page-nation__next">
      <a href="<?php echo get_permalink($next_post->ID); ?>" class="c-single-page-nation__link">
        <span>次の記事へ</span>
        <div class="c-arrow02_left"></div>
      </a>
    </div>
  <?php endif; ?>
</nav>
