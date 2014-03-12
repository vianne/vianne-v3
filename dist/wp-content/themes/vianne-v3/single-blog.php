<?php
/* Template Name: Blog */
get_header(); ?>

<div class="l-content">

  <h1 class="ttl-lv01">Blog</h1>

<?php
$args = array(
     'post_type' => 'blog', /* 投稿タイプを指定 */
     'paged' => $paged,
); ?>
<?php query_posts( $args ); ?>

<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post();
  /* ループ開始 */ ?>
<div class="entry l-section">
  <header class="entry-header">
    <span class="entry-date"><?php the_time("Y.m.j") ?></span><span class="entry-cat"><a href="">制作日記</a></span>
    <h2 class="entry-ttl"><a href=""><?php the_title(); ?></a></h2>
  </header>
  <section class="entry-body">
    <?php the_content(); ?>
  </section>
  <footer class="entry-footer">
    <div class="entry-comment">
      <h3 class="ttl-lv02 entry-comment-ttl">Comment</h3>
      <!-- <dl>
        <dt class="entry-comment-name"><a href="">お名前</a></dt>
        <dd class="entry-comment-txt">コメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメント</dd>
        <dt class="entry-comment-name"><a href="">お名前</a></dt>
        <dd class="entry-comment-txt">コメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメント</dd>
        <dt class="entry-comment-name"><a href="">お名前</a></dt>
        <dd class="entry-comment-txt">コメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメントコメント</dd>
      </dl> -->
    </div><!-- /entry-comment -->
    <div class="entry-reaction">
      <h3 class="ttl-lv02 entry-comment-ttl">Leave a Comment</h3>
      <!-- <form action="">
        <dl>
          <dt>お名前</dt>
          <dd><input type="text" name="" id=""></dd>
          <dt>コメント</dt>
          <dd><textarea name="" id="" cols="30" rows="10"></textarea></dd>
        </dl>
        <p><button type="submit" class="entry-reaction-submit">コメントを送信</button></p>
      </form> -->
      <?php comments_template( '', true ); ?>
    </div>
  </footer>
</div>
  <?php endwhile; ?>
<?php else : ?>
    <div class="post">
    <h3>記事がありません</h3>
    <p>表示する記事はありませんでした。</p>
    </div>
<?php endif; ?>

</div><!-- /l-content -->

<?php get_sidebar("blog"); ?>
<?php get_footer(); ?>