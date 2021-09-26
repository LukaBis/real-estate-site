<div class="row">
  <div class="col-12">
    <h2>{{ __('Vertical image') }}</h2>
  </div>
</div>

<div class="row">
  <div class="col-12 col-md-6">
    <img src="{{ asset('images/property_images/vertical_images/'.$property->vertical_image) }}" class="img-fluid" alt="">
  </div>
</div>

<form
  action="/home/property/vertical-image/{{ $property->id }}"
  enctype="multipart/form-data"
  method="post">
  @csrf
  @method('PUT')

  <div class="form-group row mt-3">
    <div class="col-12">
      <label for="vertical-image">{{ __('Select a file') }} (image 600 x 800):</label><br>
      <input type="file" id="vertical-image" name="verticalImage">
      <input type="hidden" name="propertyId" value="{{ $property->id }}">
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-12">
      <button
        type="submit"
        class="btn btn-space btn-primary">
        {{ __('Change image') }}
      </button>
    </div>
  </div>

</form>
