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
