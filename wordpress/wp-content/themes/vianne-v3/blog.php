<?php
/* Template Name: Blog */
get_header(); ?>
<!-- blog.php -->

<div class="l-content">

  <h1 class="ttl-lv01">Blog</h1>

<?php query_posts('posts_per_page=5'); ?>
<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
  <div class="entry l-section">
    <header class="entry-header">
      <span class="entry-date"><?php the_time("Y.m.j") ?></span><span class="entry-cat"><?php the_category(); ?></span>
      <h2 class="entry-ttl"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
    </header>
    <section class="entry-body l-section">
      <?php the_content(); ?>
    </section>
  </div>
  <?php endwhile; ?>
<?php else : ?>
  <div class="entry l-section">
    <h2 class="entry-ttl">記事がありません</h2>
    <p>表示する記事がありませんでした</p>
  </div>
<?php endif; ?>

<div class="nav-below">
  <span class="nav-previous"><?php previous_post_link('%link', '古い記事へ'); ?></span>
  <span class="nav-next"><?php next_post_link('%link', '新しい記事へ'); ?></span>
</div><!-- /.nav-below -->


</div><!-- /l-content -->

<?php get_sidebar("blog"); ?>
<?php get_footer(); ?>