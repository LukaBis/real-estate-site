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
    <form id="deleteHorizontalImage{{ $image->id }}Form" action="/home/property/horizontal-image" method="post">
      @csrf
      @method('delete')
      <input type="hidden" name="id" value="{{ $image->id }}">
      <button
        type="button"
        class="btn btn-outline-danger"
        data-toggle="modal" data-target="#deleteHorizontalImage{{ $image->id }}">
        {{ __('Delete image') }}
      </button>
    </form>
  </div>
</div>

<!-- Delete pop up -->
<div class="modal fade" id="deleteHorizontalImage{{ $image->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{__('Delete')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{ __('Are you sure you want to delete?') }}
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">{{__('Close')}}</button>
          <button
            type="button"
            onclick="event.preventDefault(); document.getElementById('deleteHorizontalImage{{ $image->id }}Form').submit();"
            class="btn btn-danger">
            {{__('Delete')}}
          </button>
      </div>
    </div>
  </div>
</div>


@endforeach
