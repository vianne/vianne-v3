<?php get_header("home"); ?>

<h1 class="b-logo-home"><img src="assets/img/logo.png" alt=""></h1>

<?php wp_nav_menu( array('menu_id' => 'nav' )); ?>

<section>
  <h2 class="ttl-lv02">Recent</h2>
  <dl class="list-hometopics">
    <dt>2014.03.12</dt>
    <dd><a href="">サイトをリニューアルしました。</a></dd>
  </dl>
</section>

<section>
  <h2 class="ttl-lv02">Event</h2>
  <dl class="list-hometopics">
    <dt>2014.05.11</dt>
    <dd><a href="" target="_blank">博麗神社例大祭11</a></dd>
  </dl>
</section>

<?php get_footer(); ?>