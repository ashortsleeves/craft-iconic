{{--
  Template Name: Contact Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    <section class="contact-page">
      <div class="container sm-container">
        <h1>{!! App::title() !!}</h1>
      </div>
    </section>
  @endwhile
@endsection
