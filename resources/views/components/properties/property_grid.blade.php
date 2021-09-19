<!--/ Property Grid Star /-->
<section class="property-grid grid">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="grid-option">
          <form action="/{{ app()->getLocale() }}/properties" method="GET" id="filter">
            @csrf
            <select class="custom-select" name="status">
              <option
               class="filter"
               value="All"
               @if($current_status_filter == null) selected @endif>
                {{ __('All') }}
              </option>
              @foreach($statuses as $status)
                  <option
                    value="{{ $status->status_id }}"
                    @if($current_status_filter == $status->status_id) selected @endif
                    class="filter">
                      {{ $status->status }}
                  </option>
              @endforeach
            </select>
          </form>
        </div>
      </div>

      @if($properties->count() == 0)
        <p>{{ __('No results for this search') }}</p>
      @endif

      @foreach($properties as $property)
      <div class="col-md-4">
        <div class="card-box-a card-shadow">
          <div class="img-box-a">
            <img src="{{ asset('images/property_images/vertical_images/'.$property->vertical_image) }}" alt="" class="img-a img-fluid">
          </div>
          <div class="card-overlay">
            <div class="card-overlay-a-content">
              <div class="card-header-a">
                <h2 class="card-title-a">
                  <a href="/{{ app()->getLocale() }}/property/{{ $property->id }}">
                    {{ $property->house_number }}<br />
                    {{ $property->street_name }}</a>
                </h2>
              </div>
              <div class="card-body-a">
                <div class="price-box d-flex">
                  <span class="price-a">rent | $ {{ $property->rent }}</span>
                </div>
                <a href="/{{ app()->getLocale() }}/property/{{ $property->id }}" class="link-a">
                  {{ __('Click here to view') }}
                  <span class="ion-ios-arrow-forward"></span>
                </a>
              </div>
              <div class="card-footer-a">
                <ul class="card-info d-flex justify-content-around">
                  <li>
                    <h4 class="card-info-title">{{ __('Area') }}</h4>
                    <span>{{ $property->area }}m
                      <sup>2</sup>
                    </span>
                  </li>
                  <li>
                    <h4 class="card-info-title">{{ __('Beds') }}</h4>
                    <span>{{ $property->beds }}</span>
                  </li>
                  <li>
                    <h4 class="card-info-title">{{ __('Baths') }}</h4>
                    <span>{{ $property->baths }}</span>
                  </li>
                  <li>
                    <h4 class="card-info-title">{{ __('Garages') }}</h4>
                    <span>{{ $property->garage }}</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
  </div>
  <div class="row">
    {{ $properties->links() }}
  </div>
</section>
<!--/ Property Grid End /-->
