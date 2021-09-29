<form id="add-agent-form" data-parsley-validate="" novalidate=""
  method="POST"
  enctype="multipart/form-data"
  action="/home/agent/">
  @csrf
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">{{ __('Full name') }}</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input value="" name="full_name" type="text" placeholder="Full name" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">{{ __('Phone number') }}</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input value="" name="phone" type="text" placeholder="Phone number" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">{{ __('Email') }}</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input value="" type="email" name="email" placeholder="Email" class="form-control">
        </div>
    </div>
    @foreach($languages as $language)
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">{{__('About')}} ({{ strtoupper($language->iso) }})</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <textarea name="{{$language->iso}}-description" class="form-control"></textarea>
        </div>
    </div>
    @endforeach
    <div class="form-group row">
        <label class="col-sm-3 col-form-label text-sm-right">{{ __('Properties') }}</label>
        <div class="col-sm-6">
            <div class="custom-controls-stacked">
              @foreach($properties as $property)
                <label class="custom-control custom-checkbox">
                    <input
                    type="checkbox" value="{{$property->id}}" name="property{{$property->id}}" data-parsley-multiple="group1" data-parsley-errors-container="#error-container2" class="custom-control-input">
                    <span class="custom-control-label">{{ $property->city }}, {{ $property->street_name }}, {{ $property->house_number }}</span>
                </label>
              @endforeach
                <div id="error-container2"></div>
            </div>
        </div>
    </div>
    <div class="form-group row">
      <div class="custom-file mb-3 col-10 col-md-6 ml-auto mr-auto">
          <input type="file" name="image" class="custom-file-input" id="customFile">
          <label class="custom-file-label" for="customFile">Select image (800x896)</label>
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
