<div class="col-other-projects">
  <div class="row mb-3 mb-md-4">
    <div class="col">
      <h4 class="mb-0">Diğer Projeler</h4>
    </div>
    <div class="col-auto">
      <a href="/projeler" class="btn btn-sm btn-primary rounded-pill d-none d-md-inline">
        Tümü
      </a>
    </div>
  </div>
  <?php $project_categories = get_the_terms(get_the_ID(), 'proje-kategori'); ?>
  <?php if ($project_categories): ?>
    <?php
      $project_first_category_id = $project_categories[0]->term_id;
      $other_projects_args = array(
        'post_type' => 'proje',
        'tax_query' => array(
          array(
            'taxonomy'  => 'proje-kategori',
            'field'     => 'term_id',
            'terms'     => $project_first_category_id
          )
        ),
        'post__not_in' => array(get_the_ID()),
        'posts_per_page' => 6
      );
      $other_projects_query = new WP_Query($other_projects_args);
    ?>
    <?php if ($other_projects_query->have_posts()): ?>
      <div class="carousel-wrap">
        <div class="owl-carousel">
          <?php while ($other_projects_query->have_posts()): $other_projects_query->the_post(); ?>
            <div class="item">
              <?php get_template_part('template-parts/cards/card', 'article_mini'); ?>
            </div>
          <?php endwhile; ?>
        </div>
      </div>
    <?php else: ?>
      <div class="row">
        <div class="col-12">
          <?php get_template_part('template-parts/alerts/other_projects', 'none'); ?>
        </div>
      </div>
    <?php endif; ?>
    <?php wp_reset_query(); ?>
  <?php else: ?>
    <?php get_template_part('template-parts/alerts/other_projects', 'none'); ?>
  <?php endif; ?>
</div>
