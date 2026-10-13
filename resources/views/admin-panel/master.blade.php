<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  {{-- {{ Bootstrap link }} --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<style>
    body{
      padding: 3px;
    }
    .sidemenu{
      width: 200px;
      height: 100%;
      background-color: #000;
      position: fixed;
      padding: 15px;
    }
    .sidemenu a{
      display: block;
      text-decoration: none;
      font-size: 17px;
      color: #fff;
      padding: 6px;
    }
    .main{
      margin-left: 200px;
      font-size: 16px;
      padding: 20px;
    }
    .mainCol{
      padding: 0px;
    }
    .navbar{
      position: fixed;
      top: 0;
      z-index: 5;
    }
</style>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 mainCol">
        <nav class="navbar navbar-expand-lg bg-dark position-sticky">
          <div class="container-fluid">
            <a class="navbar-brand text-white" href="{{ url('/admin') }}">Personal Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{Auth::user()->name}}
                  </a>
                  <ul class="dropdown-menu">
                    <form action="{{ route('logout') }}" method="POST">
                      @csrf
                      <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure want to logout?')">Logout</button>
                    </form>
                    
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        {{-- {{ side-nav-menu }} --}}
        <div class="sidemenu">
            <a href="{{ url('/users') }}">User</a>
            <a href="{{ route('skills.index') }}">Skill</a>
            <a href="{{ route('projects.index') }}">Project</a>
            <a href="{{ route('student_counts.index') }}">Student Count</a>
            <a href="{{ route('categories.index') }}">Category</a>
            <a href="{{ route('posts.index') }}">Post</a>
        </div>
        {{-- {{ main content }} --}}
        <div class="main">
          @yield('content')
        </div>
      </div>
    </div>
  </div>


  {{-- jQuery script --}}
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  {{-- {{ Bootstrap Js }} --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  @yield('javascript')
  
</body>
</html>