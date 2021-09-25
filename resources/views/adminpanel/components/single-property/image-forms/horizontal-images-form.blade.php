<div class="row mt-5">
  <div class="col-12">
    <h5>{{ __('Horizontal images') }}</h5>
  </div>
</div>

<form
  action="/home/property/horizontal-images/{{ $property->id }}"
  enctype="multipart/form-data"
  method="post">
  @csrf
  @method('PUT')

  <div class="row mt-3">
    <div class="col-12">
      <button
      type="submit"
      class="btn btn-space btn-primary">
      {{ __('Save changes') }}
    </button>
  </div>
</div>

</form>
