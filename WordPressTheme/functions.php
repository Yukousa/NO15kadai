<?php
/**
 * ---------------------------------------------
 * WordPress テーマの functions.php 基本設定
 * ---------------------------------------------
 */

/**
 * WordPressの標準機能を有効化
 */
function my_setup() {
	add_theme_support('post-thumbnails'); // アイキャッチ画像
	add_theme_support('automatic-feed-links'); // フィードリンク自動生成
	add_theme_support('title-tag'); // <title>を自動出力
	add_theme_support('html5', [ // HTML5マークアップ対応
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	]);
}
add_action('after_setup_theme', 'my_setup');

/**
 * CSSとJavaScriptファイルの読み込み
 */
function my_script_init() {
	wp_deregister_script('jquery'); // デフォルトのjQueryを解除
	wp_enqueue_script('jquery', '//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js', "", "1.0.1");
	wp_enqueue_style('swiper', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css');
	wp_enqueue_style('my', get_template_directory_uri() . '/assets/css/styles.min.css');
	wp_enqueue_script('swiper', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', ['jquery'], '1.0.1', true);
	wp_enqueue_script('my', get_template_directory_uri() . '/assets/js/script.min.js', ['jquery'], '1.0.1', true);
}
add_action('wp_enqueue_scripts', 'my_script_init');

/**
 * Google Fonts の読み込み（管理画面とフロント両方）
 */
function my_enqueue_google_fonts() {
	wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Inter:wght@100;300;400;500;700;900&family=Roboto:wght@100;300;400;500;700;900&display=swap');
}
add_action('wp_enqueue_scripts', 'my_enqueue_google_fonts');
add_action('admin_enqueue_scripts', 'my_enqueue_google_fonts');

/**
 * アーカイブタイトルのカスタマイズ
 */
function my_archive_title($title) {
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
		if (get_query_var('year')) $title .= get_query_var('year') . '年';
		if (get_query_var('monthnum')) $title .= get_query_var('monthnum') . '月';
		if (get_query_var('day')) $title .= get_query_var('day') . '日';
	}
	return $title;
}
add_filter('get_the_archive_title', 'my_archive_title');

/**
 * ナビゲーションメニューの登録
 */
function my_menu_init() {
	register_nav_menus([
		'global'  => 'ヘッダーメニュー',
		'utility' => 'ユーティリティメニュー',
		'drawer'  => 'ドロワーメニュー',
		'footer'  => 'フッターメニュー',
	]);
}
add_action('init', 'my_menu_init');

/**
 * BEM形式のカスタムWalkerクラス（説明対応）
 */
class BEM_Walker_Nav_Menu extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth = 0, $args = [], $id = 0) {
		$base_class = $args->bem_base_class ?? 'menu';
		$output .= '<li class="' . esc_attr($base_class . '__item') . '">';
		$output .= '<a href="' . esc_url($item->url) . '" class="' . esc_attr($base_class . '__link') . '">';
		$output .= '<span class="' . esc_attr($base_class . '__ja') . '">' . esc_html($item->title) . '</span>';
		if (!empty($item->description)) {
			$output .= '<span class="' . esc_attr($base_class . '__en') . '">' . esc_html($item->description) . '</span>';
		}
		$output .= '</a>';
	}
	function end_el(&$output, $item, $depth = 0, $args = []) {
		$output .= '</li>';
	}
}

/**
 * カスタム投稿 news の月別アーカイブURL対応
 * 例： /news/2025/05/
 */
function custom_news_date_rewrite_rules($wp_rewrite) {
	$rules = [
		'news/([0-9]{4})/([0-9]{1,2})/?$' => 'index.php?post_type=news&year=$matches[1]&monthnum=$matches[2]',
	];
	$wp_rewrite->rules = $rules + $wp_rewrite->rules;
}
add_filter('generate_rewrite_rules', 'custom_news_date_rewrite_rules');

// パーマリンク設定変更後のルール更新
function flush_rewrite_on_activation() {
	flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'flush_rewrite_on_activation');

/**
 * カスタム投稿アーカイブの表示件数変更（voice, works）
 */
function custom_archive_posts_per_page($query) {
	if (!is_admin() && $query->is_main_query()) {
		if (is_post_type_archive('voice')) $query->set('posts_per_page', 6);
		if (is_post_type_archive('works')) $query->set('posts_per_page', 3);
	}
}
add_action('pre_get_posts', 'custom_archive_posts_per_page');

/**
 * ファイルの更新日時を付与してキャッシュクリア
 * 使用例: echo wp_optimize_uri('css/style.css');
 */
function wp_optimize_uri($relative_path) {
	$theme_dir_path = get_template_directory();
	$theme_dir_uri  = get_template_directory_uri();
	if (is_child_theme()) {
		$theme_dir_path = get_stylesheet_directory();
		$theme_dir_uri  = get_stylesheet_directory_uri();
	}
	$absolute_path = $theme_dir_path . '/' . ltrim($relative_path, '/');
	$resource_url  = $theme_dir_uri . '/' . ltrim($relative_path, '/');
	if (file_exists($absolute_path)) {
		$resource_url .= '?v=' . filemtime($absolute_path);
	}
	return esc_url($resource_url);
}

/**
 * news投稿用 カテゴリータクソノミーを作成
 * /news/category/構造のため、slug を 'news/category' に設定
 */
function register_news_category_taxonomy() {
	register_taxonomy('news_category', 'news', [
		'label' => 'newsカテゴリー',
		'hierarchical' => true,
		'public' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'rewrite' => [
			'slug' => 'news/category',
			'with_front' => false,
		],
	]);
}
add_action('init', 'register_news_category_taxonomy');

/**
 * カスタム投稿タイプの登録（news, voice, works）
 */
function register_custom_post_types() {
	// 各 register_post_type() 呼び出し（省略なしで含まれているのでここでは略）
	// ...
}
add_action('init', 'register_custom_post_types');

/**
 * voice, works に対応するカスタムタクソノミーの登録
 */
function register_custom_taxonomies() {
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

/**
 * ショートコード [image_path]
 * 画像出力用：パス省略して使える
 */
add_shortcode('image_path', function ($atts) {
	$atts = shortcode_atts([
		'src'    => '',
		'alt'    => '',
		'width'  => '',
		'height' => '',
	], $atts);
	$theme_url = get_template_directory_uri();
	return sprintf(
		'<img src="%s" alt="%s" width="%s" height="%s" loading="lazy">',
		esc_url($theme_url . $atts['src']),
		esc_attr($atts['alt']),
		esc_attr($atts['width']),
		esc_attr($atts['height'])
	);
});

/**
 * ショートコードでテンプレートパーツを読み込む
 */
add_shortcode('include_profile_content', function () {
	ob_start();
	get_template_part('template-parts/sections/profile-content');
	return ob_get_clean();
});
add_shortcode('include_faq_list', function () {
	ob_start();
	get_template_part('template-parts/sections/faq-list');
	return ob_get_clean();
});
add_shortcode('theme_url', function () {
	return get_template_directory_uri();
});

/**
 * 各種フロントセクションのショートコード化
 */
add_shortcode('include_front-news-list', function () {
	ob_start();
	get_template_part('template-parts/sections/front-news-list');
	return ob_get_clean();
});
add_shortcode('include_front-voice-list', function () {
	ob_start();
	get_template_part('template-parts/sections/front-voice-list');
	return ob_get_clean();
});
add_shortcode('include_front-works-swiper', function () {
	ob_start();
	get_template_part('template-parts/sections/front-works-swiper');
	return ob_get_clean();
});
add_shortcode('include_front-message', function () {
	ob_start();
	get_template_part('template-parts/sections/front-message');
	return ob_get_clean();
});

/**
 * 固定画像用のショートコード（レスポンシブ）
 */
add_shortcode('image_front_profile', function () {
	ob_start();
	?>
	<picture>
		<source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/image11.png" media="(max-width: 768px)">
		<img src="<?php echo get_template_directory_uri(); ?>/assets/images/image26.png" alt="イメージ画像" width="1240" height="343" loading="lazy">
	</picture>
	<?php
	return ob_get_clean();
});

/**
 * front-page 固定ページだけ wpautop を無効化（<p><br>自動挿入防止）
 */
function disable_wpautop_for_specific_page($content) {
	if (is_page('front-page')) {
		remove_filter('the_content', 'wpautop');
	}
	return $content;
}
add_filter('the_content', 'disable_wpautop_for_specific_page', 9);
