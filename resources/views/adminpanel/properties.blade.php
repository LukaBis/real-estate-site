@extends('adminpanel.layouts.main')

@section('content')

@if(session()->has('successMessage'))
    <div class="alert alert-success">
      {{ session()->get('successMessage') }}
    </div>
@endif

@include('adminpanel.components.properties_table')

@stop
