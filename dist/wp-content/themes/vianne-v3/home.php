<?php get_header("home"); ?>

<h1 class="b-logo-home"><img src="assets/img/logo.png" alt=""></h1>

<ul class="nav-main">
  <li><a href="/about/">About</a></li>
  <li><a href="/gallery/">Gallery</a></li>
  <li><a href="/works/">Works</a></li>
  <li><a href="/blog/">Blog</a></li>
  <li><a href="/contact/">Contact</a></li>
</ul>

<section>
  <h2 class="ttl-lv02">Recent</h2>
  <dl class="list-hometopics cf">
    <!-- <dt>2014.03.12</dt>
    <dd><a href="">サイトをリニューアルしました。</a></dd> -->
    <?php
      $args = array(
        'posts_per_page' => 3
      );
      query_posts( $args );
      if (have_posts()) : while (have_posts()) : the_post(); ?>
    <dt><?php the_time("Y.m.d") ?></dt>
    <dd><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></dd>
    <?php
    endwhile;
    endif;
    ?>
  </dl>
</section>

<section>
  <h2 class="ttl-lv02">Event</h2>
  <ul class="list-hometopics">
    <!-- <dt>2014.05.11</dt>
    <dd><a href="" target="_blank">博麗神社例大祭11</a></dd> -->
    <?php
    $args = array(
      'posts_per_page' => 3,
      'post_type' => 'event'
    );
    query_posts( $args );
    if (have_posts()) :
    while (have_posts()) : the_post();
    ?>
    <li><?php the_content(); ?></li>
    <?php
    endwhile;
    endif;
    ?>
  </ul>
</section>

<?php get_footer(); ?>