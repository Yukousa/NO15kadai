<a href="<?php the_permalink(); ?>" class="p-front-voice-list-item__card p-front-voice-list-item-card">
    <?php
    // voiceカテゴリー取得
    $terms = get_the_terms(get_the_ID(), 'voice_category');
    ?>
    <?php if ($terms && !is_wp_error($terms)) : ?>
        <span class="p-front-voice-list-item-card__label"><?php echo esc_html($terms[0]->name); ?></span>
    <?php endif; ?>

    <div class="p-front-voice-list-item-card__image">
        <?php the_post_thumbnail('large'); ?>
    </div>

    <div class="p-front-voice-list-item-card__summary">
        <?php if ($summary = get_field('voice_summary')) : ?>
            <p class="p-front-voice-list-item-card-text"><?php echo esc_html($summary); ?></p>
        <?php endif; ?>
    </div>
</a>