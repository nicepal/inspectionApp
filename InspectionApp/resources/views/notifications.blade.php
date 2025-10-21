@extends('layout')

@section('title', 'Notifications - Inspection Management System')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Notifications</h1>
        <p class="text-muted">View all your notifications and alerts</p>
    </div>
    <div>
        <form action="{{ route('notifications.read-all') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-outline-primary">
                <i class="bi bi-check2-all"></i> Mark All as Read
            </button>
        </form>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="card">
    <div class="card-body">
        @forelse($notifications as $notification)
        <div class="alert @if($notification->isRead()) alert-secondary @else alert-primary @endif d-flex justify-content-between align-items-start" role="alert">
            <div class="flex-grow-1">
                <div class="d-flex align-items-center mb-2">
                    <span class="badge 
                        @if($notification->priority == 'urgent') bg-danger
                        @elseif($notification->priority == 'high') bg-warning
                        @else bg-info
                        @endif me-2">
                        {{ ucfirst($notification->priority) }}
                    </span>
                    <h6 class="mb-0">{{ $notification->title }}</h6>
                    @if(!$notification->isRead())
                    <span class="badge bg-primary ms-2">New</span>
                    @endif
                </div>
                <p class="mb-2">{{ $notification->message }}</p>
                <small class="text-muted">
                    <i class="bi bi-clock"></i> {{ $notification->created_at->diffForHumans() }}
                </small>
            </div>
            <div class="ms-3">
                @if(!$notification->isRead())
                <form action="{{ route('notifications.read', $notification) }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-primary" title="Mark as read">
                        <i class="bi bi-check"></i>
                    </button>
                </form>
                @endif
                @if($notification->action_url)
                <a href="{{ $notification->action_url }}" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-arrow-right"></i>
                </a>
                @endif
            </div>
        </div>
        @empty
        <div class="text-center py-5">
            <i class="bi bi-bell text-muted" style="font-size: 3rem;"></i>
            <p class="text-muted mt-3">No notifications</p>
        </div>
        @endforelse

        @if($notifications->hasPages())
        <div class="d-flex justify-content-center mt-4">
            {{ $notifications->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
