<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="ja" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="ja" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="ja" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="ja" class="no-js">
<!--<![endif]-->
<head>
<meta charset="utf-8">

<title><?php bloginfo('name'); ?></title>
<?php if ( is_single() ) { // 単独記事ページの場合 ?>
    <?php if ($post->post_excerpt){ ?>
<meta name="description" content="<? echo $post->post_excerpt; ?>">
    <?php } else {
        $summary = strip_tags($post->post_content);
        $summary = str_replace("n", "", $summary);
        $summary = mb_substr($summary, 0, 80). "…"; ?>
<meta name="description" content="<?php echo $summary; ?>">
    <?php } ?>
<?php } else { // 単独記事ページ以外の場合 ?>
<meta name="description" content="<?php bloginfo('description'); ?>">
<? } ?>

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

<body id="page-home" <?php body_class(); ?>>
<div class="l-wrapper">

<div class="l-main">
  <div class="l-inner">
