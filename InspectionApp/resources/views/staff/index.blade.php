@extends('layout')

@section('title', 'Staff Management - Inspection Management System')
@section('staff-active', 'active')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Staff Management</h1>
        <p class="text-muted">Manage team members and their roles</p>
    </div>
    <div>
        <a href="{{ route('staff.create') }}" class="btn btn-primary">
            <i class="bi bi-person-plus"></i> Add Staff Member
        </a>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card stat-card primary">
            <div class="card-body">
                <h6 class="text-muted mb-2">Total Staff</h6>
                <h3 class="mb-0">{{ $staff->count() }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card success">
            <div class="card-body">
                <h6 class="text-muted mb-2">Active</h6>
                <h3 class="mb-0">{{ $staff->where('status', 'active')->count() }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card warning">
            <div class="card-body">
                <h6 class="text-muted mb-2">Inspectors</h6>
                <h3 class="mb-0">{{ $staff->where('role', 'inspector')->count() }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card info">
            <div class="card-body">
                <h6 class="text-muted mb-2">Managers</h6>
                <h3 class="mb-0">{{ $staff->where('role', 'manager')->count() }}</h3>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Team Members</h5>
        <div class="input-group" style="max-width: 300px;">
            <input type="text" class="form-control" id="searchStaff" placeholder="Search staff...">
            <button class="btn btn-outline-secondary" type="button">
                <i class="bi bi-search"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Joined</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($staff as $member)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="avatar-circle me-2">
                                    {{ strtoupper(substr($member->name, 0, 1)) }}
                                </div>
                                <strong>{{ $member->name }}</strong>
                            </div>
                        </td>
                        <td>{{ $member->email }}</td>
                        <td>{{ $member->phone ?? '-' }}</td>
                        <td>
                            <span class="badge 
                                @if($member->role == 'manager') bg-primary
                                @elseif($member->role == 'inspector') bg-info
                                @else bg-secondary
                                @endif">
                                {{ ucfirst($member->role) }}
                            </span>
                        </td>
                        <td>
                            <span class="badge {{ $member->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                                {{ ucfirst($member->status) }}
                            </span>
                        </td>
                        <td>{{ $member->created_at->format('M d, Y') }}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('staff.show', $member) }}" class="btn btn-outline-primary" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('staff.edit', $member) }}" class="btn btn-outline-secondary" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                @if($member->id != auth()->id())
                                <form action="{{ route('staff.destroy', $member) }}" method="POST" class="d-inline" 
                                    onsubmit="return confirm('Are you sure you want to delete this staff member?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <i class="bi bi-people text-muted" style="font-size: 3rem;"></i>
                            <p class="text-muted mt-3">No staff members found</p>
                            <a href="{{ route('staff.create') }}" class="btn btn-primary">
                                <i class="bi bi-person-plus"></i> Add Your First Staff Member
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
.avatar-circle {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 16px;
}
</style>
@endsection
