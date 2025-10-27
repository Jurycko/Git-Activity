<!DOCTYPE html>
<html>
<head>
  <title>Student TPS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      background-size: cover;
      font-family: 'Poppins', sans-serif;
    }
    .overlay { background: rgba(255,255,255,.9); min-height:100vh; padding-bottom:50px; }
    .navbar { background: rgba(0,0,0,.7) !important; }
    .navbar-brand img { height:45px; margin-right:10px; }
    .card { border-radius: 1rem; }
    .card-body { padding: 2rem; }
    footer { text-align:center; color:#666; margin-top:30px; font-size:14px; }
  </style>
</head>
<body>
  <div class="overlay">
    <nav class="navbar navbar-expand-lg navbar-dark mb-4">
      <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
          <img src="{{ asset('images/logo.png') }}" alt="Logo">
          <span class="text-light fw-bold">Student TPS</span>
        </a>
        <div>
          <a href="{{ url('/') }}" class="btn btn-outline-light me-2">Dashboard</a>
          <a href="{{ route('sections.index') }}" class="btn btn-outline-light me-2">Sections</a>
          <a href="{{ route('students.index') }}" class="btn btn-outline-light">Students</a>
        </div>
      </div>
    </nav>

    <div class="container bg-white p-4 rounded shadow-lg">
      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif
      @yield('content')
    </div>

    <footer>
      <p>© {{ date('Y') }} Student TPS | Laravel MVC CRUD Project</p>
    </footer>
  </div>
</body>
</html>
