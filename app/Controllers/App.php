<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class App extends Controller
{
    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
    }

     /**
     * ACF Testimonials with blade controler
     */
    public function testimonials() {

      // Initialize the return variable
      $return = '';

      // Get the appropriate testimonials
      if(get_field( 'testimonials', 'options' )) {
        return array_map(function($testimonials_item) {
            return [
              'name' => $testimonials_item['name'] ?? null,
              'text' => $testimonials_item['text'] ?? null,
            ];
        }, get_field('testimonials', 'options') ?? []);
      }
      else {
        echo 'Nothing found'; 
      }
    }

    /**
     * Social Media ACF
     */
    public function social_media() {

      // Initialize the return variable
      $return = '';

      //Social Media
      $facebook = get_field('facebook', 'options');
      $twitter = get_field('twitter', 'options');
      $instagram = get_field('instagram', 'options');
      $linkedin = get_field('linkedin', 'options');
      $yelp = get_field('yelp', 'options');
      $trip_advisor = get_field('trip_advisor', 'options');

      // $return .= \App\template('partials.social-media');

      $return .= \App\template('partials.social-media', [
          'facebook' => $facebook, 
          'twitter' => $twitter,
          'instagram' => $instagram,
          'linkedin' => $linkedin,
          'yelp' => $yelp,
          'trip_advisor' => $trip_advisor,
        ]
      );

      // Always return
      return $return;
    }
}

