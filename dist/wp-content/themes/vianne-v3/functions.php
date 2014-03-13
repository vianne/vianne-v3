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


?>
