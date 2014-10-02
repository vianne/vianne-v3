<?php get_header(); ?>

<div class="l-content">

  <h1 class="ttl-lv01">Blog</h1>

<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
<div class="entry l-section">
  <header class="entry-header">
    <span class="entry-date"><?php the_time("Y.m.j") ?></span><span class="entry-cat"><?php the_category(); ?></span>
    <h2 class="entry-ttl"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
  </header>
  <section class="entry-body">
    <?php the_content(); ?>
  </section>
  <footer class="entry-footer">
    <ul class="entry-share">
      <li class="fb"><div class="fb-like" data-href="<?php the_permalink() ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div></li>
      <li class="tw"><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink() ?>">Tweet</a></li>
      <li class="hb"><a href="http://b.hatena.ne.jp/entry/<?php the_permalink() ?>" class="hatena-bookmark-button" data-hatena-bookmark-layout="simple-balloon" title="このエントリーをはてなブックマークに追加"><img src="http://b.st-hatena.com/images/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a></li>
    </ul>
    <?php comments_template( '', true ); ?>
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