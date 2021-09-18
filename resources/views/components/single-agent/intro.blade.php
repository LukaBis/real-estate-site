<!--/ Intro Single star /-->
<section class="intro-single">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-8">
        <div class="title-single-box">
          <h1 class="title-single">{{ $agent->full_name }}</h1>
          <span class="color-text-a">{{ __('EstateAgency Agent') }}</span>
        </div>
      </div>
      <div class="col-md-12 col-lg-4">
        <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/{{ app()->currentLocale() }}/">
                {{ __('Home') }}
              </a>
            </li>
            <li class="breadcrumb-item">
              <a href="/{{ app()->currentLocale() }}/agents">
                {{ __('Agents') }}
              </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              {{ $agent->full_name }}
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</section>
<!--/ Intro Single End /-->
