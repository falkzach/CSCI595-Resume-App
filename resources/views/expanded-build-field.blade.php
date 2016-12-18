@extends('layouts.app')

@section('content')
<div>
<div class="w3-container w3-padding-32" id="projects">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-12"> Current Field </h3>
</div>

<div class="container-fluid">
  <div class="column1">
    <div class="col-sm-4-resume2">
      <div class="panel panel-info"> <div class="panel-heading"> <a class="X"> X </a> </div> </div>
      <p class="template"> This is an example item. </p>
    </div>
  </div>

  <div class="column2">
    <div class="col-sm-4-resume2">
      <div class="center">
        <div class="panel panel-info"> <div class="panel-heading"> Add Items </div> </div>
      </div>
      <form>
        <div class="form-group">
          <label for="formGroupExampleInput"> Information </label>
          <input type="textarea" class="form-control" id="formGroupExampleInput" placeholder="Example: University of Montana">
        </div>
        <div class="center"> <button type="button" class="btn btn-outline-primary"> Add </button> </div>
      </form>
    </div>
  </div>

</div>

</div>
@endsection
