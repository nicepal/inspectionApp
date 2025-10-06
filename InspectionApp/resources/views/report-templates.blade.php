@extends('layout')

@section('title', 'Report Templates - Inspection Management System')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Report Templates</h1>
        <p class="text-muted">Create and manage inspection report templates</p>
    </div>
    <div>
        <a href="/report-templates/create" class="btn btn-primary">
            <i class="bi bi-file-earmark-plus"></i> Create New Template
        </a>
    </div>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card stat-card primary">
            <div class="card-body">
                <h6 class="text-muted mb-2">Total Templates</h6>
                <h3 class="mb-0">24</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card success">
            <div class="card-body">
                <h6 class="text-muted mb-2">Active Templates</h6>
                <h3 class="mb-0">18</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card warning">
            <div class="card-body">
                <h6 class="text-muted mb-2">Draft Templates</h6>
                <h3 class="mb-0">4</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card info">
            <div class="card-body">
                <h6 class="text-muted mb-2">Most Used</h6>
                <h3 class="mb-0">Fire Safety</h3>
            </div>
        </div>
    </div>
</div>

<div class="card mb-4">
    <div class="card-body">
        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search templates...">
                </div>
            </div>
            <div class="col-md-3">
                <select class="form-select">
                    <option selected>All Categories</option>
                    <option>Fire Safety</option>
                    <option>Structural</option>
                    <option>Compliance</option>
                    <option>Safety Audit</option>
                    <option>Electrical</option>
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-select">
                    <option selected>All Status</option>
                    <option>Active</option>
                    <option>Draft</option>
                    <option>Archived</option>
                </select>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <span class="badge bg-primary">Fire Safety</span>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-link text-secondary" data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-pencil"></i> Edit</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-files"></i> Duplicate</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash"></i> Delete</a></li>
                                </ul>
                            </div>
                        </div>
                        <h5 class="card-title">Fire Safety Inspection Template</h5>
                        <p class="text-muted small mb-3">Comprehensive fire safety checklist including alarms, sprinklers, exits, and extinguishers.</p>
                        <div class="mb-3">
                            <small class="text-muted">
                                <i class="bi bi-check-circle"></i> 28 checkpoints<br>
                                <i class="bi bi-calendar3"></i> Last updated: Sep 15, 2025<br>
                                <i class="bi bi-graph-up"></i> Used 145 times
                            </small>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="/report-templates/1" class="btn btn-sm btn-outline-primary flex-grow-1">
                                <i class="bi bi-eye"></i> View
                            </a>
                            <a href="/report-templates/1/use" class="btn btn-sm btn-primary flex-grow-1">
                                <i class="bi bi-file-earmark-text"></i> Use Template
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <span class="badge bg-success">Structural</span>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-link text-secondary" data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-pencil"></i> Edit</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-files"></i> Duplicate</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash"></i> Delete</a></li>
                                </ul>
                            </div>
                        </div>
                        <h5 class="card-title">Structural Assessment Template</h5>
                        <p class="text-muted small mb-3">Detailed structural integrity evaluation for buildings and infrastructure.</p>
                        <div class="mb-3">
                            <small class="text-muted">
                                <i class="bi bi-check-circle"></i> 35 checkpoints<br>
                                <i class="bi bi-calendar3"></i> Last updated: Aug 22, 2025<br>
                                <i class="bi bi-graph-up"></i> Used 98 times
                            </small>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="/report-templates/2" class="btn btn-sm btn-outline-primary flex-grow-1">
                                <i class="bi bi-eye"></i> View
                            </a>
                            <a href="/report-templates/2/use" class="btn btn-sm btn-primary flex-grow-1">
                                <i class="bi bi-file-earmark-text"></i> Use Template
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <span class="badge bg-info">Compliance</span>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-link text-secondary" data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-pencil"></i> Edit</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-files"></i> Duplicate</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash"></i> Delete</a></li>
                                </ul>
                            </div>
                        </div>
                        <h5 class="card-title">Building Compliance Checklist</h5>
                        <p class="text-muted small mb-3">Standard compliance verification for building codes and regulations.</p>
                        <div class="mb-3">
                            <small class="text-muted">
                                <i class="bi bi-check-circle"></i> 42 checkpoints<br>
                                <i class="bi bi-calendar3"></i> Last updated: Sep 1, 2025<br>
                                <i class="bi bi-graph-up"></i> Used 112 times
                            </small>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="/report-templates/3" class="btn btn-sm btn-outline-primary flex-grow-1">
                                <i class="bi bi-eye"></i> View
                            </a>
                            <a href="/report-templates/3/use" class="btn btn-sm btn-primary flex-grow-1">
                                <i class="bi bi-file-earmark-text"></i> Use Template
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <span class="badge bg-danger">Safety Audit</span>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-link text-secondary" data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-pencil"></i> Edit</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-files"></i> Duplicate</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash"></i> Delete</a></li>
                                </ul>
                            </div>
                        </div>
                        <h5 class="card-title">Workplace Safety Audit</h5>
                        <p class="text-muted small mb-3">Complete workplace safety evaluation including OSHA compliance.</p>
                        <div class="mb-3">
                            <small class="text-muted">
                                <i class="bi bi-check-circle"></i> 38 checkpoints<br>
                                <i class="bi bi-calendar3"></i> Last updated: Jul 30, 2025<br>
                                <i class="bi bi-graph-up"></i> Used 76 times
                            </small>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="/report-templates/4" class="btn btn-sm btn-outline-primary flex-grow-1">
                                <i class="bi bi-eye"></i> View
                            </a>
                            <a href="/report-templates/4/use" class="btn btn-sm btn-primary flex-grow-1">
                                <i class="bi bi-file-earmark-text"></i> Use Template
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <span class="badge bg-warning text-dark">Electrical</span>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-link text-secondary" data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-pencil"></i> Edit</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-files"></i> Duplicate</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash"></i> Delete</a></li>
                                </ul>
                            </div>
                        </div>
                        <h5 class="card-title">Electrical Systems Inspection</h5>
                        <p class="text-muted small mb-3">Electrical system safety and compliance verification template.</p>
                        <div class="mb-3">
                            <small class="text-muted">
                                <i class="bi bi-check-circle"></i> 32 checkpoints<br>
                                <i class="bi bi-calendar3"></i> Last updated: Sep 10, 2025<br>
                                <i class="bi bi-graph-up"></i> Used 64 times
                            </small>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="/report-templates/5" class="btn btn-sm btn-outline-primary flex-grow-1">
                                <i class="bi bi-eye"></i> View
                            </a>
                            <a href="/report-templates/5/use" class="btn btn-sm btn-primary flex-grow-1">
                                <i class="bi bi-file-earmark-text"></i> Use Template
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <span class="badge bg-secondary">Draft</span>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-link text-secondary" data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-pencil"></i> Edit</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-files"></i> Duplicate</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash"></i> Delete</a></li>
                                </ul>
                            </div>
                        </div>
                        <h5 class="card-title">Environmental Impact Assessment</h5>
                        <p class="text-muted small mb-3">Template for environmental compliance and impact evaluation.</p>
                        <div class="mb-3">
                            <small class="text-muted">
                                <i class="bi bi-check-circle"></i> 24 checkpoints<br>
                                <i class="bi bi-calendar3"></i> Last updated: Oct 2, 2025<br>
                                <i class="bi bi-graph-up"></i> Used 0 times
                            </small>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="/report-templates/6" class="btn btn-sm btn-outline-primary flex-grow-1">
                                <i class="bi bi-eye"></i> View
                            </a>
                            <a href="/report-templates/6/edit" class="btn btn-sm btn-warning flex-grow-1">
                                <i class="bi bi-pencil"></i> Continue Editing
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
