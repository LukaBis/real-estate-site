<!--/ Carousel Star /-->
<div class="intro intro-carousel">
  <div id="carousel" class="owl-carousel owl-theme">
    @foreach($properties as $property)
    <div class="carousel-item-a intro-item bg-image" style="background-image: url({{ asset('property_images/horizontal_images/'.$property->images[0]->filename) }})">
      <div class="overlay overlay-a"></div>
      <div class="intro-content display-table">
        <div class="table-cell">
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
                <div class="intro-body">
                  <p class="intro-title-top">{{ $property->city }}
                    </p>
                    <h1 class="intro-title mb-4">
                      <span class="color-b">{{ $property->house_number }} </span>
                      <br>{{ $property->street_name }}</h1>
                  <p class="intro-subtitle intro-price">
                    <a href="#"><span class="price-a">rent | $ {{ $property->rent }}</span></a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
<!--/ Carousel end /-->
