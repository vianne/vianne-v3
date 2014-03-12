<?php get_header(); ?>

  <h1 class="ttl-lv01">Gallery</h1>

<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
<div class="entry l-section">
  <header class="entry-header">
    <span class="entry-date"><?php echo (get_post_meta($post->ID, 'pub-year', true)); ?></span>
    <h2 class="entry-ttl"><a href=""><?php the_title(); ?></a></h2>
  </header>
  <section class="entry-body">
    <?php the_content(); ?>
  </section>
</div>
  <?php endwhile; ?>
<?php else : ?>
<div class="entry l-section">
  <h3 class="ttl-lv02">Not Found.</h3>
  <p>表示する記事はありませんでした。</p>
</div>
<?php endif; ?>

<section class="l-section">
  <h2 class="ttl-lv02">Other</h2>
  <ul class="list-thumb-s cf">
  <?php
  $loop = new WP_Query( array( 'post_type' => 'gallery', 'posts_per_page' => 12, 'orderby' =>rand ) );
  while ( $loop->have_posts() ) : $loop->the_post();
  ?>
    <li>
      <a href="<?php the_permalink() ?>">
        <?php echo get_the_post_thumbnail( $tax_post->ID, array(202,122)); ?>
        <div class="list-thumb-caption">
          <div class="list-thumb-caption-wrapper">
            <strong class="list-thumb-ttl"><?php the_title(); ?></strong>
            <small class="list-thumb-year"><?php echo (get_post_meta($post->ID, 'pub-year', true)); ?></small>
          </div>
        </div>
      </a>
    </li>
  <?php endwhile;wp_reset_query(); ?>
  </ul>
</section>

<?php get_footer(); ?>