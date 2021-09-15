<!--/ Property Grid Star /-->
<section class="property-grid grid">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="grid-option">
          <form>
            <select class="custom-select">
              <option selected>All</option>
              <option value="1">New to Old</option>
              <option value="2">For Rent</option>
              <option value="3">For Sale</option>
            </select>
          </form>
        </div>
      </div>
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
                  <a href="#">{{ $property->house_number }}<br />
                    {{ $property->street_name }}</a>
                </h2>
              </div>
              <div class="card-body-a">
                <div class="price-box d-flex">
                  <span class="price-a">rent | $ {{ $property->rent }}</span>
                </div>
                <a href="property-single.html" class="link-a">{{ __('Click here to view') }}
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
    <div class="row">
      {{ $properties->links() }}
    </div>
  </div>
</section>
<!--/ Property Grid End /-->
