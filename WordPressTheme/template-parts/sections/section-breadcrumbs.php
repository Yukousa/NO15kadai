<?php
// 表示条件：フロントでは非表示にしたい場合は return;
if ( is_front_page() ) {
  return;
}

// 固定ページ → ラベル対応表
$fixed_map = [
  'message' => 'MESSAGE',
  'service' => 'SERVICE',
  'profile' => 'PROFILE',
  // contact系はすべて CONTACT に統一
  'contact' => 'CONTACT',
  'confirm' => 'CONTACT',
  'thanks'  => 'CONTACT',
];

$label = null;

// 1) 固定ページ（スラッグで判定）
if ( is_page() ) {
  $slug = get_post_field( 'post_name', get_queried_object_id() );
  if ( isset($fixed_map[$slug]) ) {
    $label = $fixed_map[$slug];
  }
}

// 2) アーカイブ：WORKS / VOICE / NEWS（一覧・月別・カテゴリ別 すべて NEWS 表示）
if ( !$label ) {
  if ( is_post_type_archive('works') ) {
    $label = 'WORKS';
  } elseif ( is_post_type_archive('voice') ) {
    $label = 'VOICE';
  } elseif ( is_post_type_archive('news') ) {
    $label = 'NEWS';
  }
}

// 3) NEWS の派生（CPT の single / taxonomy / 月別などもすべて NEWS）
if ( !$label ) {
  if ( is_singular('news') ) {
    $label = 'NEWS';
  } elseif ( is_tax('news_category') ) {
    $label = 'NEWS';
  } elseif ( is_date() && ( get_query_var('post_type') === 'news' ) ) {
    // 月別アーカイブを news 用に組んでいる場合
    $label = 'NEWS';
  } elseif ( is_home() ) {
    // 万一、通常投稿を NEWS として使う構成にも対応
    $label = 'NEWS';
  }
}

// ラベルが決まらなければ出力しない（必要ならデフォルト文言を設定）
if ( !$label ) {
  return;
}
?>
<nav class="p-breadcrumbs__immer c-breadcrumbs" aria-label="breadcrumb">
  <ul class="p-breadcrumbs__list">
    <li class="p-breadcrumbs__item">
      <a href="<?php echo esc_url( home_url('/') ); ?>" class="p-breadcrumbs__link">TOP</a>
    </li>
    <li class="p-breadcrumbs__item" aria-current="page"><?php echo esc_html( $label ); ?></li>
  </ul>
</nav>
