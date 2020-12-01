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
         <a class="btn btn-lg" href="{!! $hero['button']['url'] !!}">{{$hero['button']['title']}}</a>
       @endif
     </div>
     @if($front_page['featured_projects'])
       <div class="image-container">
         <img style="opacity: 0;" class="image-portfolio left" src="{{$front_page['featured_projects']['left']['url']}}" />
         <img style="opacity: 0;" class="image-portfolio primary" src="{{$front_page['featured_projects']['primary']['url']}}"  />
         <img style="opacity: 0;" class="image-portfolio right" src="{{$front_page['featured_projects']['right']['url']}}" />
       </div>
     @endif
    </div>
  </section>
@endif
