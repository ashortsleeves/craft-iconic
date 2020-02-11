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
}
