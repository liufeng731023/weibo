<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title','this is default title weibo app') _十步杀一人，千里不留行</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  </head>
  <body>
    @include('layouts._header')

    <div class="container">
      <div class="offset-md-1 col-md-10">

        @yield('content')
        @include('layouts._footer')

      </div>
    </div>

  </body>
</html>
