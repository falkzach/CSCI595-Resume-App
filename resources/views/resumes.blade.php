@extends('layouts.app')

@section('content')
<div>
<div class="w3-container w3-padding-32" id="projects">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-12"> Your Résumés </h3>
</div>

<div class="container-fluid">
  <div class="row">

    <a href="/yourresume">
    <div class="col-sm-4-resume">
      <div class="panel panel-info"> <div class="panel-heading"> Resume 1 </div> </div>
      <p class="template"> Your education history is empty. </p>
    </div>
    </a>

    <div class="col-sm-8">
      <div class="panel panel-info"> <div class="panel-heading"> Create New </div> </div>
    </div>

  </div>
</div>

<div class="container-fluid">
  <div class="row">

    <a href="/yourresume">
    <div class="col-sm-4-resume">
      <div class="panel panel-info"> <div class="panel-heading"> Resume 2 </div> </div>
      <p class="template"> Your work history is empty. </p>
    </div>
    </a>

  </div>
</div>

</div>
@endsection
