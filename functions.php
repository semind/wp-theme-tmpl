<?php
function register_stylesheet() {
    wp_register_style('style', get_stylesheet_directory_uri().'style.css');
}

function add_stylesheet() {
    register_stylesheet();
    wp_enqueue_style('style', '', array(), '1.0', false);
}

add_action('wp_enqueue_scripts', 'add_stylesheet');

/* ---------------------------------------
ウィジェットの有効化・設定
--------------------------------------- */
//ウィジェットを作成し、管理画面で設定できるようにします。
//また、各ウィジェットをくくるHTMLタグなども指定できます。
//表示にはテーマテンプレート内でdynamic_sidebar()に設定したidを指定します。
function theme_slug_widgets_init() {
register_sidebar(array(
	 'name' => 'サイドナビ',
	 'id' => 'sidenavi' ,
	 'before_widget' => '<div class="side_widget">',
	 'after_widget' => '</div>',
	 'before_title' => '<h2 class="side_widget_title">',
	 'after_title' => '</h2>'
));
register_sidebar(array(
	 'name' => 'フッター',
	 'id' => 'footerwidget' ,
	 'before_widget' => '<div class="footer_widget">',
	 'after_widget' => '</div>',
	 'before_title' => '<h2 class="footer_widget_title">',
	 'after_title' => '</h2>'
));
}
add_action( 'widgets_init', 'theme_slug_widgets_init' );

/* ---------------------------------------
メニューの設定
--------------------------------------- */
//'ロケーションID名' => '管理画面での表示名' となっています。
//ヘッダー用・フッター用の2箇所に設定するメニュー例です。管理画面＞外観＞メニューでメニューを作成後、メニューの位置で下記の設定が選択できるようになっています。
//表示にはテーマテンプレート内でwp_nav_menu()に設定したロケーションIDを指定します。
function menu_setup() {  
  register_nav_menus( array(
    'global' => 'グローバルメニュー',
    'footer' => 'フッターメニュー'
  ) );
}
add_action( 'after_setup_theme', 'menu_setup' );

/* ---------------------------------------
ショートコードの設定
--------------------------------------- */
//サイトアドレスURLを取得
//テスト環境と本番環境が異なる場合など画像URLをこちらで設定しておくと後で書き換え不要で便利
function shortcode_url() {
    return get_home_url();
}
add_shortcode('url', 'shortcode_url');

//wordpressアドレスURLを取得
//サイトアドレスと別の場合、こちらも設定しておくと便利
function shortcode_siteurl() {
    return site_url();
}
add_shortcode('site_url', 'shortcode_siteurl');

//テーマのURLを取得
//テーマ内にある画像の出力等したい場合、都度フルパスを書く必要がなくなるため便利
function shortcode_templateurl() {
    return get_stylesheet_directory_uri();
}
add_shortcode('thema_url', 'shortcode_templateurl');

/* ---------------------------------------
管理画面内の設定
--------------------------------------- */
//プロフィール欄HTMLタグ有効
remove_filter('pre_user_description', 'wp_filter_kses');

// カテゴリ説明文HTML有効
remove_filter( 'pre_term_description', 'wp_filter_kses' );

//カテゴリ説明欄HTMLタグ有効
remove_filter( 'pre_term_name', 'wp_filter_kses' );