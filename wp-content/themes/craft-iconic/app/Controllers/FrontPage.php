<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class FrontPage extends Controller
{
  public function frontPage()
  {
    $data = [
      'featured_projects' => get_field('featured_projects'),
      'section1'          => get_field('stand_out'),
      'section2'          => get_field('make_things_easy'),
      'section3'          => get_field('quality_services'),
      'section4'          => get_field('portfolio'),
      'section5'          => get_field('testimonials'),
    ];

    return $data;
  }

  // public function projectQuery() {
  //   $post_type = 'project';
  //   $taxonomy = 'website-category';
  //
  //
  //   $terms = get_terms($taxonomy);
  //
  //   foreach($terms as $term) {
  //     $args = array(
  //       'post_type' => $post_type,
  //       'posts_per_page' => 5,
  //       'tax_query' => array(
  //         array(
  //           'taxonomy' => $taxonomy,
  //           'field' => 'slug',
  //           'terms' => $term->slug,
  //         )
  //       )
  //     );
  //
  //     $data[] = [
  //       'posts' => new \WP_Query($args),
  //       'term'  => $term,
  //     ];
  //   }
  //
  //   return $data;
  // }


  public function projectQuery() {
    $data = get_posts(array(
      'posts_per_page' => 5,
      'post_type'      => 'project',
      'meta_key'       => 'featured_on_front_page',
      'meta_value'     => '1',
    ));

    return $data;
  }
}
