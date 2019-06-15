<?php

namespace App;

/**
 * Add <body> classes
 */
add_filter('body_class', function (array $classes) {
    /** Add page slug if it doesn't exist */
    if (is_single() || is_page() && !is_front_page()) {
        if (!in_array(basename(get_permalink()), $classes)) {
            $classes[] = basename(get_permalink());
        }
    }

    /** Add class if sidebar is active */
    if (display_sidebar()) {
        $classes[] = 'sidebar-primary';
    }

    /** Clean up class names for custom templates */
    $classes = array_map(function ($class) {
        return preg_replace(['/-blade(-php)?$/', '/^page-template-views/'], '', $class);
    }, $classes);

    return array_filter($classes);
});

/**
 * Add "… Continued" to the excerpt
 */
add_filter('excerpt_more', function () {
    return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
});

/**
 * Template Hierarchy should search for .blade.php files
 */
collect([
    'index', '404', 'archive', 'author', 'category', 'tag', 'taxonomy', 'date', 'home',
    'frontpage', 'page', 'paged', 'search', 'single', 'singular', 'attachment', 'embed'
])->map(function ($type) {
    add_filter("{$type}_template_hierarchy", __NAMESPACE__.'\\filter_templates');
});

/**
 * Render page using Blade
 */
add_filter('template_include', function ($template) {
    collect(['get_header', 'wp_head'])->each(function ($tag) {
        ob_start();
        do_action($tag);
        $output = ob_get_clean();
        remove_all_actions($tag);
        add_action($tag, function () use ($output) {
            echo $output;
        });
    });
    $data = collect(get_body_class())->reduce(function ($data, $class) use ($template) {
        return apply_filters("sage/template/{$class}/data", $data, $template);
    }, []);
    if ($template) {
        echo template($template, $data);
        return get_stylesheet_directory().'/index.php';
    }
    return $template;
}, PHP_INT_MAX);

/**
 * Render comments.blade.php
 */
add_filter('comments_template', function ($comments_template) {
    $comments_template = str_replace(
        [get_stylesheet_directory(), get_template_directory()],
        '',
        $comments_template
    );

    $data = collect(get_body_class())->reduce(function ($data, $class) use ($comments_template) {
        return apply_filters("sage/template/{$class}/data", $data, $comments_template);
    }, []);

    $theme_template = locate_template(["views/{$comments_template}", $comments_template]);

    if ($theme_template) {
        echo template($theme_template, $data);
        return get_stylesheet_directory().'/index.php';
    }

    return $comments_template;
}, 100);

/**
 * Customize ACF dir
 */
add_filter('acf/settings/dir', function ( $dir ) {

    $dir = get_stylesheet_directory_uri() . '/../vendor/advanced-custom-fields-pro-master/';

    return $dir;

});

/**
 * Hide ACF field group menu item
 */
add_filter('acf/settings/show_admin', '__return_false');

/**
 * include ACF
 */
include_once( get_stylesheet_directory() . '/../vendor/advanced-custom-fields-pro-master/acf.php' );

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Menu',
        'menu_title'    => 'Menu',
        'menu_slug'     => 'menu',
        'capability'    => 'edit_posts',
        'icon_url'      => 'dashicons-carrot',
        'position'      => 6,
        'redirect'      => false
    ));

    acf_add_options_page(array(
        'page_title'    => 'Testimonials',
        'menu_title'    => 'Testimonials',
        'menu_slug'     => 'testimonials',
        'capability'    => 'edit_posts',
        'icon_url'      => 'dashicons-format-status',
        'position'      => 7,
        'redirect'      => false
    ));

    acf_add_options_page(array(
        'page_title'    => 'Social Media',
        'menu_title'    => 'Social Media',
        'menu_slug'     => 'social-media',
        'capability'    => 'edit_posts',
        'icon_url'      => 'dashicons-share',
        'position'      => 8,
        'redirect'      => false
    ));
}
