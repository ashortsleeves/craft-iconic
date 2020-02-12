@extends('layouts.app')

@section('content')
  <div class="blog-wrap">
    @if (!have_posts())
      <div class="alert alert-warning">
        {{ __('Sorry, no results were found.', 'sage') }}
      </div>
      {!! get_search_form(false) !!}
    @endif
    <div class="container sm-container posts-container">
      <div class="row">
        <div class="col-md-8">
          @while (have_posts()) @php the_post() @endphp
            @include('partials.content-'.get_post_type())
          @endwhile
        </div>
        <div class="col-md-4">
          <div class="cardstyle">
              @php dynamic_sidebar('sidebar-primary') @endphp
          </div>
        </div>
      </div>
    </div>

    {!! get_the_posts_navigation() !!}
  </div>
@endsection
