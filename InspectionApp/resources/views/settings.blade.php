@extends('layout')

@section('title', 'Settings - Inspection Management System')

@section('content')
<div class="page-header">
    <h1 class="page-title">Settings</h1>
    <p class="text-muted">Manage your company and account settings</p>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="row">
    <div class="col-md-3">
        <div class="list-group">
            <a href="#company" class="list-group-item list-group-item-action active" data-bs-toggle="list">
                <i class="bi bi-building"></i> Company Settings
            </a>
            <a href="#account" class="list-group-item list-group-item-action" data-bs-toggle="list">
                <i class="bi bi-person"></i> Account Settings
            </a>
            <a href="#preferences" class="list-group-item list-group-item-action" data-bs-toggle="list">
                <i class="bi bi-gear"></i> Preferences
            </a>
        </div>
    </div>

    <div class="col-md-9">
        <div class="tab-content">
            <div class="tab-pane fade show active" id="company">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Company Information</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('settings.update') }}" method="POST">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="company_name" class="form-label">Company Name</label>
                                <input type="text" class="form-control" id="company_name" name="company_name" 
                                    value="{{ old('company_name', $company->name) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="company_email" class="form-label">Company Email</label>
                                <input type="email" class="form-control" id="company_email" name="company_email" 
                                    value="{{ old('company_email', $company->email) }}">
                            </div>

                            <div class="mb-3">
                                <label for="company_phone" class="form-label">Company Phone</label>
                                <input type="text" class="form-control" id="company_phone" name="company_phone" 
                                    value="{{ old('company_phone', $company->phone) }}">
                            </div>

                            <div class="mb-3">
                                <label for="company_address" class="form-label">Company Address</label>
                                <textarea class="form-control" id="company_address" name="company_address" 
                                    rows="3">{{ old('company_address', $company->address) }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Save Changes
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="account">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Account Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" value="{{ $user->name }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" value="{{ $user->email }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <input type="text" class="form-control" value="{{ ucfirst($user->role) }}" readonly>
                        </div>

                        <a href="{{ route('profile.edit') }}" class="btn btn-secondary">
                            <i class="bi bi-pencil"></i> Edit Profile
                        </a>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="preferences">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">User Preferences</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('settings.update') }}" method="POST">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="timezone" class="form-label">Timezone</label>
                                <select class="form-select" id="timezone" name="timezone">
                                    <option value="UTC">UTC</option>
                                    <option value="America/New_York">Eastern Time (ET)</option>
                                    <option value="America/Chicago">Central Time (CT)</option>
                                    <option value="America/Denver">Mountain Time (MT)</option>
                                    <option value="America/Los_Angeles">Pacific Time (PT)</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="date_format" class="form-label">Date Format</label>
                                <select class="form-select" id="date_format" name="date_format">
                                    <option value="m/d/Y">MM/DD/YYYY</option>
                                    <option value="d/m/Y">DD/MM/YYYY</option>
                                    <option value="Y-m-d">YYYY-MM-DD</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="time_format" class="form-label">Time Format</label>
                                <select class="form-select" id="time_format" name="time_format">
                                    <option value="12">12-hour (AM/PM)</option>
                                    <option value="24">24-hour</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Save Preferences
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
