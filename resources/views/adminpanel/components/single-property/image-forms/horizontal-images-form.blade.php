<div class="row mt-5">
  <div class="col-12">
    <h2>{{ __('Horizontal images') }}</h2>
  </div>
</div>

@foreach($property->images as $image)
<div class="row mt-4">
  <div class="col-12 col-md-7">
    <img src="{{ asset('images/property_images/horizontal_images/'.$image->filename) }}" alt="" class="img-fluid">
  </div>
</div>
<div class="row mt-2">
  <div class="col-12">
    <form action="/home/property/horizontal-image" method="post">
      @csrf
      @method('delete')
      <input type="hidden" name="id" value="{{ $image->id }}">
      <button type="submit" name="button" class="btn btn-outline-danger">
        Delete image
      </button>
    </form>
  </div>
</div>
@endforeach
