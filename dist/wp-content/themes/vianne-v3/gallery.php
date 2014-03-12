<?php
/* Template Name: Gallery */
get_header(); ?>

  <h1 class="ttl-lv01">Gallery</h1>

<?php
$args = array(
     'post_type' => 'gallery', /* 投稿タイプを指定 */
     'paged' => $paged,
); ?>
<?php query_posts( $args ); ?>
<ul class="list-thumb">
  <?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
  <li>
    <span class="list-thumb-num"><?php echo (get_post_meta($post->ID, 'number', true)); ?></span>
    <a href="<?php the_permalink() ?>">
      <?php echo get_the_post_thumbnail( $tax_post->ID, array(280,170)); ?>
      <div class="list-thumb-caption">
        <div class="list-thumb-caption-wrapper">
          <strong class="list-thumb-ttl"><?php the_title(); ?></strong>
          <small class="list-thumb-year"><?php echo (get_post_meta($post->ID, 'pub-year', true)); ?></small>
        </div>
      </div>
    </a>
  </li>
  <?php endwhile; ?>
  <?php else : ?>
  <?php endif; ?>
</ul>

</div><!-- /l-content -->

<?php get_footer(); ?>