<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Inspection Management System')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, #2c3e50 0%, #34495e 100%);
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }
        .sidebar .nav-link {
            color: #ecf0f1;
            padding: 12px 20px;
            margin: 5px 10px;
            border-radius: 8px;
            transition: all 0.3s;
        }
        .sidebar .nav-link:hover {
            background-color: rgba(255,255,255,0.1);
            color: #fff;
            transform: translateX(5px);
        }
        .sidebar .nav-link.active {
            background-color: #3498db;
            color: #fff;
        }
        .sidebar .nav-link i {
            margin-right: 10px;
            font-size: 1.1rem;
        }
        .sidebar-heading {
            color: #bdc3c7;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 20px 20px 10px;
            margin-top: 20px;
        }
        .brand {
            padding: 20px;
            color: #fff;
            font-size: 1.5rem;
            font-weight: bold;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .main-content {
            background-color: #f8f9fa;
            min-height: 100vh;
        }
        .navbar-custom {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .card {
            border: none;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            border-radius: 10px;
        }
        .stat-card {
            border-left: 4px solid;
            transition: transform 0.2s;
        }
        .stat-card:hover {
            transform: translateY(-5px);
        }
        .stat-card.primary {
            border-left-color: #3498db;
        }
        .stat-card.success {
            border-left-color: #2ecc71;
        }
        .stat-card.warning {
            border-left-color: #f39c12;
        }
        .stat-card.danger {
            border-left-color: #e74c3c;
        }
        .stat-card.info {
            border-left-color: #9b59b6;
        }
        .page-header {
            margin-bottom: 30px;
        }
        .page-title {
            font-size: 1.8rem;
            font-weight: 600;
            color: #2c3e50;
        }
        .btn {
            border-radius: 6px;
            padding: 8px 16px;
        }
        .table {
            background-color: #fff;
        }
        .badge {
            padding: 6px 12px;
            font-weight: 500;
        }
    </style>
    @yield('styles')
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 col-lg-2 d-md-block sidebar p-0">
                <div class="brand">
                    <i class="bi bi-clipboard-check"></i> InspectionApp
                </div>
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link @yield('dashboard-active')" href="/dashboard">
                                <i class="bi bi-speedometer2"></i> Dashboard
                            </a>
                        </li>
                        
                        <div class="sidebar-heading">Inspection Management</div>
                        <li class="nav-item">
                            <a class="nav-link @yield('inspections-active')" href="/inspections">
                                <i class="bi bi-clipboard-data"></i> Inspections
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('clients-active')" href="/clients">
                                <i class="bi bi-people"></i> Clients
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('properties-active')" href="/properties">
                                <i class="bi bi-building"></i> Properties
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('reports-active')" href="/reports">
                                <i class="bi bi-file-earmark-text"></i> Reports
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('bookings-active')" href="/bookings">
                                <i class="bi bi-calendar-check"></i> Bookings
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('templates-active')" href="{{ route('templates.index') }}">
                                <i class="bi bi-file-earmark-ruled"></i> My Templates
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('template-center-active')" href="{{ route('template-center.index') }}">
                                <i class="bi bi-collection"></i> Template Center
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('inspection-types.index') }}">
                                <i class="bi bi-tags"></i> Inspection Types
                            </a>
                        </li>
                        
                        <div class="sidebar-heading">System & Settings</div>
                        <li class="nav-item">
                            <a class="nav-link @yield('staff-active')" href="{{ route('staff.index') }}">
                                <i class="bi bi-person-badge"></i> Staff Management
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('subscriptions.index') }}">
                                <i class="bi bi-credit-card"></i> Subscriptions
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('notifications.index') }}">
                                <i class="bi bi-bell"></i> Notifications
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('audit-logs.index') }}">
                                <i class="bi bi-journal-text"></i> Audit Logs
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('settings.index') }}">
                                <i class="bi bi-gear"></i> Settings
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 main-content">
                <nav class="navbar navbar-expand-lg navbar-custom mb-4">
                    <div class="container-fluid">
                        <div class="ms-auto d-flex align-items-center">
                            <div class="dropdown">
                                <button class="btn btn-link text-decoration-none dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown">
                                    <i class="bi bi-person-circle fs-4"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="/profile"><i class="bi bi-person"></i> Profile</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="/logout"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>

                <div class="container-fluid py-4">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
