<article @php post_class('cardstyle') @endphp>
  @if(has_post_thumbnail())
    <div class="img-wrap jumbo-bg" style="background-image: url({{ the_post_thumbnail_url() }});">
    </div>
  @endif
  <header>
    <h2 class="entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h2>
    <h3 class="search-type">
      @if(get_post_type() === 'post')
        Article
      @elseif(get_post_type() === 'project')
        Portfolio
      @else
        {!!get_post_type()!!}
      @endif

    </h3>
  </header>
  <div class="entry-summary">
    @php the_excerpt() @endphp
  </div>
</article>
