@extends('layout')

@section('title', 'Clients - Inspection Management System')
@section('clients-active', 'active')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Clients</h1>
        <p class="text-muted">Manage all clients and their properties</p>
    </div>
    <div>
        <a href="/clients/add" class="btn btn-primary">
            <i class="bi bi-person-plus"></i> Add New Client
        </a>
    </div>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card stat-card primary">
            <div class="card-body">
                <h6 class="text-muted mb-2">Total Clients</h6>
                <h3 class="mb-0">125</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card success">
            <div class="card-body">
                <h6 class="text-muted mb-2">Active Clients</h6>
                <h3 class="mb-0">98</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card info">
            <div class="card-body">
                <h6 class="text-muted mb-2">New This Month</h6>
                <h3 class="mb-0">12</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card warning">
            <div class="card-body">
                <h6 class="text-muted mb-2">Pending Follow-ups</h6>
                <h3 class="mb-0">8</h3>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search by name, email, or phone...">
                </div>
            </div>
            <div class="col-md-2">
                <select class="form-select">
                    <option selected>Client Type</option>
                    <option>Individual</option>
                    <option>Company</option>
                </select>
            </div>
            <div class="col-md-2">
                <select class="form-select">
                    <option selected>Status</option>
                    <option>Active</option>
                    <option>Inactive</option>
                    <option>Pending</option>
                </select>
            </div>
            <div class="col-md-2">
                <select class="form-select">
                    <option selected>Sort By</option>
                    <option>Name (A-Z)</option>
                    <option>Name (Z-A)</option>
                    <option>Date Added (Newest)</option>
                    <option>Date Added (Oldest)</option>
                </select>
            </div>
            <div class="col-md-2">
                <button class="btn btn-outline-secondary w-100">
                    <i class="bi bi-arrow-clockwise"></i> Reset
                </button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Client Name</th>
                        <th>Type</th>
                        <th>Contact Info</th>
                        <th>Properties</th>
                        <th>Total Inspections</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <strong>ABC Corporation</strong><br>
                            <small class="text-muted">Client since: Jan 2023</small>
                        </td>
                        <td><span class="badge bg-primary">Company</span></td>
                        <td>
                            <i class="bi bi-envelope"></i> contact@abccorp.com<br>
                            <i class="bi bi-telephone"></i> (555) 123-4567
                        </td>
                        <td>3 Properties</td>
                        <td>28 Inspections</td>
                        <td><span class="badge bg-success">Active</span></td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="/clients/1" class="btn btn-outline-primary" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="/clients/1/edit" class="btn btn-outline-secondary" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button class="btn btn-outline-danger" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Property Holdings Inc</strong><br>
                            <small class="text-muted">Client since: Mar 2023</small>
                        </td>
                        <td><span class="badge bg-primary">Company</span></td>
                        <td>
                            <i class="bi bi-envelope"></i> info@propholdings.com<br>
                            <i class="bi bi-telephone"></i> (555) 234-5678
                        </td>
                        <td>5 Properties</td>
                        <td>42 Inspections</td>
                        <td><span class="badge bg-success">Active</span></td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="/clients/2" class="btn btn-outline-primary" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="/clients/2/edit" class="btn btn-outline-secondary" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button class="btn btn-outline-danger" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>John Anderson</strong><br>
                            <small class="text-muted">Client since: Jun 2024</small>
                        </td>
                        <td><span class="badge bg-info">Individual</span></td>
                        <td>
                            <i class="bi bi-envelope"></i> j.anderson@email.com<br>
                            <i class="bi bi-telephone"></i> (555) 345-6789
                        </td>
                        <td>1 Property</td>
                        <td>5 Inspections</td>
                        <td><span class="badge bg-success">Active</span></td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="/clients/3" class="btn btn-outline-primary" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="/clients/3/edit" class="btn btn-outline-secondary" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button class="btn btn-outline-danger" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Tech Ventures LLC</strong><br>
                            <small class="text-muted">Client since: Sep 2023</small>
                        </td>
                        <td><span class="badge bg-primary">Company</span></td>
                        <td>
                            <i class="bi bi-envelope"></i> hello@techventures.com<br>
                            <i class="bi bi-telephone"></i> (555) 456-7890
                        </td>
                        <td>2 Properties</td>
                        <td>18 Inspections</td>
                        <td><span class="badge bg-success">Active</span></td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="/clients/4" class="btn btn-outline-primary" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="/clients/4/edit" class="btn btn-outline-secondary" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button class="btn btn-outline-danger" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Sarah Martinez</strong><br>
                            <small class="text-muted">Client since: Aug 2024</small>
                        </td>
                        <td><span class="badge bg-info">Individual</span></td>
                        <td>
                            <i class="bi bi-envelope"></i> sarah.m@email.com<br>
                            <i class="bi bi-telephone"></i> (555) 567-8901
                        </td>
                        <td>1 Property</td>
                        <td>3 Inspections</td>
                        <td><span class="badge bg-warning">Pending</span></td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="/clients/5" class="btn btn-outline-primary" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="/clients/5/edit" class="btn btn-outline-secondary" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button class="btn btn-outline-danger" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Manufacturing Co</strong><br>
                            <small class="text-muted">Client since: Feb 2023</small>
                        </td>
                        <td><span class="badge bg-primary">Company</span></td>
                        <td>
                            <i class="bi bi-envelope"></i> info@mfgco.com<br>
                            <i class="bi bi-telephone"></i> (555) 678-9012
                        </td>
                        <td>4 Properties</td>
                        <td>35 Inspections</td>
                        <td><span class="badge bg-success">Active</span></td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="/clients/6" class="btn btn-outline-primary" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="/clients/6/edit" class="btn btn-outline-secondary" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button class="btn btn-outline-danger" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Coastal Properties</strong><br>
                            <small class="text-muted">Client since: May 2024</small>
                        </td>
                        <td><span class="badge bg-primary">Company</span></td>
                        <td>
                            <i class="bi bi-envelope"></i> contact@coastalprop.com<br>
                            <i class="bi bi-telephone"></i> (555) 789-0123
                        </td>
                        <td>6 Properties</td>
                        <td>48 Inspections</td>
                        <td><span class="badge bg-success">Active</span></td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="/clients/7" class="btn btn-outline-primary" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="/clients/7/edit" class="btn btn-outline-secondary" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button class="btn btn-outline-danger" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Robert Chen</strong><br>
                            <small class="text-muted">Client since: Jul 2022</small>
                        </td>
                        <td><span class="badge bg-info">Individual</span></td>
                        <td>
                            <i class="bi bi-envelope"></i> r.chen@email.com<br>
                            <i class="bi bi-telephone"></i> (555) 890-1234
                        </td>
                        <td>2 Properties</td>
                        <td>15 Inspections</td>
                        <td><span class="badge bg-secondary">Inactive</span></td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="/clients/8" class="btn btn-outline-primary" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="/clients/8/edit" class="btn btn-outline-secondary" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button class="btn btn-outline-danger" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4">
            <div>
                <span class="text-muted">Showing 1 to 8 of 125 clients</span>
            </div>
            <nav>
                <ul class="pagination mb-0">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection
