@extends('layout')

@section('title', 'Dashboard - Inspection Management System')
@section('dashboard-active', 'active')

@section('content')
<div class="page-header">
    <h1 class="page-title">Dashboard</h1>
    <p class="text-muted">Welcome to your Inspection Management System</p>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-6 col-lg-4 col-xl">
        <div class="card stat-card primary">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Total Inspections</h6>
                        <h2 class="mb-0">348</h2>
                    </div>
                    <div class="text-primary">
                        <i class="bi bi-clipboard-data fs-1"></i>
                    </div>
                </div>
                <div class="mt-2">
                    <small class="text-success"><i class="bi bi-arrow-up"></i> 12% from last month</small>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-4 col-xl">
        <div class="card stat-card success">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Total Clients</h6>
                        <h2 class="mb-0">125</h2>
                    </div>
                    <div class="text-success">
                        <i class="bi bi-people fs-1"></i>
                    </div>
                </div>
                <div class="mt-2">
                    <small class="text-success"><i class="bi bi-arrow-up"></i> 8% from last month</small>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-4 col-xl">
        <div class="card stat-card info">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Total Properties</h6>
                        <h2 class="mb-0">287</h2>
                    </div>
                    <div style="color: #9b59b6;">
                        <i class="bi bi-building fs-1"></i>
                    </div>
                </div>
                <div class="mt-2">
                    <small class="text-success"><i class="bi bi-arrow-up"></i> 5% from last month</small>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-4 col-xl">
        <div class="card stat-card warning">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Pending Reports</h6>
                        <h2 class="mb-0">23</h2>
                    </div>
                    <div class="text-warning">
                        <i class="bi bi-exclamation-triangle fs-1"></i>
                    </div>
                </div>
                <div class="mt-2">
                    <small class="text-muted">Requires attention</small>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-4 col-xl">
        <div class="card stat-card danger">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Upcoming Inspections</h6>
                        <h2 class="mb-0">15</h2>
                    </div>
                    <div class="text-danger">
                        <i class="bi bi-calendar-event fs-1"></i>
                    </div>
                </div>
                <div class="mt-2">
                    <small class="text-muted">Next 7 days</small>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="mb-0">Upcoming Inspections</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Property</th>
                                <th>Client</th>
                                <th>Type</th>
                                <th>Date & Time</th>
                                <th>Inspector</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <strong>Sunset Plaza Complex</strong><br>
                                    <small class="text-muted">123 Main St, Los Angeles</small>
                                </td>
                                <td>ABC Corporation</td>
                                <td><span class="badge bg-primary">Fire Safety</span></td>
                                <td>
                                    <i class="bi bi-calendar3"></i> Oct 8, 2025<br>
                                    <small class="text-muted"><i class="bi bi-clock"></i> 10:00 AM</small>
                                </td>
                                <td>John Smith</td>
                                <td><span class="badge bg-warning">Scheduled</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Green Valley Apartments</strong><br>
                                    <small class="text-muted">456 Oak Ave, San Diego</small>
                                </td>
                                <td>Property Holdings Inc</td>
                                <td><span class="badge bg-success">Structural</span></td>
                                <td>
                                    <i class="bi bi-calendar3"></i> Oct 9, 2025<br>
                                    <small class="text-muted"><i class="bi bi-clock"></i> 2:00 PM</small>
                                </td>
                                <td>Sarah Johnson</td>
                                <td><span class="badge bg-warning">Scheduled</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Downtown Office Tower</strong><br>
                                    <small class="text-muted">789 Business Blvd, San Francisco</small>
                                </td>
                                <td>Tech Ventures LLC</td>
                                <td><span class="badge bg-info">Compliance</span></td>
                                <td>
                                    <i class="bi bi-calendar3"></i> Oct 10, 2025<br>
                                    <small class="text-muted"><i class="bi bi-clock"></i> 9:30 AM</small>
                                </td>
                                <td>Michael Brown</td>
                                <td><span class="badge bg-warning">Scheduled</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Riverside Industrial Park</strong><br>
                                    <small class="text-muted">321 River Rd, Sacramento</small>
                                </td>
                                <td>Manufacturing Co</td>
                                <td><span class="badge bg-danger">Safety Audit</span></td>
                                <td>
                                    <i class="bi bi-calendar3"></i> Oct 11, 2025<br>
                                    <small class="text-muted"><i class="bi bi-clock"></i> 11:00 AM</small>
                                </td>
                                <td>Emily Davis</td>
                                <td><span class="badge bg-warning">Scheduled</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Marina Bay Residences</strong><br>
                                    <small class="text-muted">555 Bay St, Oakland</small>
                                </td>
                                <td>Coastal Properties</td>
                                <td><span class="badge bg-primary">Fire Safety</span></td>
                                <td>
                                    <i class="bi bi-calendar3"></i> Oct 12, 2025<br>
                                    <small class="text-muted"><i class="bi bi-clock"></i> 3:00 PM</small>
                                </td>
                                <td>John Smith</td>
                                <td><span class="badge bg-warning">Scheduled</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-white">
                <a href="/inspections" class="btn btn-sm btn-outline-primary">View All Inspections <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">Recent Activity</h5>
            </div>
            <div class="card-body">
                <div class="d-flex mb-3 pb-3 border-bottom">
                    <div class="me-3">
                        <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i class="bi bi-check-circle"></i>
                        </div>
                    </div>
                    <div>
                        <strong>Inspection Completed</strong><br>
                        <small class="text-muted">Harbor View Complex</small><br>
                        <small class="text-muted">2 hours ago</small>
                    </div>
                </div>
                <div class="d-flex mb-3 pb-3 border-bottom">
                    <div class="me-3">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i class="bi bi-plus-circle"></i>
                        </div>
                    </div>
                    <div>
                        <strong>New Property Added</strong><br>
                        <small class="text-muted">Skyline Plaza</small><br>
                        <small class="text-muted">5 hours ago</small>
                    </div>
                </div>
                <div class="d-flex mb-3 pb-3 border-bottom">
                    <div class="me-3">
                        <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i class="bi bi-file-earmark-text"></i>
                        </div>
                    </div>
                    <div>
                        <strong>Report Generated</strong><br>
                        <small class="text-muted">Westside Mall</small><br>
                        <small class="text-muted">Yesterday</small>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="me-3">
                        <div class="bg-warning text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i class="bi bi-calendar-plus"></i>
                        </div>
                    </div>
                    <div>
                        <strong>Inspection Scheduled</strong><br>
                        <small class="text-muted">Central Park Tower</small><br>
                        <small class="text-muted">2 days ago</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-white">
                <h5 class="mb-0">Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="/inspections/schedule" class="btn btn-primary">
                        <i class="bi bi-calendar-plus"></i> Schedule Inspection
                    </a>
                    <a href="/properties/add" class="btn btn-outline-primary">
                        <i class="bi bi-building-add"></i> Add New Property
                    </a>
                    <a href="/clients" class="btn btn-outline-primary">
                        <i class="bi bi-person-plus"></i> Add New Client
                    </a>
                    <a href="/reports" class="btn btn-outline-primary">
                        <i class="bi bi-file-earmark-text"></i> View Reports
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
