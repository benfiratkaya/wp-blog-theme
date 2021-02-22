<?php get_header(); ?>
<section class="section">
  <div class="container">
    <?php while (have_posts()) : the_post(); ?>
      <h1 class="header-top-text"><?php the_title(); ?></h1>
      <div class="row">
        <div class="col-12">
          <?php get_template_part('template-parts/contents/content', 'page');  ?>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</section>
<?php get_footer(); ?>
