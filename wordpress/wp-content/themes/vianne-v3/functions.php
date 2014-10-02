<?php
// ウィジェットエリア
// サイドバーのウィジェット
register_sidebar( array(
     'name' => __( 'Side Widget' ),
     'id' => 'side-widget',
     'before_widget' => '<li class="widget-container">',
     'after_widget' => '</li>',
     'before_title' => '<h3>',
     'after_title' => '</h3>',
) );

// フッターエリアのウィジェット
register_sidebar( array(
     'name' => __( 'Footer Widget' ),
     'id' => 'footer-widget',
     'before_widget' => '<div class="widget-area"><ul><li class="widget-container">',
     'after_widget' => '</li></ul></div>',
     'before_title' => '<h3>',
     'after_title' => '</h3>',
) );

// アイキャッチ画像
register_post_type( 'gallery', array(
    'supports' => array('title'),
));

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size(280, 170, true );

// カスタムナビゲーションメニュー
add_theme_support('menus');

// 「コメントを残す」の文言を変更
add_filter( 'comment_form_defaults', 'my_title_reply');
function my_title_reply( $defaults){
    $defaults['title_reply'] = 'Leave a Comment';
    return $defaults;
}

// コメントの名前とメールアドレスの必須を解除
function preprocess_comment_author( $commentdata ) {
    if ("" === trim( $commentdata['comment_author'] ))
    wp_die('名前を入力して下さい。');
    return $commentdata;
}
add_filter('preprocess_comment', 'preprocess_comment_author', 2, 1);

// Canonical設定用
remove_action('wp_head', 'rel_canonical');

// カスタム投稿タイプを作成
function event_custom_post_type(){
  $labels = array(
    'name' => _x('イベント情報', 'post type general name'),
    'singular_name' => _x('イベント情報', 'post type singular name'),
    'add_new' => _x('イベント情報を新規追加', 'event'),
    'add_new_item' => __('新規項目追加'),
    'edit_item' => __('項目を編集'),
    'new_item' => __('新規項目'),
    'view_item' => __('項目を表示'),
    'search_items' => __('項目検索'),
    'not_found' =>  __('記事が見つかりません'),
    'not_found_in_trash' => __('ゴミ箱に記事はありません'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title','editor')
  );
  register_post_type('event',$args);
}
add_action('init', 'event_custom_post_type');
function gallery_custom_post_type(){
  $labels = array(
    'name' => _x('ギャラリー', 'post type general name'),
    'singular_name' => _x('ギャラリー', 'post type singular name'),
    'add_new' => _x('ギャラリーを新規追加', 'gallery'),
    'add_new_item' => __('新規項目追加'),
    'edit_item' => __('項目を編集'),
    'new_item' => __('新規項目'),
    'view_item' => __('項目を表示'),
    'search_items' => __('項目検索'),
    'not_found' =>  __('記事が見つかりません'),
    'not_found_in_trash' => __('ゴミ箱に記事はありません'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title','editor')
  );
  register_post_type('gallery',$args);
}
add_action('init', 'gallery_custom_post_type');

?>
