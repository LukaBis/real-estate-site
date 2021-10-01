<form id="add-testemonial-form" data-parsley-validate="" novalidate=""
  method="POST"
  enctype="multipart/form-data"
  action="/home/testemonial">
  @csrf
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">{{ __('Name(s)') }}</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input value="" name="names" type="text" placeholder="Name" class="form-control">
        </div>
    </div>
    @foreach($languages as $language)
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">{{__('Text')}} ({{ strtoupper($language->iso) }})</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <textarea name="{{$language->iso}}-text" class="form-control"></textarea>
        </div>
    </div>
    @endforeach
    <div class="row mt-5">
        <div class="col-12">
          <h5 class="card-header p-0">{{ __('Upload images') }}</h5>
        </div>
    </div>
    <div class="form-group row mt-3">
      <div class="col-12">
        <label for="big-image">{{ __('Select a image') }} (image 650 x 450):</label><br>
        <input type="file" id="big-image" name="big-image">
      </div>
    </div>
    <div class="form-group row mt-3">
      <div class="col-12">
        <label for="mini-image">{{ __('Select small image') }} (image 80 x 80):</label><br>
        <input type="file" id="mini-image" name="mini-image">
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
