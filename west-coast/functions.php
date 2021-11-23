<?php

// include custom jQuery
// function shapeSpace_include_custom_jquery() {

// 	wp_deregister_script('jquery');
// 	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', array(), null, true);

// }
// add_action('wp_enqueue_scripts', 'shapeSpace_include_custom_jquery');




	add_action('wp_enqueue_scripts', 'west_coast_styles');
	add_action('wp_enqueue_scripts', 'west_coast_scripts');

	function west_coast_styles() {
		// wp_register_style( 'bootstrap', get_stylesheet_directory_uri() . '/src/libs/bootstrap/bootstrap.min.css', false, '4.5.0', null  );
		// wp_enqueue_style( 'bootstrap');
		wp_register_style( 'west-coast-main-style', get_stylesheet_directory_uri() . '/assets/css/main.min.css' );
		wp_enqueue_style( 'west-coast-main-style');
		wp_register_style( 'west-coast-woocommerce-style', get_stylesheet_directory_uri() . '/woocommerce/woocommerce.css' );
		wp_enqueue_style( 'west-coast-woocommerce-style');
		wp_register_style( 'west-coast-custom-style', get_stylesheet_directory_uri() . '/assets/css/custom.min.css', array(), rand(111,9999), 'all'  );
		wp_enqueue_style( 'west-coast-custom-style');
	};

	function west_coast_scripts() {
		wp_enqueue_script('west-coast-scripts', get_stylesheet_directory_uri() . '/assets/js/scripts.min.js', array(), rand(111,9999), 'all' );
	};


	function moshi_enqueue_scripts() {
		wp_enqueue_style( 'animate-css', get_stylesheet_directory_uri() . '/src/libs/animate-css/animate.min.css' );
		//wp_enqueue_style( 'easyautocomplete-css', get_stylesheet_directory_uri() . '/src/libs/easyautocomplete/easy-autocomplete.min.css' );
		//wp_enqueue_style( 'easyautocomplete-css-theme', get_stylesheet_directory_uri() . '/src/libs/easyautocomplete/easy-autocomplete.themes.min.css' );
		//wp_enqueue_script( 'easyautocomplete-js', get_template_directory_uri() . '/src/libs/easyautocomplete/jquery.easy-autocomplete.min.js', array(), '1.0.0', true );
		wp_enqueue_script( 'wow-js', get_template_directory_uri() . '/src/libs/wow/wow.min.js', array(), '1.0.0', true );
		//wp_enqueue_script( 'custom-js', get_template_directory_uri() . 'src/libs/js/custom.js', array(), '1.0.1', true  );
	
		wp_enqueue_style( 'swiper-css', get_stylesheet_directory_uri() . '/src/libs/swiper/swiper-bundle-min.css' );
		wp_enqueue_script( 'swiper-js', get_template_directory_uri() . '/src/libs/swiper/swiper.min.js', array(), '1.0.0', true  );
	}
	add_action( 'wp_enqueue_scripts', 'moshi_enqueue_scripts' );



	add_theme_support('custom-logo');
	add_theme_support('post-thumbnails');
	add_theme_support('menus');


	/**
 * Navwalker file.
 */
require get_template_directory() . '/inc/bootstrap-wp-navwalker.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}


// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
$west_coast_includes = array(
	'/hooks.php',                           // Custom hooks.
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/custom-comments.php',                 // Custom Comments file.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
	'/moshi.php',                      // Load deprecated functions.
);

foreach ( $west_coast_includes as $file ) {
	require_once get_template_directory() . '/inc' . $file;
}

//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);

add_filter('woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_add_to_cart_text');
function woocommerce_custom_add_to_cart_text() {
	return __('ORDER THIS SKIP BIN', 'woocommerce');
}

remove_filter('get_the_excerpt', 'wp_trim_excerpt');




// my own custom code

add_filter('add_to_cart_custom_fragments', 'woocommerce_header_add_to_cart_custom_fragment');
function woocommerce_header_add_to_cart_custom_fragment( $cart_fragments ) {
                global $woocommerce;
                ob_start();
                ?>
                <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View   cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
                <?php
                $cart_fragments['a.cart-contents'] = ob_get_clean();
                return $cart_fragments;
}


//Add WooCommerce Cart Icon to Menu with Cart Item Count
// https://wpbeaches.com/add-woocommerce-cart-icon-to-menu-with-cart-item-count/

add_shortcode ('woo_cart_but', 'woo_cart_but' );
/**
 * Create Shortcode for WooCommerce Cart Menu Item
 */
function woo_cart_but() {
	ob_start();
 
        $cart_count = WC()->cart->cart_contents_count; // Set variable for cart item count
        $cart_url = wc_get_cart_url();  // Set Cart URL
  
        ?>
        <li><a class="menu-item cart-contents" href="<?php echo $cart_url; ?>" title="My Basket">
	    <?php
        if ( $cart_count > 0 ) {
       ?>
            <span class="cart-contents-count"><?php echo $cart_count; ?></span>
        <?php
        }
        ?>
        </a></li>
        <?php
	        
    return ob_get_clean();
}



add_filter( 'woocommerce_add_to_cart_fragments', 'woo_cart_but_count' );
/**
 * Add AJAX Shortcode when cart contents update
 */
function woo_cart_but_count( $fragments ) {
 
    ob_start();
    
    $cart_count = WC()->cart->cart_contents_count;
    $cart_url = wc_get_cart_url();
    
    ?>
    <a class="cart-contents menu-item" href="<?php echo $cart_url; ?>" title="<?php _e( 'View your shopping cart' ); ?>">
	<?php
    if ( $cart_count > 0 ) {
        ?>
        <span class="cart-contents-count"><?php echo $cart_count; ?></span>
        <?php            
    }
        ?></a>
    <?php
 
    $fragments['a.cart-contents'] = ob_get_clean();
     
    return $fragments;
}




add_filter( 'main-nav', 'woo_cart_but_icon', 10, 2 ); // Change menu to suit - example uses 'top-menu'

/**
 * Add WooCommerce Cart Menu Item Shortcode to particular menu
 */
function woo_cart_but_icon ( $items, $args ) {
       $items .=  '[woo_cart_but]'; // Adding the created Icon via the shortcode already created
       
       return $items;
}