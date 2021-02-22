<?php get_header(); ?>
<section class="section">
  <div class="container">
    <h1 class="header-top-text">Hakkımda</h1>
    <p class="header-bottom-text">Ben kimim ve neler yaparım gibi bir çok sorunun yanıtı</p>
    <?php while (have_posts()) : the_post(); ?>
      <div class="row">
        <div class="col-12">
          <?php get_template_part('template-parts/contents/content', 'page'); ?>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</section>
<?php get_footer(); ?>
