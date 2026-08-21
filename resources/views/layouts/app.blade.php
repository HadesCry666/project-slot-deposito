<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Slot atau Deposito? | Simulasi Literasi Keuangan')</title>
  <script src="https://cdn.tailwindcss.com/3.4.17"></script>
  <script src="https://cdn.jsdelivr.net/npm/lucide@0.263.0/dist/umd/lucide.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&amp;family=Fraunces:opsz,wght@9..144,600;9..144,700&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
 </head>
 <body class="app-shell">
  @yield('content')

  <script src="{{ asset('js/simulator.js') }}"></script>
  @yield('scripts')
 </body>
</html>
