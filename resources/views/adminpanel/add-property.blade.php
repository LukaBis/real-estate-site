@extends('adminpanel.layouts.main')

@section('content')

<!-- Title  -->
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <h2>{{ __('Add New Property') }}</h2>
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

              <form id="property-form" data-parsley-validate="" novalidate=""
                method="POST">
                @csrf
                  @include('adminpanel.components.add-property.textual-data')
              </form>

          </div>
      </div>
  </div>

</div>

@stop
