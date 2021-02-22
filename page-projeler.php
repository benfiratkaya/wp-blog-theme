<?php get_header(); ?>
<section class="section">
  <div class="container">
    <h1 class="header-top-text">Projelerim</h1>
    <p class="header-bottom-text">Yapmış olduğum profosyenel proje çalışmalarım</p>
    <?php
      $projects_args = array(
        'post_type' => 'proje',
        'posts_per_page' => -1
      );
      $projects_query = new WP_Query($projects_args);
    ?>
    <?php if ($projects_query->have_posts()) : ?>
      <div class="row col-projects">
        <?php while ($projects_query->have_posts()): $projects_query->the_post(); ?>
          <div class="col-md-4 mb-4">
            <?php get_template_part('template-parts/cards/card', 'project_mini'); ?>
          </div>
        <?php endwhile; ?>
      </div>
    <?php else : ?>
      <div class="row">
        <div class="col-12">
          <?php get_template_part('template-parts/alerts/projects', 'none'); ?>
        </div>
      </div>
    <?php endif; ?>
    <?php wp_reset_query(); ?>
  </div>
</section>
<?php get_footer(); ?>
