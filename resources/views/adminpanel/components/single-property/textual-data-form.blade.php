<form id="property-form" data-parsley-validate="" novalidate=""
  method="POST"
  action="/home/property/{{ $property->id }}">
  @csrf
  @method('PUT')
    <div class="form-group">
      <div style="display:none">
        <input value="{{ $property->id }}" name="propertyId" class="form-control">
      </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">{{ __('Street name') }}</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input value="{{ $property->street_name }}" name="street_name" type="text" placeholder="Street name" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">{{ __('House number') }}</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input value="{{ $property->house_number }}" name="house_number" type="number" placeholder="Number" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">{{ __('City') }}</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input value="{{ $property->city }}" type="text" name="city" placeholder="Max 50 chars." class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">{{ __('Price') }} (USD)</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input value="{{ $property->price }}" name="price" type="number" placeholder="Number" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">{{ __('Area') }} (m<sup>2</sup>)</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input value="{{ $property->area }}" name="area" type="number" placeholder="Number" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">{{ __('Beds') }}</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input value="{{ $property->beds }}" name="beds" type="number" placeholder="Number" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">{{ __('Baths') }}</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input value="{{ $property->baths }}" name="baths" type="number" placeholder="Number" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">{{ __('Garage') }}</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input value="{{ $property->garage }}" name="garage" type="number" placeholder="Number" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">{{ __('Rent') }} (USD)</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input value="{{ $property->rent }}" name="rent" type="number" placeholder="Number" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label text-sm-right">{{ __('Status') }}</label>
        <div class="col-sm-6">
            <div class="custom-controls-stacked">
              @foreach($statuses as $status)
                <label class="custom-control custom-checkbox">
                    <input
                    @if($property->status_id == $status->status_id)
                     checked
                    @endif
                     name="status" type="radio" data-parsley-multiple="groups" value="{{$status->status_id}}" data-parsley-mincheck="2" data-parsley-errors-container="#error-container1" class="custom-control-input">
                    <span class="custom-control-label">{{ $status->status }}</span>
                </label>
              @endforeach
                <div id="error-container1"></div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label text-sm-right">{{ __('Type') }}</label>
        <div class="col-sm-6">
            <div class="custom-controls-stacked">
              @foreach($types as $type)
                <label class="custom-control custom-checkbox">
                    <input type="radio"
                    @if($property->type_id == $type->id)
                      checked
                    @endif
                    value="{{$type->id}}" name="type" data-parsley-multiple="group1" data-parsley-errors-container="#error-container2" class="custom-control-input">
                    <span class="custom-control-label">{{ $type->name }}</span>
                </label>
              @endforeach
                <div id="error-container2"></div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label text-sm-right">{{ __('Agent') }}</label>
        <div class="col-sm-6">
            <div class="custom-controls-stacked">
              @foreach($agents as $agent)
                <label class="custom-control custom-checkbox">
                    <input
                    @if($property->agent_id == $agent->id)
                      checked
                    @endif
                    type="radio" value="{{$agent->id}}" name="agent" data-parsley-multiple="group1" data-parsley-errors-container="#error-container2" class="custom-control-input">
                    <span class="custom-control-label">{{ $agent->full_name }}</span>
                </label>
              @endforeach
                <div id="error-container2"></div>
            </div>
        </div>
    </div>
    @foreach($languages as $language)
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">About ({{ strtoupper($language->iso) }})</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <textarea name="{{$language->iso}}-description" class="form-control">{{ $property->translate($language->iso)->description }}</textarea>
        </div>
    </div>
    @endforeach
    <div class="form-group row">
        <label class="col-sm-3 col-form-label text-sm-right">{{ __('Amenities') }}</label>
        <div class="col-sm-6">
            <div class="custom-controls-stacked">
              @foreach($amenities as $amenity)
                <label class="custom-control custom-checkbox">
                    <input
                    @if($property->hasThisAmenity($amenity))
                    checked
                    @endif
                    type="checkbox" value="{{$amenity->id}}" name="amenity{{$amenity->id}}" data-parsley-multiple="group1" data-parsley-errors-container="#error-container2" class="custom-control-input">
                    <span class="custom-control-label">{{ $amenity->name }}</span>
                </label>
              @endforeach
                <div id="error-container2"></div>
            </div>
        </div>
    </div>
    <div class="form-group row text-right">
        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
            <button
              type="button"
              class="btn btn-space btn-primary"
              data-toggle="modal" data-target="#updateModal">
              {{ __('Update') }}
            </button>
            <button
              type="button"
              data-toggle="modal" data-target="#deleteModal"
              class="btn btn-space btn-secondary">
              {{ __('Delete property') }}
            </button>

            @include('adminpanel.components.single-property.update-pop-up')
            @include('adminpanel.components.single-property.delete-pop-up')

        </div>
    </div>
</form>
