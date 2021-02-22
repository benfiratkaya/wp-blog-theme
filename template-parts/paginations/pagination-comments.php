<?php
  $fragment = '#comments';
  $paged = get_query_var('cpage');
  if (empty($paged)) $paged = 1;
  $pages = get_comment_pages_count();
  if (!$pages) {
    $pages = 1;
  }
?>
<?php if ($pages != 1): ?>
  <nav aria-label="Comments Page Navigation">
    <ul class="pagination justify-content-between">
      <li class="page-item <?php echo ($paged == 1) ? 'disabled' : null; ?>" data-toggle="tooltip" data-placement="top" title="<?php _e('Previous page'); ?>">
        <a class="page-link" href="<?php echo ($paged != 1) ? benfiratkaya_get_comment_pagenum_link($paged-1, $fragment) : $fragment; ?>" aria-label="Previous">
          <i class="fa fa-angle-left"></i>
        </a>
      </li>
      <li class="page-item <?php echo ($paged == $pages) ? 'disabled' : null; ?>" data-toggle="tooltip" data-placement="top" title="<?php _e('Next page'); ?>">
        <a class="page-link" href="<?php echo ($paged != $pages) ? benfiratkaya_get_comment_pagenum_link($paged+1, $fragment) : $fragment; ?>" aria-label="Next">
          <i class="fa fa-angle-right"></i>
        </a>
      </li>
    </ul>
  </nav>
<?php endif; ?>
