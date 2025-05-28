<div class="swiper p-front-fv-swiper js-front-fv-swiper">
  <div class="swiper-wrapper">
    <?php
    // PCとSPそれぞれの画像を配列で取得
    $images_pc = array_filter([
      get_field('slider_front-fv_pc1'),
      get_field('slider_front-fv_pc2'),
      get_field('slider_front-fv_pc3'),
    ]);

    $images_sp = array_filter([
      get_field('slider_front-fv_sp1'),
      get_field('slider_front-fv_sp2'),
      get_field('slider_front-fv_sp3'),
    ]);
    ?>

    <?php for ($i = 0; $i < count($images_pc); $i++) :
      $pc_image = $images_pc[$i] ?? null;
      $sp_image = $images_sp[$i] ?? null;
    ?>
      <?php if ($pc_image && $sp_image): ?>
        <div class="swiper-slide">
          <picture>
            <source srcset="<?php echo esc_url($sp_image['url']); ?>" media="(max-width: 767px)">
            <img src="<?php echo esc_url($pc_image['url']); ?>" alt="<?php echo esc_attr($pc_image['alt']); ?>">
          </picture>
        </div>
      <?php endif; ?>
    <?php endfor; ?>
  </div>
</div>
