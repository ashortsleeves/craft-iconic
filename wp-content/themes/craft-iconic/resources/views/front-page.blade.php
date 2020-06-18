@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')


    @if($front_page['section1'])

      <section class="fp-section section1">
        <img src="{{$front_page['section1']['image']['url']}}" alt="{{$front_page['section1']['image']['title']}}" />

        <div class="content">
          <h1>{!!$front_page['section1']['title']!!}</h1>
          <p>{!!$front_page['section1']['content']!!}</p>
          <a class="btn btn-white btn-lg" href={{$front_page['section1']['button']['url']}}>{{$front_page['section1']['button']['title']}}</a>
        </div>
      </section>
    @endif

    @if($front_page['section2'])
      <section class="fp-section section2 jumbo-bg" style="background-image:url({{$front_page['section2']['background']['url']}})">
        <div class="container">
          <h1>{!! $front_page['section2']['title']!!}</h1>
          <div class="row">
            @foreach($front_page['section2']['repeater'] as $repeater)
              <div class="col-md-4">
                {!! $repeater['icon'] !!}
                <h2>{!! $repeater['title'] !!}</h2>
                <p>{!! $repeater['content'] !!}</p>
                @if($repeater['link'])
                  <a class="link" href="{{$repeater['link']['url']}}">{{$repeater['link']['title']}}</a>
                @endif
              </div>
            @endforeach
          </div>
        </div>
      </section>
    @endif

    @if($front_page['section3'])
      <section class="fp-section section3 jumbo-bg" style="background-image:url({{$front_page['section3']['background']['url']}})">
        <div class="container">
          <h1>{!!$front_page['section3']['title']!!}</h1>
          <div class="row">
            @foreach($front_page['section3']['repeater'] as $repeater)
              <div class="col-sm-6 col-md-4">
                <div class="cardstyle">
                  {!! $repeater['icon'] !!}
                  <h3>{!! $repeater['title'] !!}</h3>
                  <p>{!! $repeater['content'] !!}</p>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </section>
    @endif

    @if($front_page['section4'])
      <section class="fp-section section4 jumbo-bg" style="background-image:url({{$front_page['section4']['background']['url']}})">
        <div class="container">
          <h1>{!!$front_page['section4']['title']!!}</h1>
          <div class="portfolio-slick">
            @foreach($front_page['section4']['repeater'] as $repeater)
              <div class="portfolio-single">
                <img src="{{$repeater['image']['url']}}" alt="{{$repeater['image']['title']}}" />
                <div class="portfolio-single-inner">
                  <h2>{!! $repeater['title'] !!}</h2>
                  <span class="subtitle"><a href="https://{!! $repeater['subtitle'] !!}" target="_blank">{!! $repeater['subtitle'] !!}</a></span>
                  <p>{{$repeater['content']}}</p>
                  @if(!empty($repeater['button']))
                    <a href="{{$repeater['button']['url']}}" class="btn btn-lg">{{$repeater['button']['title']}}</a>
                  @endif
                </div>
              </div>
            @endforeach
          </div>
          <div class="slider-nav"></div>
        </div>
      </section>
    @endif

    @if($front_page['section5'])

      <section class="fp-section section5">
        <div class="container">
          <h1>{{$front_page['section5']['title']}}</h1>
          <div class="testimonial-slick">
            @foreach($front_page['section5']['repeater'] as $repeater)
              <div class="testimonial-wrap">
                <div class="testimonial-single">
                  <div class="img-wrap">
                    <img src="{{$repeater['image']['url']}}" alt="{{$repeater['image']['title']}}" />
                  </div>
                  <p><i>{{$repeater['content']}}</i></p>
                  <div class="name-wrap">
                    <i class="fas fa-quote-left"></i>
                    <div class="name-wrap-inner">
                      <h2>{{$repeater['name']}}</h2>
                      <i>{{$repeater['subtitle']}}</i>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </section>

    @endif
  @endwhile
@endsection
