
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Add custom CSS if needed -->
    <link href="{{ asset('css/user.css') }}" rel="stylesheet">
    <style>
        .sidebar {
            background-color: #343a40;
            color: white;
            height: 50rem;
            padding: 20px;
        }
        .sidebar .nav-link {
            color: white;
        }
        .main-content {
            padding: 50px;
        }
        .card-body {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('home') }}"> Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('user.dashboard') }}"> Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('user.profile.show') }}"> Profile</a>
                        </li>

                        <li>
                            <a class="btn btn-outline-danger" href="{{ route('logout') }}" style="color: white ; margin-left:15px" onclick="event.preventDefault(); document.getElementById('logout-form').submit(); ">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </li>

                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 main-content">
                <div class="container mt-4">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- Add Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
