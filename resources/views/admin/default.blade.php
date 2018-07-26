<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Survenia') }}</title>

  <!-- Styles -->
  <link href="{{ URL('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.2/css/responsive.dataTables.min.css">

</head>
<body class="app">

    @include('admin.partials.spinner')

    <div>
      <!-- #Left Sidebar ==================== -->
      @include('admin.partials.sidebar')

      <!-- #Main ============================ -->
      <div class="page-container">
        <!-- ### $Topbar ### -->
        @include('admin.partials.topbar')

        <!-- ### $App Screen Content ### -->
        <main class='main-content bgc-grey-100'>
          <div id='mainContent'>
            <div class="container-fluid">

              <h4 class="c-grey-900 mT-10 mB-30">@yield('page-header')</h4>

              @include('admin.partials.messages')
              @yield('content')

            </div>
          </div>
        </main>

        <!-- ### $App Screen Footer ### -->
        <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600">
          <span>Copyright © 2018 <a href="https://rednodo.com" target='_blank' title="Colorlib">Rednodo</a>. All rights reserved.</span>
          <div class="col-md-6" align="right">
          </div>
        </footer>
      </div>
    </div>

    @stack('script')

</body>
</html>
