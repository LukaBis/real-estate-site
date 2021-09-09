@extends('layouts.main')

@section('content')

  <div class="click-closed"></div>
  @include('components.form-search')
  @include('components.carousel')
  @include('components.services')
  @include('components.properties')
  @include('components.agents')
  @include('components.news')
  @include('components.testemonials')

@stop
