@extends('layouts.app')

@section('content')
  <div class="blog-wrap">
    @if (!have_posts())
      <div class="alert alert-warning">
        {{ __('Sorry, no results were found.', 'sage') }}
      </div>
      {!! get_search_form(false) !!}
    @endif
    <div class="container sm-container projects-container">
      @while(have_posts()) @php the_post() @endphp
        @include('partials.content-single-'.get_post_type())
      @endwhile
    </div>

    {!! get_the_posts_navigation() !!}
  </div>
@endsection
