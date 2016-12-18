@extends('layouts.app')

@section('content')
<div>
<div class="w3-container w3-padding-32" id="projects">
  <h3 class="w3-border-bottom w3-border-light-grey w3-padding-12"> Your Résumé </h3>
</div>

<div class="container-fluid">
  <div class="column1">
    <div class="col-sm-4-resume2">
      <div class="center">
        <div class="panel panel-info"> <div class="panel-heading"> <a class="X"> Resume Display </a> </div> </div>
        <div class="resume-page">
          <!-- Footer -->
          <header class="w3-center w3-white w3-padding-16">
            <p> Contact Info </p>
            <hr> </hr>
          </header>
        </div>
      </div>
    </div>
  </div>

  <div class="column2">
    <div class="col-sm-4-resume2">
      <div class="panel panel-info"> <div class="panel-heading"> Résumé Data </div> </div>
      <div class="contain">
        <div class="checkbox">
          <label><input type="checkbox" value=""> Your data 1 </label>
        </div>
        <div class="checkbox">
          <label><input type="checkbox" value=""> Your data 2 </label>
        </div>
        <div class="checkbox disabled">
          <label><input type="checkbox" value=""> Your data 3 </label>
        </div>
        <div class="center"> <button type="button" class="btn btn-outline-primary"> Add to Résumé </button> </div>
      </div>
    </div>
  </div>

</div>

</div>
@endsection
