<div class="col-other-articles">
  <div class="row mb-3 mb-md-4">
    <div class="col">
      <h4 class="mb-0">Diğer Yazılar</h4>
    </div>
    <div class="col-auto">
      <a href="/" class="btn btn-sm btn-primary rounded-pill d-none d-md-inline">
        Tümü
      </a>
    </div>
  </div>
  <?php $article_categories = get_the_category(); ?>
  <?php if ($article_categories): ?>
    <?php
      $article_first_category_id = $article_categories[0]->term_id;
      $other_articles_args = array(
        'category__in' => array($article_first_category_id),
        'post__not_in' => array(get_the_ID()),
        'posts_per_page' => 6
      );
      $other_articles_query = new WP_Query($other_articles_args);
    ?>
    <?php if ($other_articles_query->have_posts()): ?>
      <div class="carousel-wrap">
        <div class="owl-carousel">
          <?php while ($other_articles_query->have_posts()): $other_articles_query->the_post(); ?>
            <div class="item">
              <?php get_template_part('template-parts/cards/card', 'article_mini'); ?>
            </div>
          <?php endwhile; ?>
        </div>
      </div>
    <?php else: ?>
      <div class="row">
        <div class="col-12">
          <?php get_template_part('template-parts/alerts/other_articles', 'none'); ?>
        </div>
      </div>
    <?php endif; ?>
    <?php wp_reset_query(); ?>
  <?php else: ?>
    <?php get_template_part('template-parts/alerts/other_articles', 'none'); ?>
  <?php endif; ?>
</div>
