<!--/ Property Single Star /-->
<section class="property-single nav-arrow-b">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property">
          @foreach($property->images as $image)
            <div class="carousel-item-b">
              <img src="{{ asset('images/property_images/horizontal_images/'.$image->filename) }}" alt="">
            </div>
          @endforeach
        </div>
        <div class="row justify-content-between">
          <div class="col-md-5 col-lg-4">
            <div class="property-price d-flex justify-content-center foo">
              <div class="card-header-c d-flex">
                <div class="card-box-ico">
                  <span class="ion-money">$</span>
                </div>
                <div class="card-title-c align-self-center">
                  <h5 class="title-c">{{ $property->price }}</h5>
                </div>
              </div>
            </div>
            <div class="property-summary">
              <div class="row">
                <div class="col-sm-12">
                  <div class="title-box-d section-t4">
                    <h3 class="title-d">{{ __('Quick Summary') }}</h3>
                  </div>
                </div>
              </div>
              <div class="summary-list">
                <ul class="list">
                  <li class="d-flex justify-content-between">
                    <strong>{{ __('Location') }}:</strong>
                    <span>{{ $property->city }}</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>{{ __('Property Type') }}:</strong>
                    <span>{{ $property->type->name }}</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>{{ __('Status') }}:</strong>
                    <span>{{ $property->status->status }}</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>{{ __('Area') }}:</strong>
                    <span>{{ $property->area }}m
                      <sup>2</sup>
                    </span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>{{ __('Beds') }}:</strong>
                    <span>{{ $property->beds }}</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>{{ __('Baths') }}:</strong>
                    <span>{{ $property->baths }}</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>{{ __('Garage') }}:</strong>
                    <span>{{ $property->garage }}</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-7 col-lg-7 section-md-t3">
            <div class="row">
              <div class="col-sm-12">
                <div class="title-box-d">
                  <h3 class="title-d">{{ __('Property Description') }}</h3>
                </div>
              </div>
            </div>
            <div class="property-description">
              @foreach(explode("\n", $property->description) as $paragraph)
              <p class="description color-text-a">
                {{ $paragraph }}
              </p>
              @endforeach
            </div>
            <div class="row section-t3">
              <div class="col-sm-12">
                <div class="title-box-d">
                  <h3 class="title-d">{{ __('Amenities') }}</h3>
                </div>
              </div>
            </div>
            <div class="amenities-list color-text-a">
              <ul class="list-a no-margin">
                @if($property->amenities->count() == 0)
                <p>{{ __('No amenities') }}</p>
                @endif
                @foreach($property->amenities as $amenity)
                  <li>{{ $amenity->name }}</li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>

      <!-- Agent start -->
      @if($property->agent)
      <div class="col-md-12">
        <div class="row section-t3">
          <div class="col-sm-12">
            <div class="title-box-d">
              <h3 class="title-d">{{ __('Contact Agent') }}</h3>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4">
            <img src="{{ asset('images/agent_images/'.$property->agent->image) }}" alt="" class="img-fluid">
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="property-agent">
              <h4 class="title-agent">{{ $property->agent->full_name }}</h4>
              <p class="color-text-a">
                {{ $property->agent->about }}
              </p>
              <ul class="list-unstyled">
                <li class="d-flex justify-content-between">
                  <strong>{{ __('Phone') }}:</strong>
                  <span class="color-text-a">{{ $property->agent->phone }}</span>
                </li>
                <li class="d-flex justify-content-between">
                  <strong>{{ __('Email') }}:</strong>
                  <span class="color-text-a">{{ $property->agent->email }}</span>
                </li>
              </ul>
              <div class="socials-a">
                <ul class="list-inline">
                  <li class="list-inline-item">
                    <a href="#">
                      <i class="fa fa-facebook" aria-hidden="true"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#">
                      <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#">
                      <i class="fa fa-instagram" aria-hidden="true"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#">
                      <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#">
                      <i class="fa fa-dribbble" aria-hidden="true"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>

        </div>
      </div>
      @endif
      <!-- End agent -->
    </div>
  </div>
</section>
<!--/ Property Single End /-->
