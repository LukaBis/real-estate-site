@extends('layouts.main')

@section('content')

  <div class="click-closed"></div>
  @include('components.form-search')
  @include('components.about-intro')
  @include('components.about-section')
  @include('components.agents')

@stop
