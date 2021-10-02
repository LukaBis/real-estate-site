<!--/ About Star /-->
<section class="section-about">
  <div class="container">
    <div class="row">
      @if($about && $about->horizontal_image)
      <div class="col-sm-12">
        <div class="about-img-box">
          <img src="{{ asset('images/about_images/horizontal/'.$about->horizontal_image) }}" alt="" class="img-fluid">
        </div>
        <div class="sinse-box">
          <h3 class="sinse-title">EstateAgency
            <span></span>
            <br> {{ __('Sinse 2017') }}</h3>
          <p>{{ __('Art & Creative') }}</p>
        </div>
      </div>
      @endif
      <div class="col-md-12 section-t8">
        <div class="row">
          @if($about && $about->vertical_image)
          <div class="col-md-6 col-lg-5">
            <img src="{{ asset('images/about_images/vertical/'.$about->vertical_image) }}" alt="" class="img-fluid">
          </div>
          @endif
          <div class="col-lg-2  d-none d-lg-block">
            <div class="title-vertical d-flex justify-content-start">
              <!-- <span>EstateAgency {{ __('Exclusive Property') }}</span> -->
            </div>
          </div>
          @if($about)
          <div class="col-md-6 col-lg-5 section-md-t3">
            <div class="title-box-d">
              <h3 class="title-d">{{ $about->subtitle }}</h3>
            </div>
            @foreach(explode("\n", $about->text) as $paragraph)
              <p class="color-text-a">
                {{ $paragraph }}
              </p>
            @endforeach
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ About End /-->
