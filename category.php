<?php get_header(); ?>
<section class="section">
  <div class="container">
    <h1 class="header-top-text"><?php echo single_cat_title(); ?></h1>
    <p class="header-bottom-text"><strong><?php echo single_cat_title(); ?></strong> kategorisine ait yazılar</p>
    <?php if (have_posts()) : ?>
      <div class="row">
        <?php while (have_posts()) : the_post(); ?>
          <div class="col-md-4 mb-4">
            <?php get_template_part('template-parts/cards/card', 'article'); ?>
          </div>
        <?php endwhile; ?>
      </div>
      <div class="row mt-4">
        <div class="col-12">
          <?php get_template_part('template-parts/paginations/pagination', 'articles'); ?>
        </div>
      </div>
    <?php else : ?>
      <div class="row">
        <div class="col-12">
          <?php get_template_part('template-parts/alerts/articles', 'none'); ?>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>
<?php get_footer(); ?>
