<section class="contact-us jumbo-bg" style="background-image:url({{$footer['background']['url']}})">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-wd-10 col-hd-8">
        <div class="row">
          <div class="col-md-6">
            <div class="footer-content">
              {!! $footer['content'] !!}
            </div>
            <div class="nap">
              <img src="@asset('images/mail.png')" />
              <a target="_blank" href="mailto:{{$footer['site_info']['email']}}">{{$footer['site_info']['email']}}</a>

            </div>
            <div class="nap">
              <img src="@asset('images/phone.png')" />
              <a href="tel:{{$footer['site_info']['phone']}}">{{$footer['site_info']['phone']}}</a>
            </div>
            <div class="nap">
              <img src="@asset('images/location.png')" />

              <a target="_blank" href="https://www.google.com/maps/search/{{str_replace(" ", "+", $footer['site_info']['address'])}}+{{ str_replace(" ", "+", $footer['site_info']['town'])}}">{{$footer['site_info']['address']}}, {{$footer['site_info']['town']}}, {{$footer['site_info']['state']}} {{$footer['site_info']['zip']}}</a>
            </div>
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
      <a href="{{$footer['site_info']['facebook']}}"><img src="@asset('images/fb.png')" /></a>
      <a href="{{$footer['site_info']['twitter']}}"><img src="@asset('images/twitter.png')" /></a>
      <a href="{{$footer['site_info']['linkedin']}}"><img src="@asset('images/linkedin.png')" /></a>
    </div>
  </div>
</footer>
<div class="copyright">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-copyright">
        © Copyright <?php echo date("Y"); ?> - Craft Iconic - Web Design & Online Marketing
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
