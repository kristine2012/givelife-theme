
<?php

define( 'WP_DEBUG', true );

//load stylesheets
function load_css(){
  wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all');
  wp_enqueue_style('bootstrap');

  //your own css must be last
  wp_register_style('main', get_template_directory_uri() . '/css/main.css', array(), false, 'all');
  wp_enqueue_style('main');

}
add_action('wp_enqueue_scripts','load_css');


//load javascript
function load_js()
{
		wp_enqueue_script('jquery');

		wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery', false, true);
		wp_enqueue_script('bootstrap');


}
add_action('wp_enqueue_scripts', 'load_js');


// theme options
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('widgets');

//----------------------------- Menu ------------------------------------//
register_nav_menus(
  array(
    'top-menu' => 'Top Menu Location',
    'mobile-menu' => 'Mobile Menu Location',
    'footer-menu' => 'Footer Menu Location',
  )


);

//----------------------------- Custome Image Size ------------------------------------//
add_image_size('blog-large', 800, 400, false);
add_image_size('blog-small', 300, 200, true);

//----------------------------- Regiser Side Bars ------------------------------------//
function my_sidebars(){
  register_sidebar(
      array(
        'name' => 'Page Sidebar',
        'id' => 'page-sidebar',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>'
      )
    );

    register_sidebar(
        array(
          'name' => 'Blog Sidebar',
          'id' => 'blog-sidebar',
          'before_title' => '<h4 class="widget-title">',
          'after_title' => '</h4>'
        )
      );
}

add_action('widgets_init', 'my_sidebars');


//----------------------------- Custom Post Type ------------------------------------//
function my_first_post_type(){
  $args = array(
    'labels' => array(
        'name' => 'News',
        'singular_name' => 'News',
    ),
  'hierarchical' => true, //booleans value toggles between pages & posts without labels
  'menu_icon' => 'dashicons-palmtree',
  'public' => true,
  'has_archive' => true,
  'supports' => array('title', 'editor', 'thumbnail','custom-fields'),// if one of the argument is  not mentioned,
  //if makes difference in features

);
  register_post_type('news',$args);
}
add_action('init','my_first_post_type');


//----------------------------- Taxonomy ------------------------------------//

function my_first_taxonomy(){
  $args = array(
    'labels' => array(
      'name' => 'Types',
      'singular_name' => 'Type',
    ),

    'public' => true,
    'hierarchical' => true,//false works like tags, true like catgories without labels


  );
  register_taxonomy('types', array('news'),$args);

}

add_action('init', 'my_first_taxonomy');

/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more( $more ) {
  return ' ...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );


function mytheme_add_woocommerce_support() {
  add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );


add_filter('next_posts_link_attributes', 'posts_links_next');
add_filter('previous_posts_link_attributes', 'posts_links_previous');

function posts_links_next() {
    return 'class="btn btn-secondary next-post"';
}
function posts_links_previous() {
    return 'class="btn btn-secondary previous-post"';
}

require get_template_directory() . '/includes/custom-customizer.php';


//----------------------------- LOGO ------------------------------------//
function givelife_custom_logo_setup() { //Adding custom logo with 5 arguments
  $defaults = array(
    'height'      => 50,
    'width'       => 50,
    'flex-height' => false,
    'flex-width'  => false,
    'header-text' => array( 'site-title', 'site-description' ),
  );
  add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'givelife_custom_logo_setup' );
?>