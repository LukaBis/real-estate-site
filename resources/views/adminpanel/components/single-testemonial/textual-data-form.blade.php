<form id="testemonial-form" data-parsley-validate="" novalidate=""
  method="POST"
  action="/home/testemonial/{{ $testemonial->id }}">
  @csrf
  @method('PUT')
    <div class="form-group">
      <div style="display:none">
        <input value="{{ $testemonial->id }}" name="testemonialId" class="form-control">
      </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">{{ __('Name(s)') }}</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input value="{{ $testemonial->names }}" name="names" type="text" placeholder="names" class="form-control">
        </div>
    </div>
    @foreach($languages as $language)
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">{{ __('Text') }} ({{ strtoupper($language->iso) }})</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <textarea name="{{ $language->iso }}-text" class="form-control">{{ $testemonial->translate($language->iso)->text }}</textarea>
        </div>
    </div>
    @endforeach
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
              {{ __('Delete testemonial') }}
            </button>

            @include('adminpanel.components.single-testemonial.update-pop-up')
            @include('adminpanel.components.single-testemonial.delete-pop-up')

        </div>
    </div>
</form>
