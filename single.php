<?php get_header(); ?>
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-10 offset-md-1">
        <?php while (have_posts()): the_post(); ?>
          <div class="row mb-3">
            <div class="col-12">
              <?php get_template_part('template-parts/breadcrumbs/breadcrumb', 'single'); ?>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <?php get_template_part('template-parts/contents/content', 'single'); ?>
            </div>
          </div>
          <div class="row mt-5">
            <div class="col-12">
              <?php get_template_part('template-parts/navigations/post_nav', 'article'); ?>
            </div>
          </div>
          <div class="row mt-5">
            <div class="col-12">
              <?php get_template_part('template-parts/columns/column', 'other_articles'); ?>
            </div>
          </div>
          <div class="row mt-5">
            <div class="col-12">
              <?php comments_template(); ?>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>
