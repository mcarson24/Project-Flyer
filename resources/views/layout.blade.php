<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Project Flyer</title>
    <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
  </head>
  <body>
    @include('pages.partials._navbar')
    <div class="main container">
        @yield('content')
    </div>
  </body>
</html>