<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> News @yield('title')</title>
    <link href="{{ asset('assets/frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/splide.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/style.css') }}" rel="stylesheet">

</head>
<body>

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg py-3 navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.html">NEW</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('news')}}">News</a>
              </li>
            </ul>
            <form action="{{route('news.search')}}" class="d-flex me-3">
              <input class="form-control rounded-0" style="width: 300px;" type="search" placeholder="Search" name="title">
              <button class="btn btn-primary rounded-0" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
                <div class="my-2">
                    @auth
                    @role('admin')
                        <a href="/dashboard" class="text-decoration-none text-light me-3">{{ auth()->user()->name }}</a>
                        <a href="javascript:void(0)" onclick="document.getElementById('logout').submit();" class="text-decoration-none text-light me-3">Logout</a>
                        <form id="logout" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    @else
                        <a href="/profile" class="text-decoration-none text-light me-3">{{ auth()->user()->name }}</a>
                        <a href="javascript:void(0)" onclick="document.getElementById('logout').submit();" class="text-decoration-none text-light me-3">Logout</a>
                        <form id="logout" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>

                    @endrole
                    @else
                        <a href="/login" class="text-decoration-none text-light me-3">Login</a>
                        <a href="/register" class="text-decoration-none text-light me-3">Register</a>
                    @endauth
                </div>
          </div>
        </div>
    </nav>
    <!-- Navbar End -->

        @yield('content')

     <!-- Footer Start -->

     <footer>
         <p class="text-center text-muted">Copyright &copy; WEBHUB 2022</p>
     </footer>

     <!-- Footer End -->

    <script src="{{ asset('assets/frontend/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/all.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/splide.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/main.js') }}"></script>

</body>
</html>
