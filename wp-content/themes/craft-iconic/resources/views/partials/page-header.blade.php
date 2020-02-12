@if($basic_settings['hero_section'])
  <section class="hero jumbo-bg responsive-hero @if(is_front_page())hero-fp @endif" @if(!has_post_thumbnail($page_id))style="background-image:url({{$hero['global_background']['url']}})"@endif>
    <div class="container @if(!is_front_page())sm-container @endif">
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
         <a class="btn" href="{!! $hero['button']['url'] !!}">{{$hero['button']['title']}}</a>
       @endif
     </div>
    </div>
    @if($front_page['featured_projects'])
      <img class="featured-projects" src="{{$front_page['featured_projects']['url']}}" alt="{{$front_page['featured_projects']['title']}}" />
    @endif
  </section>
@endif
