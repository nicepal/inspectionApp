@extends('layout')

@section('title', 'Report Templates - Inspection Management System')
@section('templates-active', 'active')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">My Templates</h1>
        <p class="text-muted">Create and manage your company's inspection templates</p>
    </div>
    <div class="btn-group">
        <a href="{{ route('template-center.index') }}" class="btn btn-outline-primary">
            <i class="bi bi-collection"></i> Browse Template Center
        </a>
        <a href="{{ route('templates.create') }}" class="btn btn-primary">
            <i class="bi bi-file-earmark-plus"></i> Create New Template
        </a>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="row g-4">
    @forelse($templates as $template)
    <div class="col-md-6 col-lg-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <h5 class="card-title mb-0">{{ $template->name }}</h5>
                    @if($template->is_public)
                        <span class="badge bg-info">Public</span>
                    @else
                        <span class="badge bg-secondary">Private</span>
                    @endif
                </div>
                
                <p class="text-muted small mb-2">
                    <i class="bi bi-tag"></i> {{ ucfirst(str_replace('_', ' ', $template->category)) }}
                </p>
                
                @if($template->description)
                <p class="card-text text-muted small">{{ Str::limit($template->description, 100) }}</p>
                @endif
                
                <div class="mt-3 pt-3 border-top">
                    <small class="text-muted">
                        Created by {{ $template->creator->name }}<br>
                        {{ $template->created_at->format('M d, Y') }}
                    </small>
                </div>
            </div>
            <div class="card-footer bg-white">
                <div class="btn-group w-100">
                    <a href="{{ route('templates.show', $template) }}" class="btn btn-sm btn-outline-primary">
                        <i class="bi bi-eye"></i> View
                    </a>
                    @if($template->company_id == Auth::user()->company_id)
                    <a href="{{ route('templates.edit', $template) }}" class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                    <button type="button" class="btn btn-sm btn-outline-danger" 
                        onclick="if(confirm('Are you sure you want to delete this template?')) { document.getElementById('delete-form-{{ $template->id }}').submit(); }">
                        <i class="bi bi-trash"></i>
                    </button>
                    <form id="delete-form-{{ $template->id }}" action="{{ route('templates.destroy', $template) }}" method="POST" class="d-none">
                        @csrf
                        @method('DELETE')
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="card">
            <div class="card-body text-center py-5">
                <i class="bi bi-file-earmark-text text-muted" style="font-size: 3rem;"></i>
                <p class="text-muted mt-3">No templates found</p>
                <a href="{{ route('templates.create') }}" class="btn btn-primary">
                    <i class="bi bi-file-earmark-plus"></i> Create Your First Template
                </a>
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
