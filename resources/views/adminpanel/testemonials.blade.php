@extends('adminpanel.layouts.main')

@section('content')

@if(session()->has('successMessage'))
    <div class="alert alert-success">
      {{ session()->get('successMessage') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@include('adminpanel.components.testemonials_table')

@stop
