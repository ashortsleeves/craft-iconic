{{--
  Template Name: About Us Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @if($basic_settings['hero_section'])
      <section class="hero about-us-hero" @if(!has_post_thumbnail($page_id))style="background-image:url({{$hero['global_background']['url']}})"@endif>
        @if(has_post_thumbnail($page_id))
          <img src="{{get_the_post_thumbnail_url()}}" class="about-us-photo" alt="cellphone" />
          <div class="website-container">
            <img src="http://crafticonic.test/wp-content/uploads/2020/12/genrev-site.jpg" class="website"/>
          </div>
        @endif
        <div class="container sm-container">
          <div id="typed-strings">
            @if($hero['typed'])
              @foreach($hero['typed'] as $typed)
                <p>{{$typed['phrase']}}</p>
              @endforeach
            @endif
         </div>
         <div class="cta">
           <span class="cta-text">{{$hero['title']}}</span>
           <div class="typed-wrapper">
             <span id="typed"></span>
           </div>
           @if($hero['button'])
             <a class="btn btn-lg" href="{!! $hero['button']['url'] !!}">{{$hero['button']['title']}}</a>
           @endif
         </div>
        </div>
      </section>
    @endif
    @include('partials.content-page')
  @endwhile
@endsection
