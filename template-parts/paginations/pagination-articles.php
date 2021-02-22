<?php
  $range = 2;
  $showitems = ($range * 2) + 1;
  global $paged;
  global $wp_query;
  if (empty($paged)) $paged = 1;
  $pages = $wp_query->max_num_pages;
  if (!$pages) {
    $pages = 1;
  }
?>
<?php if ($pages != 1): ?>
  <div class="d-flex justify-content-center">
    <nav aria-label="Articles Page Navigation">
      <ul class="pagination">
        <li class="page-item <?php echo ($paged == 1) ? 'disabled' : null; ?>" data-toggle="tooltip" data-placement="top" title="<?php _e('Previous page'); ?>">
          <a class="page-link" href="<?php echo ($paged != 1) ? get_pagenum_link($paged-1) : '#'; ?>" aria-label="Previous">
            <i class="fa fa-angle-left"></i>
          </a>
        </li>
        <?php for ($i = 1; $i <= $pages; $i++): ?>
          <?php if ($pages != 1 && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)): ?>
            <li class="page-item <?php echo ($paged == $i) ? 'active' : null; ?>">
              <a class="page-link" href="<?php echo ($paged == $i) ? '#' : get_pagenum_link($i); ?>"><?php echo $i; ?></a>
            </li>
          <?php endif; ?>
        <?php endfor; ?>
        <li class="page-item <?php echo ($paged == $pages) ? 'disabled' : null; ?>" data-toggle="tooltip" data-placement="top" title="<?php _e('Next page'); ?>">
          <a class="page-link" href="<?php echo ($paged != $pages) ? get_pagenum_link($paged+1) : '#'; ?>" aria-label="Next">
            <i class="fa fa-angle-right"></i>
          </a>
        </li>
      </ul>
    </nav>
  </div>
<?php endif; ?>
