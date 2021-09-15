<!--/ Testimonials Star /-->
<section class="section-testimonials section-t8 nav-arrow-a">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="title-wrap d-flex justify-content-between">
          <div class="title-box">
            <h2 class="title-a">{{ __('Testimonials') }}</h2>
          </div>
        </div>
      </div>
    </div>
    <div id="testimonial-carousel" class="owl-carousel owl-arrow">
      @foreach($testemonials as $testemonial)
      <div class="carousel-item-a">
        <div class="testimonials-box">
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <div class="testimonial-img">
                <img src="{{ asset('images/testemonial_images/'.$testemonial->image_filename) }}" alt="" class="img-fluid">
              </div>
            </div>
            <div class="col-sm-12 col-md-6">
              <div class="testimonial-ico">
                <span class="ion-ios-quote"></span>
              </div>
              <div class="testimonials-content">
                <p class="testimonial-text">
                  {{ $testemonial->text }}
                </p>
              </div>
              <div class="testimonial-author-box">
                <img src="{{ asset('images/testemonial_images/mini/'.$testemonial->mini_image_filename) }}" alt="" class="testimonial-avatar">
                <h5 class="testimonial-author">{{ $testemonial->names }}</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
<!--/ Testimonials End /-->
