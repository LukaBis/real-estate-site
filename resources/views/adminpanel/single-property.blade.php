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
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif

              @if(session()->has('successMessage'))
                  <div class="alert alert-success">
                      {{ session()->get('successMessage') }}
                  </div>
              @endif

              @include('adminpanel.components.single-property.textual-data-form')
          </div>
      </div>
  </div>

</div>

@include('adminpanel.components.single-property.delete-property-form')

<div class="row">
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
      <div class="card">
          <div class="card-body">
              @include('adminpanel.components.single-property.image-data-form')
          </div>
      </div>
  </div>

</div>

@stop
