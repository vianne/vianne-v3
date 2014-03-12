<?php
$args = array(
     'post_type' => 'blog', /* 投稿タイプを指定 */
     'paged' => $paged
); ?>
<?php query_posts( $args ); ?>
<aside class="l-aside">
  <div class="blk-blogaside">
    <h2 class="ttl-lv02">Recent</h2>
    <dl class="blk-blogaside-datelist">
      <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
      <dt><?php the_time("Y.m.d") ?></dt>
      <dd><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></dd>
      <?php endwhile; ?>
      <?php else : ?>
      <?php endif; ?>
    </dl>
  </div>
  <div class="blk-blogaside">
    <h2 class="ttl-lv02">Category</h2>
    <ul class="blk-blogaside-list">
      <?php wp_list_categories('title_li=&taxonomy=blogcategory'); ?>
    </ul>
  </div>
  <div class="blk-blogaside">
    <h2 class="ttl-lv02">Archive</h2>
    <ul class="blk-blogaside-list">
      <?php wp_get_archives('type=monthly&post_type=blog'); ?>
    </ul>
  </div>
</aside>