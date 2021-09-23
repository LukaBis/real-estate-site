@extends('adminpanel.layouts.main')

@section('content')

<!-- Title  -->
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <h2>{{ __('Property') }} {{ $property->id }}</h2>
    </div>
</div>

<div class="row">
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
      <div class="card">
          <h5 class="card-header">{{ __('Property data') }}</h5>
          <div class="card-body">
              <form id="validationform" data-parsley-validate="" novalidate="">
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
                                  <input id="ck1"
                                  @if($property->status_id == $status->status_id)
                                   checked
                                  @endif
                                   name="status-id-{{$status->status_id}}" type="checkbox" data-parsley-multiple="groups" value="bar" data-parsley-mincheck="2" data-parsley-errors-container="#error-container1" class="custom-control-input">
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
                                  <input type="checkbox"
                                  @if($property->type_id == $type->id)
                                    checked
                                  @endif
                                  value="type-id-{{$type->id}}" id="e1" data-parsley-multiple="group1" data-parsley-errors-container="#error-container2" class="custom-control-input">
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
                                  type="checkbox" value="agent-id-{{$agent->id}}" id="e1" data-parsley-multiple="group1" data-parsley-errors-container="#error-container2" class="custom-control-input">
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
                          <textarea name="{{$language->iso}}-description" class="form-control">
                            {{ $property->translate($language->iso)->description }}
                          </textarea>
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
                                  type="checkbox" value="amenity-id-{{$amenity->id}}" id="e1" data-parsley-multiple="group1" data-parsley-errors-container="#error-container2" class="custom-control-input">
                                  <span class="custom-control-label">{{ $amenity->name }}</span>
                              </label>
                            @endforeach
                              <div id="error-container2"></div>
                          </div>
                      </div>
                  </div>
                  <div class="form-group row text-right">
                      <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                          <button type="submit" class="btn btn-space btn-primary">{{ __('Update') }}</button>
                          <button class="btn btn-space btn-secondary">{{ __('Delete') }}</button>
                      </div>
                  </div>
              </form>
          </div>
      </div>
  </div>

</div>

@stop
