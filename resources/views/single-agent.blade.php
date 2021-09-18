@extends('layouts.main')

@section('content')

  @include('components.form-search')
  @include('components.single-agent.intro')
  @include('components.single-agent.agent-details')

@stop
