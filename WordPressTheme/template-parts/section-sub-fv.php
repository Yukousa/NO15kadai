<?php
$post_type_labels = array(
    'works' => '実績',
    'voice' => 'お客様の声',
    'news'  => 'お知らせ',
    'post'  => 'ブログ',
);

// デフォルト
$ja_title = get_the_title();
$modifier = '';

// singleページ（投稿、カスタム投稿）
if (is_singular(array('works', 'voice', 'news', 'post'))) {
    $post_type = get_post_type();
    $ja_title = isset($post_type_labels[$post_type]) ? $post_type_labels[$post_type] : $post_type;
    $modifier = $post_type; // ←ここ
}
// アーカイブページ
elseif (is_post_type_archive(array('works', 'voice', 'news', 'post'))) {
    $post_type = get_query_var('post_type');
    if (is_array($post_type)) $post_type = $post_type[0];
    $ja_title = isset($post_type_labels[$post_type]) ? $post_type_labels[$post_type] : $post_type;
    $modifier = $post_type; // ←ここ
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

<!-- fv画像(アイキャッチ) -->
<?php if (has_post_thumbnail()): ?>
    <div class="c-sub-fv__image">
        <?php the_post_thumbnail('full'); ?>
    </div>
<?php endif; ?>

<!-- パンくずリスト -->
<div class="c-breadcrumbs__wrapper<?php echo $modifier ? ' c-breadcrumbs__wrapper--' . esc_attr($modifier) : ''; ?>">
    <?php get_template_part('template-parts/section', 'breadcrumbs'); ?>
</div>

<!-- テンプレートごとに違うデザイン対応のため、呼び出すテンプレートごとにmodifierを付与しています。 -->