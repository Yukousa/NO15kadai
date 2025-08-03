<div class="p-profile-career__wrapper">
  <h3 class="p-profile-career__title">経歴</h3>
  <div class="p-profile-career__description">
    <?php
    $career = get_field('profile_career');
    if ($career) {
      echo wp_kses_post($career);
    }
    ?>
  </div>
</div>

<div class="p-profile-career__wrapper">
  <h3 class="p-profile-career__title">職歴</h3>
  <div class="p-profile-career__description">
    <?php
    $history = get_field('profile_history');
    if ($history) {
      echo wp_kses_post($history);
    }
    ?>
  </div>
</div>
