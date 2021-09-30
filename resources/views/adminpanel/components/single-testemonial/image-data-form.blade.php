<div class="row">
  <div class="col-12">
    <h2>{{ __('Testemonial big image') }}</h2>
  </div>
</div>

<!-- Big image form -->
<div class="row">
  <div class="col-12 col-md-6">
    <img src="{{ asset('images/testemonial_images/'.$testemonial->image_filename) }}" class="img-fluid" alt="">
  </div>
</div>

<form
  action="/home/testemonial/big-image"
  enctype="multipart/form-data"
  method="post">
  @csrf
  @method('PUT')

  <div class="form-group row mt-3">
    <div class="col-12">
      <label for="big-image">{{ __('Select a file') }} (image 650 x 450):</label><br>
      <input type="file" id="big-image" name="big-image">
      <input type="hidden" name="testemonialId" value="{{ $testemonial->id }}">
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

<!-- Mini image form -->

<div class="row mt-5">
  <div class="col-12">
    <h2>{{ __('Testemonial mini image') }}</h2>
  </div>
</div>

<div class="row">
  <div class="col-12 col-md-6">
    <img src="{{ asset('images/testemonial_images/mini/'.$testemonial->mini_image_filename) }}" class="img-fluid" alt="">
  </div>
</div>

<form
  action="/home/testemonial/mini-image"
  enctype="multipart/form-data"
  method="post">
  @csrf
  @method('PUT')

  <div class="form-group row mt-3">
    <div class="col-12">
      <label for="mini-image">{{ __('Select a file') }} (image 80 x 80):</label><br>
      <input type="file" id="mini-image" name="mini-image">
      <input type="hidden" name="testemonialId" value="{{ $testemonial->id }}">
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
