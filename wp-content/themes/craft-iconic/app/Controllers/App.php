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

    public function siteLogo()
    {
      return get_field('logo', 'option');
    }

    public function hero()
    {
      return get_field('hero', 'option');
    }

    public function footer()
    {
      $data = [
        'form'       => get_field('contact_form_footer','option'),
        'content'    => get_field('contact_footer_content','option'),
        'background' => get_field('contact_footer_background', 'option'),
        'site_info'  => get_field('site_info', 'option'),
      ];

      return $data;
    }

    public function basicSettings()
    {
      $data = [
        'hero_section' => get_field('hero_section'),
      ];

      return $data;
    }

    public function projectFields()
    {
      $data = [
        'featured_on_front_page' => get_field('featured_on_front_page'),
        'url' => get_field('url'),
        'case_study_button' => get_field('case_study_button'),
        'services_provided' => get_field('services_provided'),
        'additional_services' => get_field('additional_services'),
        'technologies_used' => get_field('technologies_used'),
        'additional_technologies' => get_field('additional_technologies'),
        'client_details' => get_field('client_details'),
      ];

      return $data;
    }

    // public function projectfields() {
    //   return get_field('portfolio_content', 'option');
    // }
    //
    // public function project
    public function portfolio() {
      $data = [
        'title'   => get_field('portfolio_title', 'option'),
        'content' => get_field('portfolio_content', 'option'),
      ];

      return $data;
    }

    // public function frontPage()
    // {
    //   $fp = [];
    //
    //   if(get_field('front_page_group')) {
    //     foreach(get_field('front_page_group') as $group) {
    //       $fp[] = $group;
    //     }
    //   } else {
    //     $fp = false;
    //   }
    //
    //   $data = [
    //     'fp' => $fp
    //   ];
    //
    //   return $data;
    // }
}
