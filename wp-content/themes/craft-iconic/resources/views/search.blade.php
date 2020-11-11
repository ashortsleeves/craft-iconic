@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
    <div class="container container-sm container-404">
      <h1><i class="fas fa-telescope"></i> {{ __('Sorry, no results were found.', 'sage') }}</h1>
      {!! get_search_form(false) !!}
      <button class="btn btn-lg"  onclick="goBack()"><i class="fas fa-arrow-left"></i> Go Back</button>

      <script>
      function goBack() {
        window.history.back();
      }
      </script>

    </div>
  @else
    <div class="container sm-container posts-container">
      <h1><i class="fas fa-telescope"></i> Search Results</h1>

      <div class="row">
        <div class="col-md-8">
          @while (have_posts()) @php the_post() @endphp
            @include('partials.content-search')
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
  @endif


@endsection
