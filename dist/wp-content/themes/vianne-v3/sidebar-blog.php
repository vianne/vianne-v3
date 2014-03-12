<aside class="l-aside">
  <div class="blk-blogaside">
    <h2 class="ttl-lv02">Recent</h2>
    <dl class="blk-blogaside-datelist">
      <?php query_posts('showposts=5'); ?>
        <?php while (have_posts()) : the_post(); ?>
        <dt><?php the_time("Y.m.d") ?></dt>
        <dd><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></dd>
        <?php endwhile;?>
      </ul>
    </dl>
  </div>
  <div class="blk-blogaside">
    <h2 class="ttl-lv02">Category</h2>
    <ul class="blk-blogaside-list">
      <?php wp_list_categories('title_li='); ?>
    </ul>
  </div>
  <div class="blk-blogaside">
    <h2 class="ttl-lv02">Archive</h2>
    <ul class="blk-blogaside-list"><?php wp_get_archives('title_li=&type=monthly&limit=12'); ?></ul>
  </div>
</aside>