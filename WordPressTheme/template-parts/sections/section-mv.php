<?php
$post_type_labels = array(
    'works' => '実績',
    'voice' => 'お客様の声',
    'news'  => 'お知らせ',
);

// 初期値
$ja_title = get_the_title();
$modifier = '';

// singleページ（投稿、カスタム投稿）
if (is_singular(array('works', 'voice', 'news'))) {
    $post_type = get_post_type();
    $ja_title = isset($post_type_labels[$post_type]) ? $post_type_labels[$post_type] : $post_type;
    $modifier = $post_type;
}
// カスタム投稿タイプのアーカイブページ
elseif (is_post_type_archive(array('works', 'voice', 'news'))) {
    $post_type = get_post_type(); // より確実
    $ja_title = isset($post_type_labels[$post_type]) ? $post_type_labels[$post_type] : $post_type;
    $modifier = $post_type;
}
// 固定ページ
elseif (is_page()) {
    $ja_title = get_the_title();
    global $post;
    $modifier = $post ? $post->post_name : '';
}
// その他
else {
    $ja_title = get_the_title();
    $modifier = '';
}
?>

<!-- ページタイトル -->
<div class="c-heading<?php echo $modifier ? ' c-heading--' . esc_attr($modifier) : ''; ?>">
    <h2 class="c-heading01<?php echo $modifier ? ' c-heading01--' . esc_attr($modifier) : ''; ?>" data-en="<?php echo esc_attr($modifier); ?>">
        <?php echo esc_html($ja_title); ?>
    </h2>
</div>

<!-- fv画像(アイキャッチ)：シングルページのみ表示 -->
<?php if (is_singular() && has_post_thumbnail()): ?>
    <div class="c-sub-fv__image<?php echo $modifier ? ' c-sub-fv__image--' . esc_attr($modifier) : ''; ?>">
        <?php the_post_thumbnail('full'); ?>
    </div>
<?php endif; ?>

<!-- パンくずリスト -->
<div class="p-breadcrumbs__wrapper<?php echo $modifier ? ' p-breadcrumbs__wrapper--' . esc_attr($modifier) : ''; ?>">
    <?php get_template_part('template-parts/sections/section-breadcrumbs'); ?>
</div>
