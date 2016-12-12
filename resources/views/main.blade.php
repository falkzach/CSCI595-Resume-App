@extends('layouts.app')

@section('content')
<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
  <img class="w3-image" src="./images/view.jpg" alt="Architecture" width="1500" height="800">

  <div class="w3-display-middle w3-margin-top w3-center">
    <h1 class="w3-xxlarge"><span class="w3-border w3-border-black w3-padding"> ResuME Builder </span></h1>
  </div>
</header>

<!-- Project Section -->
<div class="w3-container w3-padding-32" id="resume">
  <a href="/resumes"> <h3 class="w3-border-bottom w3-border-light-grey w3-padding-12"> Your Résumés </h3> </a>
  <p>
    You currently have no résumés built. Click Build to begin!
  </p>
</div>

<div class="w3-container w3-padding-32" id="projects">
  <a href="/build"> <h3 class="w3-border-bottom w3-border-light-grey w3-padding-12"> Build </h3> </a>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-info"> <div class="panel-heading"> Education </div> </div>
      <p class="template"> Your education history is empty. </p>
    </div>

    <div class="col-sm-4">
      <div class="panel panel-info"> <div class="panel-heading"> Work History </div> </div>
      <p class="template"> Your work history is empty. </p>
    </div>

    <div class="col-sm-4">
      <div class="panel panel-info"> <div class="panel-heading"> References </div> </div>
      <p class="template"> Your references section is empty. </p>
    </div>
  </div>
</div>

<!-- About Section -->
<div class="w3-container w3-padding-32" id="about">
  <h3 class="w3-border-bottom w3-border-light-grey w3-padding-12"> About </h3>
  <p>
    ResuME Builder is a tool that allows users to build out a master database of their work history,
    education, qualifications, etc. They are then able to generate job specific résumés, cover
    letter templates, and references. This is beneficial to those applying for various jobs
    who have complex résumés which have to be tailored for each position.
  </p>
</div>

<!-- Contact Section -->
<div class="w3-container w3-padding-32" id="contact">
  <h3 class="w3-border-bottom w3-border-light-grey w3-padding-12"> Contact </h3>
  <div class="w3-row-padding w3-grayscale">
    <div class="w3-col l3 m6 w3-margin-bottom">
      <img src="./images/tobin.jpg" alt="Jane" style="width:100%">
      <h3> Tobin Doe </h3>
      <p class="w3-opacity"> CEO &amp; Founder </p>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <img src="./images/abby.jpg" alt="Jane" style="width:100%">
      <h3> Jane Wambach </h3>
      <p class="w3-opacity"> Software Engineer </p>
    </div>
  </div>

  <p> Please get in touch with us for any questions you may have. </p>
  <form action="form.asp" target="_blank">
    <input class="w3-input" type="text" placeholder="Name" required name="Name">
    <input class="w3-input w3-section" type="text" placeholder="Email" required name="Email">
    <input class="w3-input w3-section" type="text" placeholder="Subject" required name="Subject">
    <input class="w3-input w3-section" type="text" placeholder="Comment" required name="Comment">
    <button class="w3-btn w3-section" type="submit">
      <i class="fa fa-paper-plane"></i> SEND MESSAGE
    </button>
  </form>
</div>
@endsection
