<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="article">
    <div class="card">
      <div class="card-body article-content">
        <h1 class="article-title"><?php the_title(); ?></h1>
        <div class="media align-items-center my-4">
          <div>
            <a class="avatar rounded-circle mr-3" href="#">
              <img alt="Yazar" src="<?php echo esc_url(get_avatar_url(get_the_author_id())); ?>" loading="lazy">
            </a>
          </div>
          <div class="media-body">
            <span class="d-block h6 mb-0">
              <?php echo ((empty(get_the_author_meta('first_name')) || empty(get_the_author_meta('last_name')) ) ? get_the_author_meta('display_name') : sprintf('%s %s', get_the_author_meta('first_name'), get_the_author_meta('last_name'))); ?>
              <?php echo benfiratkaya_writer_badge(); ?>
            </span>
            <span class="text-sm text-muted"><?php echo sprintf('%s %s', get_the_date(), get_the_time()); ?></span>
          </div>
          <div class="media-right d-flex justify-content-end">
            <?php edit_post_link('<i class="far fa-edit"></i> '.__('Edit'), '<div class="media-item d-none d-sm-block" data-toggle="tooltip" data-placement="top" title="'.__('Edit').'">', '</div>'); ?>
          </div>
        </div>
        <?php the_content(); ?>
        <?php $tags = get_the_tags(); ?>
        <?php if ($tags): ?>
          <p>
            <?php foreach ($tags as $tag): ?>
              <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" class="badge badge-soft-primary rounded-pill mb-2"><?php echo $tag->name; ?></a>
            <?php endforeach; ?>
          </p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</article>
