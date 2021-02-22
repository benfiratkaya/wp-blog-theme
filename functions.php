<?php
  function wp_limited_content($content, $limit = 0) {
    $content = strip_tags(get_the_content());
    $articleContentLength = strlen($content);
    if ($articleContentLength > $limit) {
      return mb_substr($content, 0, $limit, 'utf-8').'...';
    }
    else {
      return $content;
    }
  }

  function benfiratkaya_add_fragment($url, $fragment = '#') {
    return esc_url($url.$fragment);
  }

  function benfiratkaya_get_comment_pagenum_link($page = 0, $fragment = '#comments') {
    global $wp_rewrite;
    if ($wp_rewrite->using_permalinks()) {
      $pagenum_link = user_trailingslashit(trailingslashit(get_permalink()).$wp_rewrite->comments_pagination_base.'-'.$page, 'commentpaged');
    }
    else {
      $pagenum_link = add_query_arg('cpage', $page);
    }
    return benfiratkaya_add_fragment(esc_url($pagenum_link), $fragment);
  }

  function benfiratkaya_is_comment_by_post_author($comment = null) {
    if (is_object($comment) && $comment->user_id > 0) {
      $user = get_userdata($comment->user_id);
  		$post = get_post($comment->comment_post_ID);
  		if (!empty($user) && !empty($post)) {
  			return $comment->user_id === $post->post_author;
  		}
  	}
  	return false;
  }

  function benfiratkaya_writer_badge() {
    return '<i class="fa fa-check-circle text-primary verifiedCircle" data-toggle="tooltip" data-placement="top" title="'.__('Author').'"></i></span>';
  }

  function benfiratkaya_amp_css($amp_template) {
    $theme_uri = get_template_directory_uri();
    echo "@import '$theme_uri/assets/libs/amp/css/amp.min.css';";
  }
  add_action('amp_post_template_css', 'benfiratkaya_amp_css');

  function benfiratkaya_my_filter_head() {
     remove_action('wp_head', '_admin_bar_bump_cb');
  }
  add_action('get_header', 'benfiratkaya_my_filter_head');

  function benfiratkaya_search_filter($query) {
    if ($query->is_search) {
      $query->set('post_type', 'post');
    }
    return $query;
  }
  add_filter('pre_get_posts','benfiratkaya_search_filter');

  function benfiratkaya_exclude_files($excluded_files = array()) {
    $excluded_files[] = '/wp-content/plugins/enlighter/resources/(.*).js';
    return $excluded_files;
  }
  add_filter('rocket_exclude_defer_js', 'benfiratkaya_exclude_files');

  function benfiratkaya_the_custom_logo() {
  	if (function_exists('the_custom_logo')) {
  		the_custom_logo();
  	}
  }

  function benfiratkaya_custom_logo_output($html) {
  	$html = str_replace('custom-logo-link', 'navbar-brand', $html);
  	return $html;
  }
  add_filter('get_custom_logo', 'benfiratkaya_custom_logo_output');

  function benfiratkaya_add_search_form($items, $args) {
    if ($args->theme_location == 'primary') {
      $searchForm = get_search_form(false);
      $items      .= $searchForm;
    }
    return $items;
  }
  add_filter('wp_nav_menu_items', 'benfiratkaya_add_search_form', 10, 2);

  function benfiratkaya_move_comment_field_to_bottom($fields) {
    $comment_field = $fields['comment'];
    unset($fields['comment']);
    $fields['comment'] = $comment_field;
    return $fields;
  }
  add_filter('comment_form_fields', 'benfiratkaya_move_comment_field_to_bottom');

  function benfiratkaya_script_enqueue() {
    wp_enqueue_style('bootstrap.min.css', get_template_directory_uri().'/assets/libs/bootstrap/css/bootstrap.min.css', array(), '4.5.0', 'all');
    wp_enqueue_style('fancybox.min.css', get_template_directory_uri().'/assets/libs/fancybox/css/fancybox.min.css', array(), '3.5.7', 'all');
    wp_enqueue_style('owl.carousel.min.css', get_template_directory_uri().'/assets/libs/owl.carousel/css/owl.carousel.min.css', array(), '2.3.4', 'all');
    wp_enqueue_style('main.min.css', get_template_directory_uri().'/assets/css/main.min.css', array(), '1.0', 'all');
    wp_enqueue_style('responsive.min.css', get_template_directory_uri().'/assets/css/responsive.min.css', array(), '1.0', 'all');
    wp_enqueue_style('style-editor.css', get_template_directory_uri().'/style-editor.css', array(), '1.0', 'all');

    wp_enqueue_script('jquery.min.js', get_template_directory_uri().'/assets/libs/jquery/js/jquery.min.js', array(), '3.5.1', true);
    wp_enqueue_script('bootstrap.bundle.min.js', get_template_directory_uri().'/assets/libs/bootstrap/js/bootstrap.bundle.min.js', array(), '4.5.0', true);
    wp_enqueue_script('fancybox.min.js', get_template_directory_uri().'/assets/libs/fancybox/js/fancybox.min.js', array(), '3.5.7', true);
    wp_enqueue_script('owl.carousel.min.js', get_template_directory_uri().'/assets/libs/owl.carousel/js/owl.carousel.min.js', array(), '2.3.4', true);
    wp_enqueue_script('main.min.js', get_template_directory_uri().'/assets/js/main.min.js', array(), '1.0', true);

    if (!is_page('iletisim')) {
      wp_dequeue_script('contact-form-7');
      wp_dequeue_script('wpcf7-recaptcha');
      wp_dequeue_script('google-recaptcha');
      wp_dequeue_style('contact-form-7');
    }
  }
  add_action('wp_enqueue_scripts', 'benfiratkaya_script_enqueue');

  function benfiratkaya_custom_post_type (){
  	$labels = array(
  		'name'                => 'Projeler',
  		'singular_name'       => 'Projeler',
  		'add_new'             => 'Yeni ekle',
  		'all_items'           => 'Tüm projeler',
  		'add_new_item'        => 'Yeni ekle',
  		'edit_item'           => 'Düzenle',
  		'new_item'            => 'Yeni ekle',
  		'view_item'           => 'Görüntüle',
  		'search_item'         => 'Projelerde Ara',
  		'not_found'           => 'Proje bulunamadı.',
  		'not_found_in_trash'  => 'Proje bulunamadı.',
  		'parent_item_colon'   => 'Üst'
  	);
  	$args = array(
  		'labels'              => $labels,
  		'public'              => true,
  		'has_archive'         => true,
  		'publicly_queryable'  => true,
  		'query_var'           => true,
  		'rewrite'             => true,
  		'capability_type'     => 'post',
      'menu_icon'           => 'dashicons-editor-code',
  		'hierarchical'        => false,
      'taxonomies'          => array('post_tag'),
  		'menu_position'       => 5,
  		'exclude_from_search' => false,
      'supports'            => array(
  			'title',
  			'editor',
  			'excerpt',
  			'thumbnail',
  			'revisions',
  		)
  	);
  	register_post_type('proje', $args);
  }
  add_action('init', 'benfiratkaya_custom_post_type');

  function benfiratkaya_custom_taxonomies() {
  	$labels = array(
  		'name'              => 'Proje Kategorileri',
  		'singular_name'     => 'Kategori',
  		'search_items'      => 'Kategorilerde Ara',
  		'all_items'         => 'Tüm kategoriler',
  		'parent_item'       => 'Üst',
  		'parent_item_colon' => 'Üst:',
  		'edit_item'         => 'Düzenle',
  		'update_item'       => 'Güncelle',
  		'add_new_item'      => 'Yeni ekle',
  		'new_item_name'     => 'Yeni ekle',
  		'menu_name'         => 'Kategoriler'
  	);
  	$args = array(
      'hierarchical'        => true,
  		'labels'              => $labels,
  		'show_ui'             => true,
  		'show_admin_column'   => true,
  		'query_var'           => true,
  		'rewrite'             => array('slug' => 'proje-kategori')
  	);
  	register_taxonomy('proje-kategori', array('proje'), $args);
  }
  add_action('init', 'benfiratkaya_custom_taxonomies');

  function benfiratkaya_theme_setup() {
    add_theme_support('responsive-embeds');

    add_theme_support('automatic-feed-links');

    add_theme_support('title-tag');

    add_theme_support('custom-logo');

    add_theme_support('menus');
    register_nav_menu('primary', 'Primary Header Navigation');

    add_theme_support('post-thumbnails');
    add_image_size('my_thumbnail', 640, 360, true);
  }
  add_action('after_setup_theme', 'benfiratkaya_theme_setup');

  add_filter('rank_math/frontend/remove_reply_to_com', '__return_false');

  require get_template_directory().'/classes/walkers/nav-menu.php';
  require get_template_directory().'/classes/walkers/comments.php';

?>
