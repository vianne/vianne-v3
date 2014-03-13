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