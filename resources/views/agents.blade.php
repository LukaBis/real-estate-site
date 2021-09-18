@extends('layouts.main')

@section('content')

  @include('components.form-search')
  @include('components.agents.intro')
  @include('components.agents.agents_grid')

@stop
