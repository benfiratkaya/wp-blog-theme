<li class="nav-item nav-search d-none d-md-block">
  <a class="nav-link pr-0">
    <form method="get" action="<?php echo esc_url(home_url('/')); ?>" role="search">
      <div class="searchbar">
        <input class="search_input" type="text" name="s" placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder'); ?>" autocomplete="off" required="required" value="<?php echo get_search_query(); ?>">
        <button type="submit" class="btn search_icon"><i class="fas fa-search"></i></button>
      </div>
    </form>
  </a>
</li>
<li class="nav-item nav-search-mobile d-block d-md-none">
  <a class="nav-link">
    <form method="get" action="<?php echo esc_url(home_url('/')); ?>" role="search">
      <div class="input-group mb-3">
        <input class="form-control" type="text" name="s" placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder'); ?>" autocomplete="off" required="required" value="<?php echo get_search_query(); ?>">
        <div class="input-group-append">
          <button class="btn btn-primary" type="submit"><?php echo esc_attr_x('Search', 'submit button'); ?></button>
        </div>
      </div>
    </form>
  </a>
</li>
