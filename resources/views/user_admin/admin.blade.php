<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>

<!-- Navbar with Offcanvas Toggle -->
<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <span class="navbar-brand mb-0 h1">Admin Panel</span>
    </div>
</nav>

<!-- Offcanvas Admin Menu -->
<div class="offcanvas offcanvas-start custom-offcanvas-bg" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Admin Menu</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="#"><i class="fas fa-home me-2"></i>Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-history me-2"></i>Orders History</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-plus-circle me-2"></i>Add Item</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-trash-alt me-2"></i>Remove Item</a>
            </li>
        </ul>
    </div>
</div>

<!-- Main Content Area -->
@section('content')
<div class="container mt-4">
    <h1>Welcome, Admin</h1>
    
    <!-- Accessing user_admin data -->
    @if($user_admin && $user_admin->isAdmin())
        <p>Hello, {{ $user_admin->name }}! You have admin privileges.</p>
    @else
        <p>Access restricted. Admins only.</p>
    @endif
</div>
@endsection

<!-- Custom CSS Styles for Admin Offcanvas Menu -->
<style>
    /* Offcanvas Background and Header */
    .custom-offcanvas-bg {
        background-color: #2c3e50;
        color: #ecf0f1;
    }

    .offcanvas-title {
        font-weight: bold;
        font-size: 1.5rem;
        color: #ecf0f1;
    }

    .btn-close-white {
        filter: invert(1);
    }

    .nav-link {
        color: #bdc3c7;
        padding: 12px 20px;
        font-size: 1.1rem;
        font-weight: 500;
        transition: color 0.3s, background-color 0.3s;
    }

    .nav-link i {
        margin-right: 8px;
    }

    .nav-link:hover, .nav-link.active {
        color: #ecf0f1;
        background-color: #34495e;
        border-radius: 5px;
    }
</style>

<!-- Bootstrap JS with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
