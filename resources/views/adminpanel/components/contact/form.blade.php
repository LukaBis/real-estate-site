<form id="add-contact-form" data-parsley-validate="" novalidate=""
  method="POST"
  action="/home/contact">
  @csrf
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">{{__('Email')}}</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input value="@if($contact->count()){{ $contact[0]->email }}@endif" placeholder="email" name="email" class="form-control" type="email" />
        </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">{{__('Phone')}}</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input value="@if($contact->count()){{ $contact[0]->phone }}@endif" placeholder="phone" name="phone" class="form-control" type="number" />
        </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">{{__('City')}}</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input value="@if($contact->count()){{ $contact[0]->city }}@endif" placeholder="city" name="city" class="form-control" />
        </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">{{__('Street name')}}</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input value="@if($contact->count()){{ $contact[0]->street_name }}@endif" placeholder="street name" name="street_name" class="form-control" />
        </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">{{__('House number')}}</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input value="@if($contact->count()){{ $contact[0]->house_number }}@endif" placeholder="house number" name="house_number" class="form-control" />
        </div>
    </div>
    <div class="form-group row text-right">
        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
            <button
              type="submit"
              class="btn btn-space btn-primary">
              {{ __('Save') }}
            </button>
        </div>
    </div>
</form>
