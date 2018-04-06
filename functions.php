<?php
// Some queueing, nothing serious here... 
// Created by Bruno Kos from bbird.mes

add_action('wp_enqueue_scripts', 'bbird_scroller_scripts');
function bbird_scroller_scripts() {
    wp_enqueue_style( 'basic-css', get_stylesheet_uri() );
    wp_enqueue_style( 'font-awseome', get_stylesheet_directory_uri().'/css/font-awesome.min.css' );
    wp_enqueue_style( 'fullpage-css', get_stylesheet_directory_uri() . '/css/jquery.fullPage.css');
    wp_enqueue_script('fullpage-js', get_stylesheet_directory_uri() . '/js/jquery.fullPage.js', array('jquery'));
    wp_enqueue_script('fullpage-initialize', get_stylesheet_directory_uri() . '/js/fullpage.initialize.js', array('jquery'));
}

// Register Navigation Menus
function bbird_scroller_register_menus() {

	$locations = array(
		'Primary' => __( 'Main and only menu in the theme', 'text_domain' ),
	);
	register_nav_menus( $locations );

}
add_action( 'init', 'bbird_scroller_register_menus' );

function increment()
{
    static $i = 1;
    return $i++;
}

class bbird_scroller_walker extends Walker_Nav_Menu {

     function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
 
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
 
        $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
        $slider_value = 'slide' . increment();
        $output .= $indent . '<li data-menuanchor=' . $slider_value . $id . $class_names .'>';
 
        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';
 
        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
 
        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $title = apply_filters( 'the_title', $item->title, $item->ID );

        $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );
        
        $item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . $title . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}

// Custom settings
function custom_settings_add_menu() {
    add_menu_page( 'Custom Settings', 'Custom Settings', 'manage_options', 'custom-settings', 'custom_settings_page', null, 99 );
  }
  add_action( 'admin_menu', 'custom_settings_add_menu' );
  
  
  // Create Custom Global Settings
  function custom_settings_page() { ?>
    <div class="wrap">
      <h1>Custom Settings</h1>
      <form method="post" action="options.php">
         <?php
             settings_fields( 'section' );
             do_settings_sections( 'theme-options' );      
             submit_button(); 
         ?>          
      </form>
    </div>
  <?php }
  
  
  // Twitter
  function setting_twitter() { ?>
    <input type="text" name="twitter" id="twitter" value="<?php echo get_option( 'twitter' ); ?>" />
  <?php }
  
  function setting_github() { ?>
    <input type="text" name="github" id="github" value="<?php echo get_option('github'); ?>" />
  <?php }
  
  function setting_facebook() { ?>
    <input type="text" name="facebook" id="facebook" value="<?php echo get_option('facebook'); ?>" />
  <?php }
  
  function setting_instagram() { ?>
    <input type="text" name="instagram" id="instagram" value="<?php echo get_option('instagram'); ?>" />
  <?php }
  
  function custom_settings_page_setup() {
    add_settings_section( 'section', 'All Settings', null, 'theme-options' );
     add_settings_field( 'twitter', 'Twitter URL', 'setting_twitter', 'theme-options', 'section' );
     add_settings_field( 'github', 'GitHub URL', 'setting_github', 'theme-options', 'section' );
     add_settings_field( 'facebook', 'Facebook URL', 'setting_facebook', 'theme-options', 'section' );
     add_settings_field( 'instagram', 'Instagram URL', 'setting_instagram', 'theme-options', 'section' );
     
    register_setting( 'section', 'twitter' );
    register_setting( 'section', 'github' );
     register_setting( 'section', 'facebook' );
     register_setting( 'section', 'instagram' );
  }
  add_action( 'admin_init', 'custom_settings_page_setup' );
