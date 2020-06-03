<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class TemplateServices extends Controller
{
  public function pageHeader()
  {
    return get_field('page_header');
  }

  public function serviceSections()
  {
    return get_field('service_sections');
  }
}
