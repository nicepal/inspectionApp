@extends('layout')

@section('title', 'Properties - Inspection Management System')
@section('properties-active', 'active')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Properties</h1>
        <p class="text-muted">Manage all properties and their inspection details</p>
    </div>
    <div>
        <a href="/properties/add" class="btn btn-primary">
            <i class="bi bi-building-add"></i> Add New Property
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search by name, location, or client...">
                </div>
            </div>
            <div class="col-md-2">
                <select class="form-select">
                    <option selected>Property Type</option>
                    <option>Residential</option>
                    <option>Commercial</option>
                    <option>Industrial</option>
                    <option>Mixed Use</option>
                </select>
            </div>
            <div class="col-md-2">
                <select class="form-select">
                    <option selected>Status</option>
                    <option>Available for Inspection</option>
                    <option>Pending</option>
                    <option>In Progress</option>
                    <option>Completed</option>
                    <option>Requires Follow-up</option>
                </select>
            </div>
            <div class="col-md-2">
                <select class="form-select">
                    <option selected>Inspector</option>
                    <option>John Smith</option>
                    <option>Sarah Johnson</option>
                    <option>Michael Brown</option>
                    <option>Emily Davis</option>
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
                        <th>Property Name</th>
                        <th>Type</th>
                        <th>Client Name</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Last Inspection</th>
                        <th>Next Scheduled</th>
                        <th>Inspector</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <strong>Sunset Plaza Complex</strong>
                        </td>
                        <td><span class="badge bg-primary">Commercial</span></td>
                        <td>ABC Corporation</td>
                        <td>
                            123 Main St<br>
                            <small class="text-muted">Los Angeles, CA 90001</small>
                        </td>
                        <td><span class="badge bg-success">Completed</span></td>
                        <td>Sep 15, 2025</td>
                        <td>Oct 8, 2025</td>
                        <td>John Smith</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="/properties/1" class="btn btn-outline-primary" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="/properties/1/edit" class="btn btn-outline-secondary" title="Edit">
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
                            <strong>Green Valley Apartments</strong>
                        </td>
                        <td><span class="badge bg-info">Residential</span></td>
                        <td>Property Holdings Inc</td>
                        <td>
                            456 Oak Ave<br>
                            <small class="text-muted">San Diego, CA 92101</small>
                        </td>
                        <td><span class="badge bg-warning">Pending</span></td>
                        <td>Aug 22, 2025</td>
                        <td>Oct 9, 2025</td>
                        <td>Sarah Johnson</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="/properties/2" class="btn btn-outline-primary" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="/properties/2/edit" class="btn btn-outline-secondary" title="Edit">
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
                            <strong>Downtown Office Tower</strong>
                        </td>
                        <td><span class="badge bg-primary">Commercial</span></td>
                        <td>Tech Ventures LLC</td>
                        <td>
                            789 Business Blvd<br>
                            <small class="text-muted">San Francisco, CA 94102</small>
                        </td>
                        <td><span class="badge bg-primary">In Progress</span></td>
                        <td>Sep 1, 2025</td>
                        <td>Oct 10, 2025</td>
                        <td>Michael Brown</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="/properties/3" class="btn btn-outline-primary" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="/properties/3/edit" class="btn btn-outline-secondary" title="Edit">
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
                            <strong>Riverside Industrial Park</strong>
                        </td>
                        <td><span class="badge bg-secondary">Industrial</span></td>
                        <td>Manufacturing Co</td>
                        <td>
                            321 River Rd<br>
                            <small class="text-muted">Sacramento, CA 95814</small>
                        </td>
                        <td><span class="badge bg-danger">Requires Follow-up</span></td>
                        <td>Sep 5, 2025</td>
                        <td>Oct 11, 2025</td>
                        <td>Emily Davis</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="/properties/4" class="btn btn-outline-primary" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="/properties/4/edit" class="btn btn-outline-secondary" title="Edit">
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
                            <strong>Marina Bay Residences</strong>
                        </td>
                        <td><span class="badge bg-info">Residential</span></td>
                        <td>Coastal Properties</td>
                        <td>
                            555 Bay St<br>
                            <small class="text-muted">Oakland, CA 94607</small>
                        </td>
                        <td><span class="badge bg-light text-dark">Available for Inspection</span></td>
                        <td>Jul 30, 2025</td>
                        <td>Oct 12, 2025</td>
                        <td>John Smith</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="/properties/5" class="btn btn-outline-primary" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="/properties/5/edit" class="btn btn-outline-secondary" title="Edit">
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
                            <strong>Harbor View Complex</strong>
                        </td>
                        <td><span class="badge bg-warning text-dark">Mixed Use</span></td>
                        <td>Harbor Developments</td>
                        <td>
                            888 Harbor Dr<br>
                            <small class="text-muted">Long Beach, CA 90802</small>
                        </td>
                        <td><span class="badge bg-success">Completed</span></td>
                        <td>Sep 20, 2025</td>
                        <td>Nov 5, 2025</td>
                        <td>Sarah Johnson</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="/properties/6" class="btn btn-outline-primary" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="/properties/6/edit" class="btn btn-outline-secondary" title="Edit">
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
                            <strong>Skyline Plaza</strong>
                        </td>
                        <td><span class="badge bg-primary">Commercial</span></td>
                        <td>Skyline Holdings</td>
                        <td>
                            777 Sky Way<br>
                            <small class="text-muted">San Jose, CA 95110</small>
                        </td>
                        <td><span class="badge bg-warning">Pending</span></td>
                        <td>Sep 10, 2025</td>
                        <td>Oct 15, 2025</td>
                        <td>Michael Brown</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="/properties/7" class="btn btn-outline-primary" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="/properties/7/edit" class="btn btn-outline-secondary" title="Edit">
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
                            <strong>Central Park Tower</strong>
                        </td>
                        <td><span class="badge bg-info">Residential</span></td>
                        <td>Park Properties LLC</td>
                        <td>
                            999 Park Ave<br>
                            <small class="text-muted">Fresno, CA 93721</small>
                        </td>
                        <td><span class="badge bg-light text-dark">Available for Inspection</span></td>
                        <td>Aug 28, 2025</td>
                        <td>Oct 18, 2025</td>
                        <td>Emily Davis</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="/properties/8" class="btn btn-outline-primary" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="/properties/8/edit" class="btn btn-outline-secondary" title="Edit">
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
                <span class="text-muted">Showing 1 to 8 of 287 properties</span>
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
