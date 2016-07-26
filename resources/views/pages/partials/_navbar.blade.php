@inject('route', 'Illuminate\Routing\Route')

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ route('home') }}"><span class="glyphicon glyphicon-home"></span> Project Flyer</a>
    </div>
    <div id="navbar">
      <ul class="nav navbar-nav">
        <li class="{{ isActiveRoute('home') }}"><a href="/">Home</a></li>
        <li class="{{ isActiveRoute('about') }}"><a href="about">About</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </div>
    <ul class="nav navbar-nav navbar-right">
      @if ($signedIn)
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          {{ $user->name }}<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ action('FlyersController@create') }}">Create a flyer</a></li>
            <li><a href="{{ action('Auth\AuthController@logout') }}">Logout</a></li>
          </ul>
        </li>
      @else
        <li><a href="{{ action('Auth\AuthController@register') }}">Register</a></li>
        <li><a href="{{ action('Auth\AuthController@login') }}">Login</a></li>
      @endif
    </ul>
  </div>
</nav>