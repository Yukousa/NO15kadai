<?php

/**
 * Functions
 */

/**
 * WordPress標準機能
 */
function my_setup()
{
	add_theme_support('post-thumbnails');
	add_theme_support('automatic-feed-links');
	add_theme_support('title-tag');
	add_theme_support(
		'html5',
		array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption')
	);
}
add_action('after_setup_theme', 'my_setup');

/**
 * CSSとJavaScriptの読み込み
 */
function my_script_init()
{
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', '//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js', "", "1.0.1");
	wp_enqueue_style('swiper', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css', array(), '1.0.1', 'all');
	wp_enqueue_style('my', get_template_directory_uri() . '/assets/css/styles.min.css', array(), '1.0.1', 'all');
	wp_enqueue_script('swiper', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array('jquery'), '1.0.1', true);
	wp_enqueue_script('my', get_template_directory_uri() . '/assets/js/script.min.js', array('jquery'), '1.0.1', true);
}
add_action('wp_enqueue_scripts', 'my_script_init');

/**
 * Google Fontsの読み込み
 */
function my_enqueue_google_fonts()
{
	wp_enqueue_style(
		'google-fonts',
		'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Inter:wght@100;300;400;500;700;900&family=Roboto:wght@100;300;400;500;700;900&display=swap',
		[],
		null
	);
}
add_action('wp_enqueue_scripts', 'my_enqueue_google_fonts');
add_action('admin_enqueue_scripts', 'my_enqueue_google_fonts');

/**
 * アーカイブタイトル書き換え
 */
function my_archive_title($title)
{
	if (is_home()) {
		$title = 'ブログ';
	} elseif (is_category()) {
		$title = single_cat_title('', false);
	} elseif (is_tag()) {
		$title = single_tag_title('', false);
	} elseif (is_post_type_archive()) {
		$title = post_type_archive_title('', false);
	} elseif (is_tax()) {
		$title = single_term_title('', false);
	} elseif (is_search()) {
		$title = '「' . esc_html(get_query_var('s')) . '」の検索結果';
	} elseif (is_author()) {
		$title = get_the_author();
	} elseif (is_date()) {
		$title = '';
		if (get_query_var('year')) {
			$title .= get_query_var('year') . '年';
		}
		if (get_query_var('monthnum')) {
			$title .= get_query_var('monthnum') . '月';
		}
		if (get_query_var('day')) {
			$title .= get_query_var('day') . '日';
		}
	}
	return $title;
}
add_filter('get_the_archive_title', 'my_archive_title');

/**
 * メニューの登録
 */
function my_menu_init()
{
	register_nav_menus(array(
		'global'  => 'ヘッダーメニュー',
		'utility' => 'ユーティリティメニュー',
		'drawer'  => 'ドロワーメニュー',
		'footer'  => 'フッターメニュー',
	));
}
add_action('init', 'my_menu_init');

/**
 * カスタム Walker クラス（BEM + 説明表示対応）
 */
class BEM_Walker_Nav_Menu extends Walker_Nav_Menu
{
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
	{
		$base_class = isset($args->bem_base_class) ? $args->bem_base_class : 'menu';

		$output .= '<li class="' . esc_attr($base_class . '__item') . '">';
		$output .= '<a href="' . esc_url($item->url) . '" class="' . esc_attr($base_class . '__link') . '">';

		// メインタイトル（例：日本語）
		$output .= '<span class="' . esc_attr($base_class . '__ja') . '">' . esc_html($item->title) . '</span>';

		// サブタイトル（例：説明欄の英語）
		if (!empty($item->description)) {
			$output .= '<span class="' . esc_attr($base_class . '__en') . '">' . esc_html($item->description) . '</span>';
		}

		$output .= '</a>';
	}
	function end_el(&$output, $item, $depth = 0, $args = array())
	{
		$output .= '</li>';
	}
}

/**
 *カスタム投稿で月別アーカイブを出力させる
 */
function custom_news_date_rewrite_rules($wp_rewrite)
{
	$rules = [];

	//news/2025/05/ → 月別アーカイブ
	$rules['news/([0-9]{4})/([0-9]{1,2})/?$'] = 'index.php?post_type=news&year=$matches[1]&monthnum=$matches[2]';

	// 必ず追加する
	$wp_rewrite->rules = $rules + $wp_rewrite->rules;
}
add_filter('generate_rewrite_rules', 'custom_news_date_rewrite_rules');

// パーマリンク更新後に反映する
function flush_rewrite_on_activation()
{
	flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'flush_rewrite_on_activation');


/**
 *投稿タイプごとにアーカイブページの表示件数を変更する(voice,works)
 */
function custom_archive_posts_per_page($query)
{
	if (!is_admin() && $query->is_main_query()) {

		// voice アーカイブでは 6件表示
		if (is_post_type_archive('voice')) {
			$query->set('posts_per_page', 6);
		}

		// works アーカイブでは 3件表示
		if (is_post_type_archive('works')) {
			$query->set('posts_per_page', 3);
		}
	}
}
add_action('pre_get_posts', 'custom_archive_posts_per_page');

/**
 * テーマ内のリソースに更新日時パラメータを付けてキャッシュを破棄する関数
 * CSS、JS、画像などで共通利用可能
 * 使用例: echo wp_optimize_uri('css/style.css');
 */
function wp_optimize_uri($relative_path)
{
	// テーマディレクトリのパスとURLを取得
	$theme_dir_path = get_template_directory();
	$theme_dir_uri  = get_template_directory_uri();

	// 子テーマを使っている場合は子テーマを優先
	if (is_child_theme()) {
		$theme_dir_path = get_stylesheet_directory();
		$theme_dir_uri  = get_stylesheet_directory_uri();
	}

	// 絶対パスとURLを組み立て
	$absolute_path = $theme_dir_path . '/' . ltrim($relative_path, '/');
	$resource_url  = $theme_dir_uri . '/' . ltrim($relative_path, '/');

	// ファイルが存在すれば更新日時をクエリとして付与
	if (file_exists($absolute_path)) {
		$resource_url .= '?v=' . filemtime($absolute_path);
	}

	return esc_url($resource_url);
}

/**
 * カスタム投稿タイプ 'news' 用のカスタムタクソノミー 'news_category' を登録する
 * URL構造を /news/カテゴリー名/ 形式にするため、rewriteのslugを 'news' に設定
 */
function register_news_category_taxonomy() {
	register_taxonomy('news_category', 'news', [
		'label' => 'newsカテゴリー',
		'hierarchical' => true,
		'public' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'rewrite' => [
			'slug' => 'news/category', // ← 投稿タイプnewsと競合しない形に
			'with_front' => false,
		],
	]);
	}
add_action('init', 'register_news_category_taxonomy');

/**
 * カスタム投稿タイプの登録
 */
function register_custom_post_types() {
	// news投稿タイプ
	register_post_type('news', [
		'labels' => [
			'name' => 'お知らせ',
			'singular_name' => 'お知らせ',
			'add_new' => '新規追加',
			'add_new_item' => '新しいお知らせを追加',
			'edit_item' => 'お知らせを編集',
			'new_item' => '新しいお知らせ',
			'view_item' => 'お知らせを表示',
			'search_items' => 'お知らせを検索',
			'not_found' => 'お知らせが見つかりませんでした',
			'not_found_in_trash' => 'ゴミ箱にお知らせが見つかりませんでした',
		],
		'public' => true,
		'has_archive' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-megaphone',
		'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
		'rewrite' => [
			'slug' => 'news',
			'with_front' => false,
		],
	]);

	// voice投稿タイプ
	register_post_type('voice', [
		'labels' => [
			'name' => 'お客様の声',
			'singular_name' => 'お客様の声',
			'add_new' => '新規追加',
			'add_new_item' => '新しいお客様の声を追加',
			'edit_item' => 'お客様の声を編集',
			'new_item' => '新しいお客様の声',
			'view_item' => 'お客様の声を表示',
			'search_items' => 'お客様の声を検索',
			'not_found' => 'お客様の声が見つかりませんでした',
			'not_found_in_trash' => 'ゴミ箱にお客様の声が見つかりませんでした',
		],
		'public' => true,
		'has_archive' => true,
		'menu_position' => 6,
		'menu_icon' => 'dashicons-format-quote',
		'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
		'rewrite' => [
			'slug' => 'voice',
			'with_front' => false,
		],
	]);

	// works投稿タイプ
	register_post_type('works', [
		'labels' => [
			'name' => '実績',
			'singular_name' => '実績',
			'add_new' => '新規追加',
			'add_new_item' => '新しい実績を追加',
			'edit_item' => '実績を編集',
			'new_item' => '新しい実績',
			'view_item' => '実績を表示',
			'search_items' => '実績を検索',
			'not_found' => '実績が見つかりませんでした',
			'not_found_in_trash' => 'ゴミ箱に実績が見つかりませんでした',
		],
		'public' => true,
		'has_archive' => true,
		'menu_position' => 7,
		'menu_icon' => 'dashicons-portfolio',
		'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
		'rewrite' => [
			'slug' => 'works',
			'with_front' => false,
		],
	]);
}
add_action('init', 'register_custom_post_types');

/**
 * カスタムタクソノミーの登録
 */
function register_custom_taxonomies() {
	// voiceカテゴリー
	register_taxonomy('voice_category', 'voice', [
		'label' => 'voiceカテゴリー',
		'hierarchical' => true,
		'public' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'rewrite' => [
			'slug' => 'voice/category',
			'with_front' => false,
		],
	]);

	// worksカテゴリー
	register_taxonomy('works_category', 'works', [
		'label' => 'worksカテゴリー',
		'hierarchical' => true,
		'public' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'rewrite' => [
			'slug' => 'works/category',
			'with_front' => false,
		],
	]);
}
add_action('init', 'register_custom_taxonomies');
