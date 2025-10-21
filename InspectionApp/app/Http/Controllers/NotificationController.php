<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::where('company_id', auth()->user()->company_id)
            ->where(function($query) {
                $query->whereNull('user_id')
                      ->orWhere('user_id', auth()->id());
            })
            ->latest()
            ->paginate(20);

        return view('notifications', compact('notifications'));
    }

    public function markAsRead(Notification $notification)
    {
        if ($notification->user_id != auth()->id() && $notification->user_id !== null) {
            abort(403);
        }

        $notification->markAsRead();

        return back()->with('success', 'Notification marked as read');
    }

    public function markAllAsRead()
    {
        Notification::where('company_id', auth()->user()->company_id)
            ->where(function($query) {
                $query->whereNull('user_id')
                      ->orWhere('user_id', auth()->id());
            })
            ->whereNull('read_at')
            ->update(['read_at' => now()]);

        return back()->with('success', 'All notifications marked as read');
    }
}
