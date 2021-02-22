<nav aria-label="breadcrumb">
  <ol class="breadcrumb mb-0">
    <li class="breadcrumb-item">
      <a href="/">Ana Sayfa</a>
    </li>
    <li class="breadcrumb-item">
      <a href="/projeler">Projeler</a>
    </li>
    <?php if (get_the_terms(get_the_ID(), 'proje-kategori')): ?>
      <li class="breadcrumb-item">
        <a href="<?php echo esc_url(get_term_link(get_the_terms(get_the_ID(), 'proje-kategori')[0]->term_id)); ?>"><?php echo get_the_terms(get_the_ID(), 'proje-kategori')[0]->name; ?></a>
      </li>
    <?php endif; ?>
    <li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
  </ol>
</nav>
