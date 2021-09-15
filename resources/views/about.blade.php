@extends('layouts.main')

@section('content')

  @include('components.form-search')
  @include('components.about.about-intro')
  @include('components.about.about-section')
  @include('components.agents')

@stop
