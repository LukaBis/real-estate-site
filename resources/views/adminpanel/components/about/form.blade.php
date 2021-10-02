<form id="add-about-form" data-parsley-validate="" novalidate=""
  method="POST"
  enctype="multipart/form-data"
  action="/home/about">
  @csrf
    @foreach($languages as $language)
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">{{__('Title')}} ({{ strtoupper($language->iso) }})</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <textarea name="{{$language->iso}}-title" class="form-control">@if($about->count()){{ $about[0]->translate($language->iso)->title }}@endif</textarea>
        </div>
    </div>
    @endforeach
    @foreach($languages as $language)
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">{{__('Subtitle')}} ({{ strtoupper($language->iso) }})</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <textarea name="{{$language->iso}}-subtitle" class="form-control">@if($about->count()){{ $about[0]->translate($language->iso)->subtitle }}@endif</textarea>
        </div>
    </div>
    @endforeach
    @foreach($languages as $language)
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">{{__('Text')}} ({{ strtoupper($language->iso) }})</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <textarea name="{{$language->iso}}-text" class="form-control">@if($about->count()){{ $about[0]->translate($language->iso)->text }}@endif</textarea>
        </div>
    </div>
    @endforeach
    <div class="row mt-5">
        <div class="col-12">
          <h5 class="card-header p-0">{{ __('Upload images') }}</h5>
        </div>
    </div>
    @if($about->count())
    <div class="row mt-4">
      <div class="col-12 col-md-6">
        <img src="{{ asset('images/about_images/horizontal/'.$about[0]->horizontal_image) }}" class="img-fluid" alt="">
      </div>
    </div>
    @endif
    <div class="form-group row mt-3">
      <div class="col-12">
        <label for="horizontal-image">{{ __('Select horizontal image') }} (image 1920 x 960):</label><br>
        <input type="file" id="horizontal-image" name="horizontal-image">
      </div>
    </div>
    @if($about->count())
    <div class="row mt-4">
      <div class="col-12 col-md-6">
        <img src="{{ asset('images/about_images/vertical/'.$about[0]->vertical_image) }}" class="img-fluid" alt="">
      </div>
    </div>
    @endif
    <div class="form-group row mt-3">
      <div class="col-12">
        <label for="vertical-image">{{ __('Select vertical image') }} (image 600 x 800):</label><br>
        <input type="file" id="vertical-image" name="vertical-image">
      </div>
    </div>
    <div class="form-group row text-right">
        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
            <button
              type="submit"
              class="btn btn-space btn-primary">
              {{ __('Save') }}
            </button>
        </div>
    </div>
</form>
