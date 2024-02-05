<?php

// style and scripts
add_action('wp_enqueue_scripts', 'bootscore_child_enqueue_styles');
function bootscore_child_enqueue_styles() {

  // style.css
  wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');

  // Compiled main.css
  $modified_bootscoreChildCss = date('YmdHi', filemtime(get_stylesheet_directory() . '/css/main.css'));
  wp_enqueue_style('main', get_stylesheet_directory_uri() . '/css/main.css', array('parent-style'), $modified_bootscoreChildCss);

  // custom.js
  wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/js/custom.js', false, '', true);
}


use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'frontpage_content' );
function frontpage_content() {
    Container::make( 'post_meta', __( 'Content' ) )
        ->where( 'post_id', '=', get_option( 'page_on_front' ) )
        ->add_fields( array(
            Field::make( 'rich_text', 'about_us', 'Tekst do sekcji - O nas' ),
            Field::make( 'image', 'about_us_image', 'Grafika w sekcji- O nas')
            ->set_value_type( 'url' )
        ) );
}


// CPT CARS

function cars() {
  
      $labels = array(
          'name'                => _x( 'Samochody', 'Post Type General Name', 'bootscore_cars_cpt' ),
          'singular_name'       => _x( 'Samochód', 'Post Type Singular Name', 'bootscore_cars_cpt' ),
          'menu_name'           => __( 'Samochody', 'bootscore_cars_cpt' ),
          'parent_item_colon'   => __( 'Marka', 'bootscore_cars_cpt' ),
          'all_items'           => __( 'Lista wszystkich samochodów', 'bootscore_cars_cpt' ),
          'view_item'           => __( 'Zobacz dane / ofertę samochodu', 'bootscore_cars_cpt' ),
          'add_new_item'        => __( 'Dodaj samochód', 'bootscore_cars_cpt' ),
          'add_new'             => __( 'Dodaj nowy samochód', 'bootscore_cars_cpt' ),
          'edit_item'           => __( 'Edytuj samochód', 'bootscore_cars_cpt' ),
          'update_item'         => __( 'Zaktualizuj dane samochodu', 'bootscore_cars_cpt' ),
          'search_items'        => __( 'Szukaj samochodu', 'bootscore_cars_cpt' ),
          'not_found'           => __( 'Nie znaleziono pojazdu', 'bootscore_cars_cpt' ),
          'not_found_in_trash'  => __( 'Nie znaleziono pojazdu w archiwum', 'bootscore_cars_cpt' ),
      );
        
        
      $args = array(
          'label'               => __( 'cars', 'bootscore_cars_cpt' ),
          'description'         => __( 'Lista samochodów i ich dane', 'bootscore_cars_cpt' ),
          'labels'              => $labels,
          'supports'            => array( 'title', 'revisions', ),
          'taxonomies'          => array( 'genres' ),
          'hierarchical'        => false,
          'public'              => true,
          'show_ui'             => true,
          'show_in_menu'        => true,
          'show_in_nav_menus'   => true,
          'show_in_admin_bar'   => true,
          'menu_position'       => 5,
          'can_export'          => true,
          'has_archive'         => true,
          'exclude_from_search' => false,
          'publicly_queryable'  => true,
          'capability_type'     => 'post',
          'show_in_rest' => true,
    
      );
        
      register_post_type( 'cars', $args );
    
  }
    
  add_action( 'init', 'cars', 0 );


  add_action( 'carbon_fields_register_fields', 'car_cf' );
function car_cf() {
    Container::make( 'post_meta', __( 'Dane samochodu' ) )
        ->where( 'post_type', '=', 'cars' )
        ->add_fields( array(
            Field::make('text', 'car_mark', 'Marka'),
            Field::make('text', 'car_price', 'Cena'),
            Field::make('text', 'car_engine', 'Pojemność'),
            Field::make('text', 'car_total_km', 'Przebieg'),
            Field::make( 'rich_text', 'car_description', 'Opis samochodu' ),
            Field::make( 'image', 'car_image', 'Zdjęcie samochodu')
            ->set_value_type( 'url' ),
        ) );
}

// more AJAX

function ajax_load_more_scripts() {
	wp_enqueue_script('jquery');
	wp_register_script( 'loadmore_script', get_template_directory_uri() . '/js/ajax.js', array('jquery') );
	wp_localize_script( 'loadmore_script', 'loadmore_params', array(
		'ajaxurl' => admin_url('admin-ajax.php'),
	) );

 	wp_enqueue_script( 'loadmore_script' );
}
 
add_action( 'wp_enqueue_scripts','ajax_load_more_scripts' );

function ajax_load_more(){
	$type = $_POST['type'];
	$category = isset($_POST['category']) ? $_POST['category']: '';
	$args['paged'] = $_POST['page'] + 1;
	$args['post_status'] = 'publish';
	$args['posts_per_page'] =  $_POST['limit'];
	if($type == 'archive'){
		$args['category_name'] = $category;
	}
	query_posts( $args );
	if( have_posts() ) :
		while(have_posts()): the_post();	
        get_template_part( 'template-parts/post-loop' );
    endwhile;
	endif;
	die;
}
add_action('wp_ajax_loadmore','ajax_load_more');
add_action('wp_ajax_nopriv_loadmore','ajax_load_more');



// CPT SERVCIE

function service() {
  
    $labels = array(
        'name'                => _x( 'Oferta', 'Post Type General Name', 'bootscore_service_cpt' ),
        'singular_name'       => _x( 'Oferta', 'Post Type Singular Name', 'bootscore_service_cpt' ),
        'menu_name'           => __( 'Oferta', 'bootscore_service_cpt' ),
        'parent_item_colon'   => __( 'Oferta', 'bootscore_service_cpt' ),
        'all_items'           => __( 'Lista wszystkich ofert', 'bootscore_service_cpt' ),
        'view_item'           => __( 'Zobacz oferte', 'bootscore_service_cpt' ),
        'add_new_item'        => __( 'Dodaj oferte', 'bootscore_service_cpt' ),
        'add_new'             => __( 'Dodaj nową oferte', 'bootscore_service_cpt' ),
        'edit_item'           => __( 'Edytuj ofertę', 'bootscore_service_cpt' ),
        'update_item'         => __( 'Zaktualizuj dane oferty', 'bootscore_service_cpt' ),
        'search_items'        => __( 'Szukaj oferty', 'bootscore_service_cpt' ),
        'not_found'           => __( 'Nie znaleziono oferty', 'bootscore_service_cpt' ),
        'not_found_in_trash'  => __( 'Nie znaleziono oferty', 'bootscore_service_cpt' ),
    );
      
      
    $args = array(
        'label'               => __( 'service', 'bootscore_service_cpt' ),
        'description'         => __( 'Lista usług oferowanych w ofercie', 'bootscore_service_cpt' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'revisions', ),
        'taxonomies'          => array( 'genres' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 6,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
  
    );
      
    register_post_type( 'service', $args );
  
}
  
add_action( 'init', 'service', 0 );


// servie custom fields

add_action( 'carbon_fields_register_fields', 'service_cf' );
function service_cf() {
    Container::make( 'post_meta', __( 'Informacje o usłudze' ) )
        ->where( 'post_type', '=', 'service' )
        ->add_fields( array(
            Field::make( 'rich_text', 'service_description', 'Opis oferty' ),
            Field::make( 'image', 'service_image', 'Ikona usługi')
            ->set_value_type( 'url' ),
        ) );
}

// allow svg upload

// Footer 5
register_sidebar(array(
    'name'          => esc_html__('Footer 5', 'bootscore'),
    'id'            => 'footer-5',
    'description'   => esc_html__('Add widgets here.', 'bootscore'),
    'before_widget' => '<div class="footer_widget mb-4">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widget-title h4">',
    'after_title'   => '</h2>'
  ));
  // Footer 5 End