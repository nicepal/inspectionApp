<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;
use Illuminate\Http\Request;

class AuditLogController extends Controller
{
    public function index(Request $request)
    {
        $query = AuditLog::where('company_id', auth()->user()->company_id)
            ->with('user')
            ->latest();

        if ($request->has('action') && $request->action) {
            $query->where('action', $request->action);
        }

        if ($request->has('model') && $request->model) {
            $query->where('model_type', 'like', '%' . $request->model . '%');
        }

        if ($request->has('user_id') && $request->user_id) {
            $query->where('user_id', $request->user_id);
        }

        $logs = $query->paginate(50);

        return view('audit-logs', compact('logs'));
    }
}
