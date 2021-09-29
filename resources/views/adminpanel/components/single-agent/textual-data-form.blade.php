<form id="agent-form" data-parsley-validate="" novalidate=""
  method="POST"
  action="/home/agent/{{ $agent->id }}">
  @csrf
  @method('PUT')
    <div class="form-group">
      <div style="display:none">
        <input value="{{ $agent->id }}" name="agentId" class="form-control">
      </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">{{ __('Full name') }}</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input value="{{ $agent->full_name }}" name="full_name" type="text" placeholder="Full name" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">{{ __('Phone number') }}</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input value="{{ $agent->phone }}" name="phone" type="text" placeholder="Phone number" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">{{ __('Email') }}</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input value="{{ $agent->email }}" type="email" name="email" placeholder="Email" class="form-control">
        </div>
    </div>
    @foreach($languages as $language)
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">{{__('About')}} ({{ strtoupper($language->iso) }})</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <textarea name="{{$language->iso}}-description" class="form-control">{{ $agent->translate($language->iso)->about }}</textarea>
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
                    @if($agent->hasThisProperty($property))
                    checked
                    @endif
                    type="checkbox" value="{{$property->id}}" name="property{{$property->id}}" data-parsley-multiple="group1" data-parsley-errors-container="#error-container2" class="custom-control-input">
                    <span class="custom-control-label">{{ $property->city }}, {{ $property->street_name }}, {{ $property->house_number }}</span>
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
              {{ __('Delete agent') }}
            </button>

            @include('adminpanel.components.single-agent.update-pop-up')
            @include('adminpanel.components.single-agent.delete-pop-up')

        </div>
    </div>
</form>
