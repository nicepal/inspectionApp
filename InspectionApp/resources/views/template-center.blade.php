@extends('layout')

@section('title', 'Template Center - Inspection Management System')

@section('content')
<div class="page-header">
    <h1 class="page-title">Template Center</h1>
    <p class="text-muted">Browse and save professional inspection templates to your library</p>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('template-center.index') }}" class="row g-3">
            <div class="col-md-6">
                <label for="search" class="form-label">Search Templates</label>
                <input type="text" class="form-control" id="search" name="search" 
                    value="{{ request('search') }}" placeholder="Search by name or description...">
            </div>
            <div class="col-md-4">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" id="category" name="category">
                    <option value="">All Categories</option>
                    <option value="fire_safety" {{ request('category') == 'fire_safety' ? 'selected' : '' }}>Fire Safety</option>
                    <option value="electrical" {{ request('category') == 'electrical' ? 'selected' : '' }}>Electrical</option>
                    <option value="compliance" {{ request('category') == 'compliance' ? 'selected' : '' }}>Compliance</option>
                    <option value="structural" {{ request('category') == 'structural' ? 'selected' : '' }}>Structural</option>
                    <option value="environmental" {{ request('category') == 'environmental' ? 'selected' : '' }}>Environmental</option>
                    <option value="safety_audit" {{ request('category') == 'safety_audit' ? 'selected' : '' }}>Safety Audit</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label d-block">&nbsp;</label>
                <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-search"></i> Search
                </button>
            </div>
            @if(request()->anyFilled(['search', 'category']))
            <div class="col-12">
                <a href="{{ route('template-center.index') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-x-circle"></i> Clear Filters
                </a>
            </div>
            @endif
        </form>
    </div>
</div>

<div class="row g-4">
    @forelse($templates as $template)
    <div class="col-md-6 col-lg-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <h5 class="card-title mb-0">{{ $template->name }}</h5>
                    <span class="badge bg-primary">
                        {{ ucfirst(str_replace('_', ' ', $template->category)) }}
                    </span>
                </div>
                
                <p class="card-text text-muted">{{ $template->description }}</p>
                
                <div class="mb-3">
                    <small class="text-muted">
                        <i class="bi bi-list-check"></i> {{ count($template->fields) }} Fields
                        <span class="mx-2">|</span>
                        <i class="bi bi-graph-up"></i> Used {{ $template->usage_count }} times
                    </small>
                </div>

                <div class="d-grid gap-2">
                    <form action="{{ route('template-center.save', $template) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-download"></i> Save to My Templates
                        </button>
                    </form>
                    <button type="button" class="btn btn-outline-secondary" 
                        data-bs-toggle="modal" data-bs-target="#previewModal{{ $template->id }}">
                        <i class="bi bi-eye"></i> Preview Fields
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="previewModal{{ $template->id }}" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $template->name }} - Field Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p class="text-muted">{{ $template->description }}</p>
                    <hr>
                    <h6>Template Fields:</h6>
                    <div class="list-group">
                        @foreach($template->fields as $field)
                        <div class="list-group-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>{{ $field['name'] }}</strong>
                                    @if($field['required'] ?? false)
                                        <span class="badge bg-danger ms-2">Required</span>
                                    @endif
                                </div>
                                <span class="badge bg-secondary">{{ ucfirst($field['type']) }}</span>
                            </div>
                            @if(isset($field['options']))
                            <small class="text-muted d-block mt-2">
                                Options: {{ implode(', ', $field['options']) }}
                            </small>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form action="{{ route('template-center.save', $template) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-download"></i> Save to My Templates
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="card">
            <div class="card-body text-center py-5">
                <i class="bi bi-folder2-open text-muted" style="font-size: 3rem;"></i>
                <p class="text-muted mt-3">No templates found</p>
                @if(request()->anyFilled(['search', 'category']))
                <a href="{{ route('template-center.index') }}" class="btn btn-outline-secondary">
                    Clear Filters
                </a>
                @endif
            </div>
        </div>
    </div>
    @endforelse
</div>

@if($templates->hasPages())
<div class="d-flex justify-content-center mt-4">
    {{ $templates->links() }}
</div>
@endif
@endsection
