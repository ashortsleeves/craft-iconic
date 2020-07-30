<article @php post_class() @endphp>
  @if(has_post_thumbnail())
    <img class="portfolio-img" src="{{the_post_thumbnail_url()}}" alt="{{get_the_post_thumbnail_caption()}}"/>
  @endif
  <div class="portfolio-content">
    <h2 class="entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h2>
    <div class="entry-summary">
      @php the_excerpt() @endphp
    </div>
    <a href="{{ get_permalink() }}" class="btn">Learn More</a>
  </div>
</article>
