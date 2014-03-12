<?php get_header(); ?>

<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>

  <?php if(has_post_thumbnail()) { echo the_post_thumbnail(); } ?>
  <?php the_content(); ?>

  <?php endwhile; ?>
  <?php else : ?>

    <h2 class="title">記事が見つかりませんでした。</h2>
    <p>検索で見つかるかもしれません。</p><br />
    <?php get_search_form(); ?>

  <?php endif; ?>

<?php get_footer(); ?>