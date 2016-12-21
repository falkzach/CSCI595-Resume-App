<!-- Stored in resources/views/layouts/frame.blade.php -->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="A resume building webpage">
  <meta name="author" content="Zachary Falkner">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title> ResuME Builder </title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">

</head>

<body>
<!-- Navbar (sits on top) -->
<div class="w3-top">
  <ul class="w3-navbar w3-white w3-wide w3-padding-8 w3-card-2">
    <li>
      <a href="/main" class="w3-margin-left"><b> ResuME Builder </b> </a>
    </li>

    <!-- Float links to the right. Hide them on small screens -->
    <li class="w3-right w3-hide-small">
      <a href="/resumes" class="w3-left"> Your Résumés </a>
      <a href="/build" class="w3-left"> Build </a>
      <a href="/main#about" class="w3-left"> About </a>
      <a href="/main#contact" class="w3-left"> Contact </a>
      @if(Auth::guest())
          <a href="{{ url('/login') }}"  class="w3-left">Login</a>
          <a href="{{ url('/register') }}"  class="w3-left w3-margin-right">Register</a>
      @else
          <a href="/account" class="w3-left"> Account </a>
            <a href="{{ url('/logout') }}" class="w3-left w3-margin-right"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout</a>
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
      @endif


    </li>

  </ul>
</div>

<!-- Page content -->
<div class="w3-content w3-padding" style="max-width:1564px">
  @yield('content')
</div>
<!-- End page content -->

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-16">
  <p> ResuME Builder </p>
</footer>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@yield('javascript')
</html>
