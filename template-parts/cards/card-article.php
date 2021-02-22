<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="card-article">
    <div class="card">
      <div class="img-container">
        <a class="img-card" href="<?php the_permalink(); ?>">
          <img class="card-img-top" src="<?php echo (has_post_thumbnail()) ? the_post_thumbnail_url('my_thumbnail') : get_template_directory_uri().'/assets/img/default-thumnmail.png'; ?>"
            alt="<?php echo esc_attr((get_the_post_thumbnail_caption()) ? get_the_post_thumbnail_caption() : the_title()); ?>">
        </a>
        <div class="img-card-tl">
          <span class="badge badge-pill badge-soft-success"><?php echo get_the_category()[0]->name; ?></span>
        </div>
        <div class="img-card-tr">
          <span class="badge badge-pill badge-soft-primary"><?php echo get_the_date(); ?></span>
        </div>
        <div class="img-card-bottom">
          <h5 class="card-title mb-0">
            <a class="text-white" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </h5>
        </div>
      </div>
      <div class="card-body">
        <div class="card-text mb-3">
          <?php echo wp_limited_content(get_the_content(), 275); ?>
        </div>
        <a class="btn btn-primary w-100" href="<?php the_permalink(); ?>">DEVAMINI OKU</a>
      </div>
    </div>
  </div>
</article>
