<div class="row">
  <div class="col-12">
    <h2>{{ __('Agent vertical image') }}</h2>
  </div>
</div>

<div class="row">
  <div class="col-12 col-md-6">
    <img src="{{ asset('images/agent_images/'.$agent->image) }}" class="img-fluid" alt="">
  </div>
</div>

<form
  action="/home/agent/image"
  enctype="multipart/form-data"
  method="post">
  @csrf
  @method('PUT')

  <div class="form-group row mt-3">
    <div class="col-12">
      <label for="vertical-image">{{ __('Select a file') }} (image 800 x 890):</label><br>
      <input type="file" id="image" name="image">
      <input type="hidden" name="agentId" value="{{ $agent->id }}">
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
