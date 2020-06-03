{{--
  Template Name: Services Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @if($page_header)
      <section class="hero jumbo-bg responsive-hero services-hero" style="background-image:url({{$page_header['background']['url']}})">
        <div class="container">
          <div class="row">
            <div class="col-xl-5 col-md-6 col-content">
              <h1>{!!$page_header['title']!!}</h1>
              <a class='btn btn-lg' href="{{$page_header['button']['url']}}">{!!$page_header['button']['title']!!}</a>
            </div>
            <div class="col-xl-7 col-md-6 col-img">
              <img src="{!!$page_header['image']['url']!!}" />
            </div>
          </div>
        </div>
      </section>
    @endif
    @if($service_sections)
      @foreach($service_sections as $section)
        <section class="service-section">
          <div class="jumbo-bg" style="background-image:url({{$section['background']['url']}})">
            
          </div>
          <div class="container">
            <div class="content">
              <div class="flex">
                {!!$section['icon']!!}
                <h2 class="h1">{!!$section['title']!!}</h2>
              </div>
              <p>{!!$section['content']!!}</p>
            </div>
          </div>
        </section>
      @endforeach
    @endif
  @endwhile
@endsection
