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

if (!isset($content_width)) {
    $content_width = 900;
}

if (function_exists('add_theme_support')) {
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 1200, '', true); // Large Thumbnail
    add_image_size('medium', 500, '', true); // Medium Thumbnail
    add_image_size('small', 250, '', true); // Small Thumbnail
    add_image_size('thumbnail', 150, 150, true); // Small Thumbnail

    // add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

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
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// HTML5 Blank navigation
function html5blank_nav() {
    wp_nav_menu(
        array(
            'theme_location'  => 'header-menu',
            'menu'            => '',
            'container'       => 'div',
            'container_class' => 'menu-{menu slug}-container',
            'container_id'    => '',
            'menu_class'      => 'menu',
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul>%3$s</ul>',
            'depth'           => 0,
            'walker'          => ''
        )
    );
}




function disable_wp_emojicons() {

    // all actions related to emojis
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');

    // filter to remove TinyMCE emojis
    // add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action('init', 'disable_wp_emojicons');


function remove_json_api() {

    // Remove the REST API lines from the HTML Header
    remove_action('wp_head', 'rest_output_link_wp_head', 10);
    remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
    // Remove the REST API endpoint.
    remove_action('rest_api_init', 'wp_oembed_register_route');
    // Turn off oEmbed auto discovery.
    add_filter('embed_oembed_discover', '__return_false');
    // Don't filter oEmbed results.
    remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
    // Remove oEmbed discovery links.
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    // Remove oEmbed-specific JavaScript from the front-end and back-end.
    remove_action('wp_head', 'wp_oembed_add_host_js');
    // Remove all embeds rewrite rules.
    // add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );
}
add_action('after_setup_theme', 'remove_json_api');



function wf_version() {
    return '0.1.5';
}



// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts() {
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

        $tdu =  get_template_directory_uri();

        // wp_register_script('conditionizr', $tdu . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0'); // Conditionizr
        // wp_enqueue_script('conditionizr'); // Enqueue it!

        wp_register_script('modernizr', $tdu . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1'); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!


        wp_register_script('featherlight',  '//cdn.rawgit.com/noelboss/featherlight/1.3.5/release/featherlight.min.js', array(), '1.3.5', true);
        wp_enqueue_script('featherlight'); // Enqueue it!

        wp_register_script('featherlightgallery', '//cdn.rawgit.com/noelboss/featherlight/1.4.0/release/featherlight.gallery.min.js', array(), '1.4.0', true);
        wp_enqueue_script('featherlightgallery'); // Enqueue it!


        wp_register_script('matchHeight', $tdu . '/js/jquery.matchHeight.js', array('jquery'), wf_version(), true); // Custom scripts
        wp_enqueue_script('matchHeight'); // Enqueue it!

        wp_register_script('bjqs', $tdu . '/js/bjqs-1.3.js', array('jquery'), wf_version(), true); // Custom scripts
        wp_enqueue_script('bjqs'); // Enqueue it!

        wp_register_script('bxslider', $tdu . '/js/jquery.bxslider.min.js', array('jquery'), wf_version(), true); // Custom scripts
        wp_enqueue_script('bxslider'); // Enqueue it!


        wp_register_script('scripts', $tdu . '/js/scripts.js', array('jquery'), wf_version(), true); // Custom scripts
        wp_enqueue_script('scripts'); // Enqueue it!
    }
}

// Load HTML5 Blank conditional scripts
function html5blank_conditional_scripts() {
    // if (is_page('pagenamehere')) {
    //     wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0'); // Conditional script(s)
    //     wp_enqueue_script('scriptname'); // Enqueue it!
    // }
}

// Load HTML5 Blank styles
function html5blank_styles() {
    $tdu =  get_template_directory_uri();

    // wp_register_style('normalize', $tdu . '/normalize.css', array(), '1.0', 'all');
    // wp_enqueue_style('normalize'); // Enqueue it!


    wp_register_style('bootstrap',  $tdu . '/bootstrap.css', array(), wf_version(), 'all');
    wp_enqueue_style('bootstrap'); // Enqueue it!

    wp_register_style('featherlight', '//cdn.rawgit.com/noelboss/featherlight/1.3.5/release/featherlight.min.css', array(), wf_version(), 'all');
    wp_enqueue_style('featherlight'); // Enqueue it!

    wp_register_style('featherlightgal', '//cdn.rawgit.com/noelboss/featherlight/1.4.0/release/featherlight.gallery.min.css', array(), wf_version(), 'all');
    wp_enqueue_style('featherlightgal'); // Enqueue it!

    wp_register_style('bjqs',  $tdu . '/bjqs.css', array(), wf_version(), 'all');
    wp_enqueue_style('bjqs'); // Enqueue it!

    wp_register_style('bxslider',  $tdu . '/jquery.bxslider.css', array(), wf_version(), 'all');
    wp_enqueue_style('bxslider'); // Enqueue it!


    wp_register_style('html5blank',  $tdu . '/style.css', array(), wf_version(), 'all');
    wp_enqueue_style('html5blank'); // Enqueue it!



}

// Register HTML5 Blank Navigation
function register_html5_menu() {
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'html5blank'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'html5blank'), // Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'html5blank') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '') {
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var) {
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist) {
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes) {
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
if (function_exists('register_sidebar')) {
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style() {
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination() {
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 70;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length) {
    return 70;
}



// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '') {
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
    $output = '<p>' . $output . '...</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more) {
    global $post;
    return '<a class="view-article" href="' . get_permalink($post->ID) . '">' . __('', 'html5blank') . '</a>';
}

// Remove Admin bar
function remove_admin_bar() {
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag) {
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions($html) {
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar($avatar_defaults) {
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments() {
    if (!is_admin()) {
        if (is_singular() and comments_open() and (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ('div' == $args['style']) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty($args['has_children']) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
        <?php if ('div' != $args['style']) : ?>
            <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
            <?php endif; ?>
            <div class="comment-author vcard">
                <?php if ($args['avatar_size'] != 0) echo get_avatar($comment, $args['180']); ?>
                <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
            </div>
            <?php if ($comment->comment_approved == '0') : ?>
                <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
                <br />
            <?php endif; ?>

            <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)) ?>">
                    <?php
                    printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'), '  ', '');
                                                                                                ?>
            </div>

            <?php comment_text() ?>

            <div class="reply">
                <?php comment_reply_link(array_merge($args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
            </div>
            <?php if ('div' != $args['style']) : ?>
            </div>
        <?php endif; ?>
    <?php }

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
// add_action('wp_print_scripts', 'html5blank_conditional_scripts'); // Add Conditional Page Scripts
// add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
add_action('init', 'create_post_type_actualite'); // Add our Actualite Custom Post Type
add_action('init', 'create_post_type_cours'); // Add our Cours Custom Post Type
add_action('init', 'create_post_type_atelier'); // Add our Atelier Custom Post Type
add_action('init', 'create_post_type_enseignant'); // Add our Enseignant Custom Post Type
add_action('init', 'create_post_type_eleve'); // Add our Enseignant Custom Post Type
add_action('init', 'create_post_type_video'); // Add our Video Custom Post Type
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

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
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
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
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/

// Create 1 Custom Post type for a Demo, called HTML5-Blank
function create_post_type_actualite() {
    register_taxonomy_for_object_type('category', 'actualite'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'actualite');
    register_post_type(
        'actualite', // Register Custom Post Type
        array(
            'labels' => array(
                'name' => __('Actualité', 'actualite'), // Rename these to suit
                'singular_name' => __('Actualité', 'actualite'),
                'add_new' => __('Ajouter', 'actualite'),
                'add_new_item' => __('Nouvelle Actualité', 'actualite'),
                'edit' => __('Modifier', 'actualite'),
                'edit_item' => __('Modifier Actualité', 'actualite'),
                'new_item' => __('Ajouter Actualité', 'actualite'),
                'view' => __('Afficher Actualité', 'actualite'),
                'view_item' => __('Afficher Actualité', 'actualite'),
                'search_items' => __('Rechercher Actualité', 'actualite'),
                'not_found' => __('Aucune actualité trouvée', 'actualite'),
                'not_found_in_trash' => __('Aucune actualité trouvée dans la corbeille', 'actualite')
            ),
            'public' => true,
            'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
            'has_archive' => true,
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail'
            ), // Go to Dashboard Custom HTML5 Blank post for supports
            'can_export' => true, // Allows export in Tools > Export
            'taxonomies' => array() // Add Category and Post Tags support
        )
    );
}

function create_post_type_cours() {
    register_taxonomy_for_object_type('category', 'cours'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'cours');
    register_post_type(
        'cours', // Register Custom Post Type
        array(
            'labels' => array(
                'name' => __('Cours', 'cours'), // Rename these to suit
                'singular_name' => __('Cours', 'cours'),
                'add_new' => __('Ajouter', 'cours'),
                'add_new_item' => __('Nouveau Cours', 'cours'),
                'edit' => __('Modifier', 'cours'),
                'edit_item' => __('Modifier Cours', 'cours'),
                'new_item' => __('Ajouter Cours', 'cours'),
                'view' => __('Afficher Cours', 'cours'),
                'view_item' => __('Afficher Cours', 'cours'),
                'search_items' => __('Rechercher Cours', 'cours'),
                'not_found' => __('Aucun cours trouvé', 'cours'),
                'not_found_in_trash' => __('Aucun cours trouvé dans la corbeille', 'cours')
            ),
            'public' => true,
            'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
            'has_archive' => true,
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail'
            ), // Go to Dashboard Custom HTML5 Blank post for supports
            'can_export' => true, // Allows export in Tools > Export
            'taxonomies' => array() // Add Category and Post Tags support
        )
    );
}
function create_post_type_atelier() {
    register_taxonomy_for_object_type('category', 'atelier'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'atelier');
    register_post_type(
        'atelier', // Register Custom Post Type
        array(
            'labels' => array(
                'name' => __('Atelier', 'atelier'), // Rename these to suit
                'singular_name' => __('Atelier', 'atelier'),
                'add_new' => __('Ajouter', 'atelier'),
                'add_new_item' => __('Nouveau Atelier', 'atelier'),
                'edit' => __('Modifier', 'atelier'),
                'edit_item' => __('Modifier Atelier', 'atelier'),
                'new_item' => __('Ajouter Atelier', 'atelier'),
                'view' => __('Afficher Atelier', 'atelier'),
                'view_item' => __('Afficher Atelier', 'atelier'),
                'search_items' => __('Rechercher Atelier', 'atelier'),
                'not_found' => __('Aucun atelier trouvé', 'atelier'),
                'not_found_in_trash' => __('Aucun atelier trouvé dans la corbeille', 'atelier')
            ),
            'public' => true,
            'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
            'has_archive' => true,
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail'
            ), // Go to Dashboard Custom HTML5 Blank post for supports
            'can_export' => true, // Allows export in Tools > Export
            'taxonomies' => array() // Add Category and Post Tags support
        )
    );
}

function create_post_type_enseignant() {
    register_taxonomy_for_object_type('category', 'enseignant'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'enseignant');
    register_post_type(
        'enseignant', // Register Custom Post Type
        array(
            'labels' => array(
                'name' => __('Enseignant', 'enseignant'), // Rename these to suit
                'singular_name' => __('Enseignant', 'enseignant'),
                'add_new' => __('Ajouter', 'enseignant'),
                'add_new_item' => __('Nouvel Enseignant', 'enseignant'),
                'edit' => __('Modifier', 'enseignant'),
                'edit_item' => __('Modifier Enseignant', 'enseignant'),
                'new_item' => __('Ajouter Enseignant', 'enseignant'),
                'view' => __('Afficher Enseignant', 'enseignant'),
                'view_item' => __('Afficher Enseignant', 'enseignant'),
                'search_items' => __('Rechercher Enseignant', 'enseignant'),
                'not_found' => __('Aucun enseignant trouvé', 'enseignant'),
                'not_found_in_trash' => __('Aucun enseignant trouvé dans la corbeille', 'enseignant')
            ),
            'public' => true,
            'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
            'has_archive' => true,
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail'
            ), // Go to Dashboard Custom HTML5 Blank post for supports
            'can_export' => true, // Allows export in Tools > Export
            'taxonomies' => array() // Add Category and Post Tags support
        )
    );
}

function create_post_type_eleve() {
    register_taxonomy_for_object_type('category', 'eleve'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'eleve');
    register_post_type(
        'eleve', // Register Custom Post Type
        array(
            'labels' => array(
                'name' => __('Élève', 'eleve'), // Rename these to suit
                'singular_name' => __('Élève', 'eleve'),
                'add_new' => __('Ajouter', 'eleve'),
                'add_new_item' => __('Nouvel Élève', 'eleve'),
                'edit' => __('Modifier', 'eleve'),
                'edit_item' => __('Modifier Élève', 'eleve'),
                'new_item' => __('Ajouter Élève', 'eleve'),
                'view' => __('Afficher Élève', 'eleve'),
                'view_item' => __('Afficher Élève', 'eleve'),
                'search_items' => __('Rechercher Élève', 'eleve'),
                'not_found' => __('Aucun élève trouvé', 'eleve'),
                'not_found_in_trash' => __('Aucun élève trouvé dans la corbeille', 'eleve')
            ),
            'public' => true,
            'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
            'has_archive' => false,
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail'
            ), // Go to Dashboard Custom HTML5 Blank post for supports
            'can_export' => true, // Allows export in Tools > Export
            'taxonomies' => array() // Add Category and Post Tags support
        )
    );
}


function create_post_type_video() {
    register_taxonomy_for_object_type('category', 'video'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'video');
    register_post_type(
        'video', // Register Custom Post Type
        array(
            'labels' => array(
                'name' => __('Video', 'video'), // Rename these to suit
                'singular_name' => __('Video', 'video'),
                'add_new' => __('Ajouter', 'video'),
                'add_new_item' => __('Nouvelle Video', 'video'),
                'edit' => __('Modifier', 'video'),
                'edit_item' => __('Modifier Video', 'video'),
                'new_item' => __('Ajouter Video', 'video'),
                'view' => __('Afficher Video', 'video'),
                'view_item' => __('Afficher Video', 'video'),
                'search_items' => __('Rechercher Video', 'video'),
                'not_found' => __('Aucun video trouvée', 'video'),
                'not_found_in_trash' => __('Aucun video trouvée dans la corbeille', 'video')
            ),
            'public' => true,
            'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
            'has_archive' => true,
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail'
            ), // Go to Dashboard Custom HTML5 Blank post for supports
            'can_export' => true, // Allows export in Tools > Export
            'taxonomies' => array() // Add Category and Post Tags support
        )
    );
}


// CHANGE EXCERPT LENGTH FOR DIFFERENT POST TYPES

function isacustom_excerpt_length($length) {
    global $post;
    if ($post->post_type == 'post')
        return 32;
    else if ($post->post_type == 'actualite')
        return 45;
    else if ($post->post_type == 'testimonial')
        return 75;
    else
        return 80;
}
add_filter('excerpt_length', 'isacustom_excerpt_length');


/*------------------------------------*\
	ShortCode Functions
\*------------------------------------*/
add_filter('acf/fields/wysiwyg/toolbars', 'continuums_wysiwyg_acf');

function continuums_wysiwyg_acf($editeur_acf) {
    array_push($editeur_acf['Full'][1], 'subscript');
    array_push($editeur_acf['Full'][1], 'superscript');


    return $editeur_acf;
}





function chilly_map($atts, $content = null) {

    $attributes = shortcode_atts(array(
        'location' => "Chemin de Pra 1993, Veysonnaz, Suisse"
    ), $atts);

    $g_key = 'AIzaSyAf2lNJES3d9R2xK4YfZrcDfR4c6wKCXx0';
    $chilly_map = '<div id="mapcontainer"></div><script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false&key=' . $g_key . '"></script>';

    $chilly_map .= "<script>
       var mapcontainer = jQuery('#mapcontainer');
        mapcontainer.css({
            width : '100%',
            height : 370
        })


        geocoder = new google.maps.Geocoder();
        var address = '"  . $attributes['location']   .   "';

      var myOptions = {
        zoom: 13,
        mapTypeControl: true,
        scrollwheel: false,
        navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
        mapTypeId: google.maps.MapTypeId.ROADMAP
      };
      var map = new google.maps.Map(mapcontainer.get(0), myOptions);


        geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          map.setCenter(results[0].geometry.location);
          var marker = new google.maps.Marker({
              map: map,
              position: results[0].geometry.location,
              title: 'FibreNat'
          });
        } else {
          alert('Geocode was not successful for the following reason: ' + status);
        }
        });




      </script>

    ";




    return $chilly_map;
}
add_shortcode('chilly_map', 'chilly_map');

// Shortcode Demo with Nested Capability
function html5_shortcode_demo($atts, $content = null) {
    return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Shortcode Demo with simple <h2> tag
function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
    return '<h2>' . $content . '</h2>';
}


function remove_private_title($title) {
    // Return only the title portion as defined by %s,
    // not the additional
    // 'Private: ' as added in core
    return "%s";
}
add_filter('protected_title_format', 'remove_private_title');


add_action('send_headers', 'send_frame_options_header', 10, 0);

// _e( '', 'html5blank' );
// __( '', 'html5blank' );

function generate_social_links($url, $title) {



    $copylink = __('Copy link', 'webfactor');
    $linkcopied = __('Le lien a été copié!', 'webfactor');

    $encoded_url = urlencode($url);
    $rand_id = 'social_links_' . rand(1000, 1000000);
    $str = '<div class="social_link_container" id="' . $rand_id . '">';

    $str .= '<a title="Facebook" class="social_link" href="https://www.facebook.com/sharer/sharer.php?u=' . $encoded_url . '" target="_blank" ><i class="fa fa-facebook-f" aria-hidden="true"></i><span>Facebook</span></a>';
    $str .= '<a title="Whatsapp" class="social_link social_link_whatsapp" href="whatsapp://send?text=' . $encoded_url . '" data-acti1on="share/whatsapp/share" target="_blank" ><i class="fa fa-whatsapp" aria-hidden="true"></i><span>Whatsapp</span></a>';
    $str .= '<a title="Email" class="social_link" href="mailto:%20?subject=ETM&body=' . format_text_for_mailto_param($title . ' - ' . $url)  .  '" target="_blank" ><i class="fa fa-envelope" aria-hidden="true"></i><span>Email</span></a>';
    $str .= '<a title="' . $copylink . '" class="social_link  copy_email_button" ><i class="fa fa-copy" aria-hidden="true"></i><span>' . $copylink . '</span><em>' . $linkcopied . '</em></a>';
    $str .= '<input type="text" class="input_for_copying" name="whatsapp_input" value="' . $url  . '" >';
    $str .= '</div><!-- END OF SOCIAL_LINK_CONTAINER -->';
    echo $str;
}

function format_text_for_mailto_param($text) {

    $text = str_replace("&rsquo;", "'", $text);
    $str = rawurlencode(htmlspecialchars_decode($text));
    return $str;
}






// /// add lang get param to all links
// NOT USED NOW. WE USE A JS HACK BECAUSE THIS DOESNT WORK WITH OUTPUT FROM ACF WYSIWYG FIELDS
// add_filter('post_link', 'wpse_add_current_requests_query_args', 10, 3);
// add_filter('page_link', 'wpse_add_current_requests_query_args', 10, 3);
// add_filter('attachment_link', 'wpse_add_current_requests_query_args', 10, 3);
// add_filter('post_type_link', 'wpse_add_current_requests_query_args', 10, 3);


// add_filter('acf_the_content', 'replace_content');
// function wpse_add_current_requests_query_args($permalink, $post)
// {


//     if (defined('ICL_LANGUAGE_CODE')) {
//         if (is_admin()) {
//             // we only want to modify the permalink URL on the front-end
//             return;
//         }

//         // for the purposes of this answer, we ignore the $post & $leavename
//         // params, but they are there in case you want to do conditional
//         // processing based on their value
//         $current_lang = ICL_LANGUAGE_CODE;
//         return (esc_url(add_query_arg('lang', $current_lang,  $permalink)));
//     }
// }

include('functions_inscription.php');


    ?>