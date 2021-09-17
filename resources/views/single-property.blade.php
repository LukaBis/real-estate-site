@extends('layouts.main')

@section('content')

  @include('components.form-search')
  @include('components.single-property.intro')
  @include('components.single-property.details')

@stop
