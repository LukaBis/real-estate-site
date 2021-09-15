<!--/ About Star /-->
<section class="section-about">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="about-img-box">
          <img src="/img/slide-about-1.jpg" alt="" class="img-fluid">
        </div>
        <div class="sinse-box">
          <h3 class="sinse-title">EstateAgency
            <span></span>
            <br> {{ __('Sinse 2017') }}</h3>
          <p>{{ __('Art & Creative') }}</p>
        </div>
      </div>
      <div class="col-md-12 section-t8">
        <div class="row">
          <div class="col-md-6 col-lg-5">
            <img src="/img/about-2.jpg" alt="" class="img-fluid">
          </div>
          <div class="col-lg-2  d-none d-lg-block">
            <div class="title-vertical d-flex justify-content-start">
              <!-- <span>EstateAgency {{ __('Exclusive Property') }}</span> -->
            </div>
          </div>
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
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ About End /-->
