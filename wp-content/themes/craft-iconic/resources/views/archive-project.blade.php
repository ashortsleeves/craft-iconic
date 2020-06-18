@extends('layouts.app')

@section('content')
  <section class="hero jumbo-bg responsive-hero portfolio-hero" style="background-image:url({{$hero['global_background']['url']}})">
    <div class="container">
      <h1>{!!$portfolio['title']!!}</h1>
      @if($hero['button'])
        <a class="btn" href="{!! $hero['button']['url'] !!}">{{$hero['button']['title']}}</a>
      @endif
    </div>
  </section>

  <div class="blog-wrap">
    @if (!have_posts())
      <div class="alert alert-warning">
        {{ __('Sorry, no results were found.', 'sage') }}
      </div>
      {!! get_search_form(false) !!}
    @endif
    <div class="container sm-container projects-container">
      @while (have_posts()) @php the_post() @endphp
        @include('partials.content-'.get_post_type())
      @endwhile

      <div class="primary_pagination">

        @php
        //Wordpress Pagination
        global $wp_query;
        $big = 999999999; // need an unlikely integer
        echo paginate_links( array(
          'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
          'format' => '?paged=%#%',
          'current' => max( 1, get_query_var('paged') ),
          'mid_size' => 2,
          'prev_text' => '« <span class="hide-text">Previous</span>',
          'next_text' => '<span class="hide-text">Next</span> »',
          'total' => $wp_query->max_num_pages
        ) );
        @endphp
      </div>
    </div>
  </div>
@endsection
