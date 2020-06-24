<div class="jumbo-bg article-background" style="background-image:url({{$footer['background']['url']}})">
</div>
  <article @php post_class() @endphp>

    @if(has_post_thumbnail())
      <img class="portfolio-img" src="{{the_post_thumbnail_url()}}" />
    @endif
    <div class="portfolio-content">
      <header>
        <h1 class="entry-title">{!! get_the_title() !!}</h1>
        @if($project_fields['url'])
          <a class="url" target="_blank" href="https://{!!$project_fields['url']!!}">{!!$project_fields['url']!!}</a>
        @endif
      </header>
      <div class="entry-content">
        @php the_content() @endphp

        <ul class="client-details">
          @if($project_fields['services_provided'])
            <li><strong>Services Provided:</strong>
              <ul>
                @foreach($project_fields['services_provided'] as $service)
                  @if($service !== "More...")
                    <li>{{$service}}</li>
                  @endif

                @endforeach
                @foreach($project_fields['additional_services'] as $additional_service)
                  <li>{!!$additional_service['service']!!}</li>
                @endforeach
              </ul>
            </li>
          @endif
          @if($project_fields['technologies_used'])
            <li><strong>Technologies Used:</strong>
              <ul>
                @foreach($project_fields['technologies_used'] as $tech)
                  @if($tech !== "More...")
                    <li>{{$tech}}</li>
                  @endif
                @endforeach
                @if($project_fields['additional_technologies'])
                  @foreach($project_fields['additional_technologies'] as $addtech)
                    <li>{{$addtech['technology']}}</li>
                  @endforeach
                @endif
              </ul>
            </li>
          @endif

          @if($project_fields['client_details'])
            @php $deet = $project_fields['client_details']; @endphp
            @if($deet['phone'])
              <li><i class="fas fa-phone"></i>
               {{$deet['phone']}}</li>
            @endif
            <li>
              <i class="fas fa-map-marker-alt"></i>
              <div class="address">
                @if($deet['street'])
                  {{$deet['street']}} <br />
                @endif
                @if($deet['city'])
                  {{$deet['city']}},
                @endif
                @if($deet['state'])
                  {{$deet['state']}}
                @endif
                @if($deet['zip'])
                  {{$deet['zip']}}
                @endif
              </div>
            </li>
          @endif
        </ul>
      </div>
    </div>
  </article>
