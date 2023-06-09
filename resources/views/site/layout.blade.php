<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>
  <body class="antialiased">

    <ul id='dropdown1' class='dropdown-content'>
      @foreach ($categoriasMenu as $categoriaM)
          <li><a href="{{ route('site.categoria', $categoriaM->id) }}">{{ $categoriaM->nome }}</a></li>
      @endforeach
    </ul>

    <nav class="red">
      <div class="nav-wrapper container">
        <a href="#" class="brand-logo center">Aprendendo Laravel</a>
        <ul id="nav-mobile" class="left">
          <li><a href="{{ route('site.index') }}">Home</a></li>
          <li><a href="#" class="dropdown-trigger" data-target="dropdown1">Categorias<i class="material-icons right">expand_more</i></a></li>
          <li><a href="{{ route('site.carrinho') }}">Carrinho <span class="new badge blue" data-badge-caption="">{{ \Cart::getContent()->count() }}</span></a></li>
        </ul>
      </div>
    </nav>

    @yield('conteudo')

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.dropdown-trigger');
        var instances = M.Dropdown.init(elems, {
          coverTrigger: false,
          constraWidth: false
        });
      });
    </script>
  </body>
</html>
