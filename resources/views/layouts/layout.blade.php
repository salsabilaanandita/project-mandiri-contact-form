<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>

    <style>
        
.sidebar {
    width: 60px; 
    transition: width 0.3s; 
}


.nav-link {
    padding: 10px 5px; 
    text-align: center; 
}

.nav-link i {
    font-size: 20px; 
}

.nav-link:hover {
    background-color: #f8f9fa; 
}

.sidebar .nav-link {
    white-space: nowrap; 
}

@media (max-width: 768px) {
    .sidebar {
        width: 50px; 
    }
}

    </style>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav id="sidebarMenu" class="col-md-2 col-lg-1 d-md-block bg-light sidebar vh-100">
            <div class="d-flex flex-column justify-content-center align-items-center vh-100">
                <!-- Sidebar Title -->
                <ul class="nav flex-column w-100 text-center">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contacts.index') }}" title="Contacts">
                            <i class="fa-regular fa-address-card"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contacts.create') }}" title="Add Contact">
                            <i class="fa-solid fa-pen-to-square"></i> 
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main content -->
        <main class="col-md-10 ms-sm-auto col-lg-11 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
            </div>
        
            <div class="container mt-3">
                @yield('content')
            </div>
        </main>
        
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

@stack('script')
</body>
</html>
