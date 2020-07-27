@extends('layouts.app')

@section('title', "Page Title")

@section('sidebar')
  @parent

  <p>This is appended to the master sidebar.</p>
@show

@section('content')
    <p>This is my body content.</p>
    <h1>Hello, {{ $name }}.</h1>
    
@endsection

<script>
</script>