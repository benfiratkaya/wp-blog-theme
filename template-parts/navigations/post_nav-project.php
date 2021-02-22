<?php $prev_post = get_adjacent_post(false, '', true); ?>
<?php $next_post = get_adjacent_post(false, '', false); ?>
<div class="row post-nav">
  <div class="col-6 text-left post-nav-item">
    <a href="<?php echo (($prev_post) ? get_permalink($prev_post->ID) : '#'); ?>" class="<?php echo (($prev_post) ? 'd-block' : 'd-none'); ?>">
      <?php if ($prev_post): ?>
        <div class="d-block">Önceki Proje</div>
        <div class="d-block font-weight-bold"><?php echo $prev_post->post_title; ?></div>
      <?php endif; ?>
    </a>
  </div>
  <div class="col-6 text-right post-nav-item">
    <a href="<?php echo (($next_post) ? get_permalink($next_post->ID) : '#'); ?>" class="<?php echo (($next_post) ? 'd-block' : 'd-none'); ?>">
      <?php if ($next_post): ?>
        <div class="d-block">Sonraki Proje</div>
        <div class="d-block font-weight-bold"><?php echo $next_post->post_title; ?></div>
      <?php endif; ?>
    </a>
  </div>
</div>
