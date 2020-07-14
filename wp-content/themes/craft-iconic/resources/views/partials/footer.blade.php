<section class="contact-us jumbo-bg" style="background-image:url({{$footer['background']['url']}})">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-wd-10">
        <div class="row">
          <div class="col-md-6">
            <div class="footer-content">
              {!! $footer['content'] !!}
            </div>
            <div class="nap">
              <i class="fas fa-envelope"></i>
              <a target="_blank" href="mailto:{{$footer['site_info']['email']}}">{{$footer['site_info']['email']}}</a>

            </div>
            <div class="nap">
              <i class="fas fa-phone"></i>
              <a href="tel:{{$footer['site_info']['phone']}}">{{$footer['site_info']['phone']}}</a>
            </div>
            @if($footer['site_info']['state'])
              <div class="nap">
                <i class="fas fa-map-marker-alt"></i>

                <a target="_blank" href="https://www.google.com/maps/search/{{str_replace(" ", "+", $footer['site_info']['address'])}}+{{ str_replace(" ", "+", $footer['site_info']['town'])}}">{{$footer['site_info']['address']}}, {{$footer['site_info']['town']}}, {{$footer['site_info']['state']}} {{$footer['site_info']['zip']}}</a>
              </div>
            @endif
          </div>
          <div class="col-md-6">
            <div class="cardstyle contact-card">
              @php
               gravity_form($footer['form'], false);
              @endphp
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<footer class="content-info">
  <div class="container">
    <img src="@asset('images/footer-logo.png')" />
    @if (has_nav_menu('primary_navigation'))
      {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
    @endif
    <div class="socials">
      <a target="_blank" href="{{$footer['site_info']['facebook']}}"><i class="fab fa-facebook-f"></i></a>
      <a target="_blank" href="{{$footer['site_info']['twitter']}}"><i class="fab fa-twitter"></i></a>
      <a target="_blank" href="{{$footer['site_info']['linkedin']}}"><i class="fab fa-linkedin-in"></i></a>
    </div>
  </div>
</footer>
<div class="copyright">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-copyright">
        © Copyright {{ date("Y") }} - Craft Iconic - Web Design & Online Marketing
      </div>
    </div>
  </div>
</div>
<script type="application/ld+json">
{
  "@context": "http://schema.org/",
  "@type": "LocalBusiness",
  "name": "{{ get_bloginfo('name', 'display') }}",
  "telephone": "207-512-8934",
  "address":
  [
    "@type": "PostalAddress",
    "streetAddress": "{!! $footer['site_info']['address'] !!}",
    "addressLocality": "{!! $footer['site_info']['town'] !!}",
    "addressRegion": "{!! $footer['site_info']['state'] !!}",
    "postalCode": "{!! $footer['site_info']['zip'] !!}"
  ]
}
</script>
