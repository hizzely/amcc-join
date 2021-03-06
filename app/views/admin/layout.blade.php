<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Admin Join AMCC</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{ $helper->base_url('/assets/css/admin.css') }}">

  @stack('styles')
</head>
<body>
  <nav class="navbar navbar-expand navbar-dark bg-primary main-nav justify-content-between">
    <div class="container">
      <a class="navbar-brand" href="{{ $helper->route('admin') }}">Join AMCC</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#top-navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="top-navbar">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item"><a class="nav-link" href="{{ $helper->route('admin') }}">Member <span class="sr-only">(current)</span></a></li>
          <li class="nav-item"><a class="nav-link" href="{{ $helper->route('admin.faq') }}">FAQ</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ $helper->route('admin.stats') }}">Statistik</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ $helper->route('admin.report') }}">Laporan Keuangan</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ $helper->route('admin.settings') }}">Pengaturan</a></li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
              <em>{{ $helper->currentUser()['email'] }}</em>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit()">Keluar</a>
            </div>
          </li>
        </ul>
        <form action="{{ $helper->route('admin.logout') }}" method="post" id="logout-form" class="d-none"></form>
      </div>
    </div>
  </nav>

  <main class="content">
    @yield('content')
  </main>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
  <script src="{{ $helper->base_url('/assets/js/admin.js') }}"></script>

  <script>
    (function($) {
      $('.main-nav a[href="' + location.pathname + '"]').parent().addClass('active');
      $('.settings-nav a[href="' + location.pathname + '"]').addClass('active');
    })(jQuery);
  </script>

  @stack('scripts')
</body>
</html>
