<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('sage/main.css', asset_path('styles/main.css'), false, null);
    wp_enqueue_script('sage/main.js', asset_path('scripts/main.js'), ['jquery'], null, true);

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}, 100);

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage')
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/_tinymce.scss
     */
    add_editor_style(asset_path('styles/main.css'));
}, 20);

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ];
    register_sidebar([
        'name'          => __('Primary', 'sage'),
        'id'            => 'sidebar-primary'
    ] + $config);
    register_sidebar([
        'name'          => __('Footer', 'sage'),
        'id'            => 'sidebar-footer'
    ] + $config);
});

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});

/**
 * Setup Sage options
 */
add_action('after_setup_theme', function () {
    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });

    /**
     * Add Blade to Sage container
     */
    sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
    });

    /**
     * Create @asset() Blade directive
     */
    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    });
});

/**
 * Adding custom post Categories
 */
add_action('init', function() {

    // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => __( 'Projects' ),
            'singular_name'       => __( 'Project' ),
            'menu_name'           => __( 'Projects'),
            'parent_item_colon'   => __( 'Parent Projects'),
            'all_items'           => __( 'All Projects'),
            'view_item'           => __( 'View Project'),
            'add_new_item'        => __( 'Add New Project'),
            'archives'            => __( 'Project Archives', 'text_domain' ),
            'add_new'             => __( 'Add New'),
            'edit_item'           => __( 'Edit Project'),
            'update_item'         => __( 'Update Project'),
            'search_items'        => __( 'Search Projects'),
            'not_found'           => __( 'Not Found'),
            'not_found_in_trash'  => __( 'Not found in Trash'),
        );

    // Set other options for Custom Post Type

        $args = array(
            'label'               => __( 'project' ),
            'description'         => __( 'Projects' ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'excerpt','thumbnail', 'revisions', 'custom-fields', ),
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
            'capability_type'     => 'page',
            'menu_icon'   => 'dashicons-carrot',

            // This is where we add taxonomies to our CPT
            'taxonomies'          => array('sitecategories' ),
        );

        // Registering your Custom Post Type
        register_post_type( 'project', $args );


// Register Site Type Taxonomy
  $labels = array(
		'name'                       => _x( 'Site Categories', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Site Category', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Site Categories', 'text_domain' ),
		'all_items'                  => __( 'All Site Categories', 'text_domain' ),
		'parent_item'                => __( 'Parent Site Category', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Site Category:', 'text_domain' ),
		'new_item_name'              => __( 'New Site Category Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Site Category', 'text_domain' ),
		'edit_item'                  => __( 'Edit Site Category', 'text_domain' ),
		'update_item'                => __( 'Update Site Category', 'text_domain' ),
		'view_item'                  => __( 'View Site Category', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate Site Categories with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove Site Category', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Site Categories', 'text_domain' ),
		'search_items'               => __( 'Search Site Categories', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No Site Categories', 'text_domain' ),
		'items_list'                 => __( 'Site Categories list', 'text_domain' ),
		'items_list_navigation'      => __( 'Site Categories list navigation', 'text_domain' ),
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
	);
	register_taxonomy( 'sitecategories', array( 'project' ), $args );

});
