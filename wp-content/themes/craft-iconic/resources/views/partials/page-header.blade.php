<section class="fp-section hero jumbo-bg responsive-hero">
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
</section>

<div class="page-header">
  <h1>{!! App::title() !!}</h1>
</div>
