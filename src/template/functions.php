<?php
/*
 *  Author: Todd Motto | @toddmotto
 *  URL: html5blank.com | @html5blank
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    //add_image_size('large', 700, '', true); // Large Thumbnail
    //add_image_size('medium', 250, '', true); // Medium Thumbnail
    //add_image_size('small', 120, '', true); // Small Thumbnail


    // Add Excerpts to Pages
    add_post_type_support( 'page', 'excerpt' );
    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
	'default-color' => 'FFF',
	'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
	'default-image'			=> get_template_directory_uri() . '/img/headers/default.jpg',
	'header-text'			=> false,
	'default-text-color'		=> '000',
	'width'				=> 1000,
	'height'			=> 198,
	'random-default'		=> false,
	'wp-head-callback'		=> $wphead_cb,
	'admin-head-callback'		=> $adminhead_cb,
	'admin-preview-callback'	=> $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('johnunwin', get_template_directory() . '/languages');
}


/*------------------------------------*\
	Functions
\*------------------------------------*/

// Remove unused thumbnail sizes
function remove_plugin_image_sizes() {
    remove_image_size('small');
    remove_image_size('medium');
    remove_image_size('medium_large');
    remove_image_size('large');
}
add_action('init', 'remove_plugin_image_sizes');

// Disable emoji's
function disable_emojis() {
 remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
 remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
 remove_action( 'wp_print_styles', 'print_emoji_styles' );
 remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
 remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
 remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
 remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
 add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
 add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 * 
 * @param array $plugins 
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
 if ( is_array( $plugins ) ) {
 return array_diff( $plugins, array( 'wpemoji' ) );
 } else {
 return array();
 }
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
 */
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
 if ( 'dns-prefetch' == $relation_type ) {
 /** This filter is documented in wp-includes/formatting.php */
 $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

$urls = array_diff( $urls, array( $emoji_svg_url ) );
 }

return $urls;
}

// Remove Desired Menus from Admin Page
function remove_menus() {  
    remove_menu_page( 'edit.php' );                   //Posts
    remove_menu_page( 'edit-comments.php' );          //Comments
}
add_action('admin_menu','remove_menus');

// Remove Desired Widgets from Dashboard
function remove_dashboard_widgets() {
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
}
add_action('admin_init', 'remove_dashboard_widgets');

// Remove Desired Nodes form Admin Bar (Toolbar)
function remove_admin_bar_nodes( $wp_admin_bar ) {
    $wp_admin_bar->remove_node( 'comments' );
    $wp_admin_bar->remove_node( 'new-content' );    
}
add_action('admin_bar_menu','remove_admin_bar_nodes',999);

// Remove Desired Customizer Panels
function remove_customizer_panels() {     
    global $wp_customize;
    $wp_customize->remove_panel( 'widgets' ); 
} 
add_action( 'customize_register', 'remove_customizer_panels', 11 );

// Move Yoast plugin SEO boxes to bottom of post/page admin area
function yoast_to_bottom() {
    return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoast_to_bottom' );

// Add ACF Pro options page
if( function_exists('acf_add_options_page') ) {  
    acf_add_options_page();

    acf_add_options_sub_page(array(
        'page_title'    => 'General Options',
        'menu_title'    => 'General Options',
    ));
    acf_add_options_sub_page(array(
        'page_title'    => 'Quote Block',
        'menu_title'    => 'Quote Block',
    ));
    acf_add_options_sub_page(array(
        'page_title'    => 'Call Us Block',
        'menu_title'    => 'Call Us Block',
    ));
}

// Automatically set the image Title and Alt-Text upon upload
function set_img_meta_upon_upload( $post_ID ) {
    // Check if uploaded file is an image, else do nothing
    if ( wp_attachment_is_image( $post_ID ) ) {
        $img_title = get_post( $post_ID )->post_title;
        // Sanitize the title:  remove hyphens, underscores & extra spaces:
        $img_title = preg_replace( '%\s*[-_\s]+\s*%', ' ',  $img_title );
        // Sanitize the title:  capitalize first letter of every word (other letters lower case):
        $img_title = ucwords( strtolower( $img_title ) );
        // Create an array with the image meta (Title) to be updated
        $img_meta = array(
            'ID'        	=> $post_ID,        	 // Specify the image (ID) to be updated
            'post_title'    => $img_title,      // Set image Title to sanitized title
        );
        // Set the image Alt-Text
        update_post_meta( $post_ID, '_wp_attachment_image_alt', $img_title );
        // Set the image meta (e.g. Title, Excerpt, Content)
        wp_update_post( $img_meta );
    } 
}
add_action( 'add_attachment', 'set_img_meta_upon_upload' );

// Register Google Maps API
function my_acf_init() {   
    acf_update_setting('google_api_key', 'AIzaSyDMXjNIVNx8XI5O6tzh9whXAxYEdatJQtQ');
}
add_action('acf/init', 'my_acf_init');

// Wrap the content typed in WP visual editor in extra <div>
function wrap_editor_content($content) {
  return '<div class="editor-wrapper">'.$content.'</div>';
}
add_filter('the_content','wrap_editor_content');

// Wrap <table> elements typed in WP visual editor in extra <div>
function wrap_editor_table_content($content) {
  return preg_replace_callback('~<table.*?</table>~is', function($match) {
    return '<div class="editor-table-wrapper">' . $match[0] . '</div>';
  }, $content);
}
add_filter('the_content', 'wrap_editor_table_content');

// Load John Unwin scripts
function johnunwin_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

        wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1'); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!
        
        wp_deregister_script('jquery');
        wp_register_script('jquery', get_template_directory_uri() . '/bower_components/jquery/jquery.min.js', array(), '3.2.1', true); // jQuery
        wp_enqueue_script('jquery'); // Enqueue it!
        
        wp_register_script('johnunwin_scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.4', true); // Custom scripts
        wp_enqueue_script('johnunwin_scripts'); // Enqueue it!
    }
}

// Load John Unwin styles
function johnunwin_styles()
{
    wp_register_style('normalize', get_template_directory_uri() . '/normalize.min.css', array(), '8.0', 'all');
    wp_enqueue_style('normalize'); // Enqueue it!

    wp_register_style('johnunwin', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('johnunwin'); // Enqueue it!
}

// Load John Unwin conditional scripts
function johnunwin_conditional_scripts()
{
  /*  if (is_page_template(array('page-service-item.php', 'page-quality.php')) || is_singular('news_posts') || is_singular('locations_posts')) {
        wp_register_script('lightslider', get_template_directory_uri() . '/bower_components/lightslider/js/lightslider.js', array('jquery'), '1.1.6', true); // Lightslider Plugin
        wp_enqueue_script('lightslider'); // Enqueue it!
    }
    if (is_page_template(array('page-gallery.php', 'page-quality.php'))) {
        wp_register_script('photoswipe', get_template_directory_uri() . '/bower_components/photoswipe/photoswipe.min.js', array(), '4.0.6', true); // Photoswipe JS Gallery Plugin
        wp_enqueue_script('photoswipe'); // Enqueue it!                

        wp_register_script('photoswipe-ui', get_template_directory_uri() . '/bower_components/photoswipe/photoswipe-ui-default.min.js', array(), '4.0.6', true); // Photoswipe JS Gallery Plugin default UI JavaScript
        wp_enqueue_script('photoswipe-ui'); // Enqueue it!
    } */
}

// Register John Unwin Navigation
function register_johnunwin_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'johnunwin'), // Main Navigation
    ));
}

// Define John Unwin header navigation
function johnunwin_header_nav()
{
    wp_nav_menu(
    array(
        'theme_location'  => 'header-menu',
        'menu_class'         => 'header-menu',
        )
    );
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Contact Form Widget', 'johnunwin'),
        'description' => __('Contains contact form, which opens, when icon is clicked', 'johnunwin'),
        'id' => 'contact-form-widget-area',
        'before_widget' => '<div id="%1$s" class="%2$s widget-block">',
        'after_widget' => '</div>',
        'before_title' => '<h6 class="title">',
        'after_title' => '</h6>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function johnunwin_wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}


function posts_link_attributes() {
    return 'class="btn btn-1 load-more-link"';
}
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

// Custom Excerpt Length
function johnunwin_wp_20($length) // Create 20 Word Callback, call using johnunwin_wp_excerpt('johnunwin_wp_20');
{
    return 20;
}

// Custom Excerpt "Read More" Text
function johnunwin_no_read_more($read_more_text) // Set no "read more" text
{
    return '';
}

// Create the Custom Excerpts callback
function johnunwin_wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
   // $output = '<p>' . $output . '</p>';
    echo $output;
}

// Limit custom excerpt by characters
add_filter('wp_trim_excerpt', function($text){    
   $max_length = 85;

   if(mb_strlen($text, 'UTF-8') > $max_length){
     $split_pos = mb_strpos(wordwrap($text, $max_length), "\n", 0, 'UTF-8');
     $text = mb_substr($text, 0, $split_pos, 'UTF-8');
   }

   return $text;
});

// Create excerpt for ACF
function custom_field_excerpt() {
    global $post;
    $text = get_field('page_content');
    if ( '' != $text ) {
        $text = strip_shortcodes( $text );
        $text = apply_filters('the_content', $text);
        $text = str_replace(']]>', ']]>', $text);
        $excerpt_length = 20; // 20 words
        $excerpt_more = '';
        $text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
    }
    return apply_filters('the_excerpt', $text);
}

// Limit ACF excerpt by characters
add_filter('wp_trim_words', function($text){    
   $max_length = 85;

   if(mb_strlen($text, 'UTF-8') > $max_length){
     $split_pos = mb_strpos(wordwrap($text, $max_length), "\n", 0, 'UTF-8');
     $text = mb_substr($text, 0, $split_pos, 'UTF-8');
   }

   return $text;
});

// Define the wpseo_replacements callback (generate excerpt from custom field)
function filter_wpseo_replacements( $replacements ) {
    if( isset( $replacements['%%cf_page_content%%'] ) ){
        if ( !empty(get_the_excerpt()) ) {
           $replacements['%%cf_page_content%%'] = johnunwin_wp_excerpt('', 'johnunwin_no_read_more');
        } else {
            $replacements['%%cf_page_content%%'] = custom_field_excerpt();
        }

        //$replacements['%%cf_page_content%%'] = custom_field_excerpt();

    }
    return $replacements;
};
// Add filter
add_filter( 'wpseo_replacements', 'filter_wpseo_replacements', 10, 1 );


// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function johnunwin_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function johnunwin_gravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'johnunwin_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'johnunwin_conditional_scripts'); // Add Conditional Page Scripts
add_action('wp_enqueue_scripts', 'johnunwin_styles'); // Add Theme Stylesheet
add_action('init', 'register_johnunwin_menu'); // Add John Unwin Menu
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'johnunwin_wp_pagination'); // Add our John Unwin Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'johnunwin_gravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'johnunwin_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether