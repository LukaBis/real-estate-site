@extends('layouts.main')

@section('content')

  @include('components.form-search')
  @include('components.home.carousel')
  @include('components.home.services')
  @include('components.home.properties')
  @include('components.agents')
  @include('components.home.testemonials')

@stop
