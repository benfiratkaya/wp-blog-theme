<?php get_header(); ?>
<section class="section">
  <div class="container">
    <h1 class="header-top-text"><?php echo single_term_title(); ?></h1>
    <p class="header-bottom-text"><strong><?php echo single_term_title(); ?></strong> kategorisine ait profosyenel proje çalışmalarım</p>
    <?php if (get_queried_object()): ?>
      <?php
        $project_categories_args = array(
          'post_type' => 'proje',
          'tax_query' => array(
            array(
              'taxonomy'  => 'proje-kategori',
              'field'     => 'term_id',
              'terms'     => get_queried_object()->term_id
            )
          ),
          'posts_per_page' => -1
        );
        $project_categories_query = new WP_Query($project_categories_args);
      ?>
      <?php if ($project_categories_query->have_posts()) : ?>
        <div class="row col-projects">
          <?php while ($project_categories_query->have_posts()): $project_categories_query->the_post(); ?>
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
    <?php endif; ?>
  </div>
</section>
<?php get_footer(); ?>
