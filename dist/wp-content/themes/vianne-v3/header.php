<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="ja" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="ja" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="ja" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="ja" class="no-js">
<!--<![endif]-->
<head>
<meta charset="utf-8">

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
<meta name="description" content="ディスクリプション">
<?php if ( is_home() ) {
    $canonical_url=get_bloginfo('url')."/";
}
else if (is_category())
{
    $canonical_url=get_category_link(get_query_var('cat'));
}
else if (is_page()||is_single())
{
    $canonical_url=get_permalink();
}
if ( $paged >= 2 || $page >= 2)
{
$canonical_url=$canonical_url.'page/'.max( $paged, $page ).'/';
}
?>
<link rel="canonical" href="<?php echo $canonical_url; ?>">
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSSフィード" href="<?php bloginfo('rss2_url'); ?>">

<!-- ここからOGP -->
<meta property="og:type" content="blog">
<?php
if (is_single()){//単一記事ページの場合
     if(have_posts()): while(have_posts()): the_post();
          echo '<meta property="og:description" content="'.mb_substr(get_the_excerpt(), 0, 100).'">';echo "\n";//抜粋を表示
     endwhile; endif;
     echo '<meta property="og:title" content="'; the_title(); echo '">';echo "\n";//単一記事タイトルを表示
     echo '<meta property="og:url" content="'; the_permalink(); echo '">';echo "\n";//単一記事URLを表示
} else {//単一記事ページページ以外の場合（アーカイブページやホームなど）
     echo '<meta property="og:description" content="'; bloginfo('description'); echo '">';echo "\n";//「一般設定」管理画面で指定したブログの説明文を表示
     echo '<meta property="og:title" content="'; bloginfo('name'); echo '">';echo "\n";//「一般設定」管理画面で指定したブログのタイトルを表示
     echo '<meta property="og:url" content="'; bloginfo('url'); echo '">';echo "\n";//「一般設定」管理画面で指定したブログのURLを表示
}
?>
<meta property="og:site_name" content="<?php bloginfo('name'); ?>">
<?php
$str = $post->post_content;
$searchPattern = '/<img.*?src=(["\'])(.+?)\1.*?>/i';//投稿にイメージがあるか調べる
if (is_single()){//単一記事ページの場合
if (has_post_thumbnail()){//投稿にサムネイルがある場合の処理
     $image_id = get_post_thumbnail_id();
     $image = wp_get_attachment_image_src( $image_id, 'full');
     echo '<meta property="og:image" content="'.$image[0].'">';echo "\n";
} else if ( preg_match( $searchPattern, $str, $imgurl ) && !is_archive()) {//投稿にサムネイルは無いが画像がある場合の処理
     echo '<meta property="og:image" content="'.$imgurl[2].'">';echo "\n";
} else {//投稿にサムネイルも画像も無い場合の処理
     echo '<meta property="og:image" content="http://vianne.nu/assets/img/p-ogp.png">';echo "\n";
}
} else {//単一記事ページページ以外の場合（アーカイブページやホームなど）
     echo '<meta property="og:image" content="http://vianne.nu/assets/img/p-ogp.png">';echo "\n";
}
?>
<!-- ここまでOGP -->

<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">
<script type="text/javascript" charset="utf-8" src="/assets/js/common.min.js"></script>
</head>

<body <?php body_class(); ?>>
<div class="l-wrapper">

<header class="l-header">
  <div class="l-inner cf">
    <p class="b-logo"><a href="/"><img src="/assets/img/logo.png" alt=""></a></p>
    <ul class="nav-main">
      <li><a href="/about/">About</a></li>
      <li><a href="/gallery/">Gallery</a></li>
      <li><a href="/works/">Works</a></li>
      <li><a href="/blog/">Blog</a></li>
      <li><a href="/contact/">Contact</a></li>
    </ul>
    <dl class="blk-headerinfo">
      <dt>Event</dt>
      <?php
        $headerInfoArgs = array(
          'posts_per_page' => 3,
          'post_type' => 'event'
        ); ?>
      <?php $myposts = get_posts($headerInfoArgs); ?>
      <?php foreach($myposts as $post) : setup_postdata($post); ?>
      <dd><?php the_content(); ?></dd>
      <?php endforeach; ?>
    </dl>
  </div>
</header>

<div class="l-main">
  <div class="l-inner">
