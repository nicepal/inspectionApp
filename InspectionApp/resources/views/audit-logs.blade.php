@extends('layout')

@section('title', 'Audit Logs - Inspection Management System')

@section('content')
<div class="page-header">
    <h1 class="page-title">Audit Logs</h1>
    <p class="text-muted">Track all system activities and changes</p>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Timestamp</th>
                        <th>User</th>
                        <th>Action</th>
                        <th>Model</th>
                        <th>IP Address</th>
                        <th style="width: 100px;">Details</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($logs as $log)
                    <tr>
                        <td>{{ $log->created_at->format('M d, Y h:i A') }}</td>
                        <td>{{ $log->user->name ?? 'System' }}</td>
                        <td>
                            <span class="badge 
                                @if($log->action == 'created') bg-success
                                @elseif($log->action == 'updated') bg-info
                                @elseif($log->action == 'deleted') bg-danger
                                @else bg-secondary
                                @endif">
                                {{ ucfirst($log->action) }}
                            </span>
                        </td>
                        <td>
                            <strong>{{ $log->model_name }}</strong>
                            @if($log->model_id)
                            <br><small class="text-muted">ID: {{ $log->model_id }}</small>
                            @endif
                        </td>
                        <td><small class="font-monospace">{{ $log->ip_address }}</small></td>
                        <td>
                            <button type="button" class="btn btn-sm btn-outline-primary" 
                                data-bs-toggle="modal" data-bs-target="#logModal{{ $log->id }}">
                                <i class="bi bi-eye"></i>
                            </button>
                        </td>
                    </tr>

                    <div class="modal fade" id="logModal{{ $log->id }}" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Audit Log Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <dl class="row">
                                        <dt class="col-sm-3">Timestamp</dt>
                                        <dd class="col-sm-9">{{ $log->created_at->format('M d, Y h:i:s A') }}</dd>

                                        <dt class="col-sm-3">User</dt>
                                        <dd class="col-sm-9">{{ $log->user->name ?? 'System' }}</dd>

                                        <dt class="col-sm-3">Action</dt>
                                        <dd class="col-sm-9">{{ ucfirst($log->action) }}</dd>

                                        <dt class="col-sm-3">Model</dt>
                                        <dd class="col-sm-9">{{ $log->model_type }} (ID: {{ $log->model_id }})</dd>

                                        <dt class="col-sm-3">IP Address</dt>
                                        <dd class="col-sm-9">{{ $log->ip_address }}</dd>

                                        @if($log->old_values)
                                        <dt class="col-sm-3">Old Values</dt>
                                        <dd class="col-sm-9">
                                            <pre class="bg-light p-2 rounded">{{ json_encode($log->old_values, JSON_PRETTY_PRINT) }}</pre>
                                        </dd>
                                        @endif

                                        @if($log->new_values)
                                        <dt class="col-sm-3">New Values</dt>
                                        <dd class="col-sm-9">
                                            <pre class="bg-light p-2 rounded">{{ json_encode($log->new_values, JSON_PRETTY_PRINT) }}</pre>
                                        </dd>
                                        @endif
                                    </dl>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5">
                            <i class="bi bi-journal-text text-muted" style="font-size: 3rem;"></i>
                            <p class="text-muted mt-3">No audit logs found</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($logs->hasPages())
        <div class="d-flex justify-content-center mt-4">
            {{ $logs->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
