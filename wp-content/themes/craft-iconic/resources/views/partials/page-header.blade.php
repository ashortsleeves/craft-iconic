<section class="hero jumbo-bg responsive-hero @if(is_front_page())hero-fp @endif">
  <div class="container">
    <div id="typed-strings">
      @if($hero['typed'])
        @foreach($hero['typed'] as $typed)
          <p>{{$typed['phrase']}}</p>
        @endforeach
      @endif
   </div>
   <div class="cta">
     <span class="cta-text">{{$hero['title']}}</span>
     <span id="typed"></span>
     @if($hero['button'])
       <a class="btn" href="{!! $hero['button']['url'] !!}">{{$hero['button']['title']}}</a>
     @endif
   </div>
  </div>
  @if($front_page['featured_projects'])
    <img class="featured-projects" src="{{$front_page['featured_projects']['url']}}" alt="{{$front_page['featured_projects']['title']}}" />
  @endif
</section>
