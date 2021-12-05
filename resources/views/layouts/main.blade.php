<!doctype html>
<html lang="id">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('/fontawesome-free/css/all.min.css') }}">

    <title>@yield('title','Laravel Tiket')</title>
    <script src="{{ url('/js/app.js') }}" type="text/javascript"></script>
    <style>
    /* Sticky footer styles
    -------------------------------------------------- */
    html {
    position: relative;
    min-height: 100%;
    }
    body {
    /* Margin bottom by footer height */
    margin-bottom: 60px;
    }
    .footer {
    position: absolute;
    bottom: 0;
    width: 100%;
    /* Set the fixed height of the footer here */
    height: 60px;
    line-height: 60px; /* Vertically center the text there */
    background-color: #f5f5f5;
    }


    /* Custom page CSS
    -------------------------------------------------- */
    /* Not required for template or sticky footer method. */

    body > .container {
    padding: 60px 15px 0;
    }

    .footer > .container {
    padding-right: 15px;
    padding-left: 15px;
    }

    code {
    font-size: 80%;
    }
    </style>
  </head>
  <body class="">
      <div id="app" class="">
        <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
            <a class="navbar-brand" href="{{ URL::to('/') }}">{{ config('app.name') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav">
                <a class="nav-link active" href="{{ URL::to('/') }}">Home <span class="sr-only">(current)</span></a>
                <a class="nav-link" href="{{ URL::to('/hubungi-kami') }}">Kontak</a>
                <a class="nav-link" href="{{ URL::to('/tentang') }}">Tentang</a>
              </div>
            </div>
        </nav>

        <main class="py-4 container-fluid">
            @yield('content')
        </main>
      </div>

    <!-- /.container -->

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
          <span class="text-muted"> © {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')</span>
        </div>
    </footer>
    <!-- /.Footer -->

    {{--
    <section class="">
        <!-- Footer -->
        <footer class="bg-secondary text-white text-center text-md-start">
          <!-- Grid container -->
          <div class="container p-4">
            <!--Grid row-->
            <div class="row">
              <!--Grid column-->
              <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                <h5 class="text-uppercase">Footer Content</h5>

                <p>
                  Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
                  molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae
                  aliquam voluptatem veniam, est atque cumque eum delectus sint!
                </p>
              </div>
              <!--Grid column-->

              <!--Grid column-->
              <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">Links</h5>

                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#!" class="text-white">Link 1</a>
                  </li>
                  <li>
                    <a href="#!" class="text-white">Link 2</a>
                  </li>
                  <li>
                    <a href="#!" class="text-white">Link 3</a>
                  </li>
                  <li>
                    <a href="#!" class="text-white">Link 4</a>
                  </li>
                </ul>
              </div>
              <!--Grid column-->

              <!--Grid column-->
              <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-0">Links</h5>

                <ul class="list-unstyled">
                  <li>
                    <a href="#!" class="text-white">Link 1</a>
                  </li>
                  <li>
                    <a href="#!" class="text-white">Link 2</a>
                  </li>
                  <li>
                    <a href="#!" class="text-white">Link 3</a>
                  </li>
                  <li>
                    <a href="#!" class="text-white">Link 4</a>
                  </li>
                </ul>
              </div>
              <!--Grid column-->
            </div>
            <!--Grid row-->
          </div>
          <!-- Grid container -->

          <!-- Copyright -->
          <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
          </div>
          <!-- Copyright -->
        </footer>
        <!-- Footer -->
    </section>
    --}}

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
    <!-- DataTables -->
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

    <!-- App scripts -->
    @stack('scripts')
  </body>
</html>
