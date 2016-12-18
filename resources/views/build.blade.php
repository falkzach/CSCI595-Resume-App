@extends('layouts.app')

@section('content')
<div>
<div class="w3-container w3-padding-32" id="projects">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-12"> Build Your Résumé </h3>
    Fill in these fields to begin building your résumé.
</div>

<div class="container-fluid">
  <div class="row">

    <a href="/expanded">
    <div class="col-sm-4">
      <div class="panel panel-info"> <div class="panel-heading"> Education </div> </div>
      <p class="template"> Your education history is empty. </p>
    </div>
    </a>

    <a href="/expanded">
    <div class="col-sm-4">
      <div class="panel panel-info"> <div class="panel-heading"> Work History </div> </div>
      <p class="template"> Your work history is empty. </p>
    </div>
    </a>

    <a href="/expanded">
    <div class="col-sm-4">
      <div class="panel panel-info"> <div class="panel-heading"> References </div> </div>
      <p class="template"> Your references section is empty. </p>
    </div>
    </a>

  </div>
</div>

</div>
@endsection
