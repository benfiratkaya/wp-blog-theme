<nav aria-label="breadcrumb">
  <ol class="breadcrumb mb-0">
    <li class="breadcrumb-item">
      <a href="/">Ana Sayfa</a>
    </li>
    <li class="breadcrumb-item">
      <a href="/">Yazılar</a>
    </li>
    <?php if (get_the_category()): ?>
      <li class="breadcrumb-item">
        <a href="<?php echo esc_url(get_category_link(get_the_category()[0]->term_id)); ?>"><?php echo get_the_category()[0]->name; ?></a>
      </li>
    <?php endif; ?>
    <li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
  </ol>
</nav>
