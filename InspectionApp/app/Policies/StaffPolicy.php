<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class StaffPolicy
{
    public function viewAny(User $user): bool
    {
        return in_array($user->role, ['admin', 'manager', 'company_owner']);
    }

    public function view(User $user, User $staff): bool
    {
        if (!in_array($user->role, ['admin', 'manager', 'company_owner'])) {
            return false;
        }

        if ($user->role === 'admin') {
            return true;
        }

        return $user->company_id === $staff->company_id;
    }

    public function create(User $user): bool
    {
        return in_array($user->role, ['admin', 'manager', 'company_owner']);
    }

    public function update(User $user, User $staff): bool
    {
        if (!in_array($user->role, ['admin', 'manager', 'company_owner'])) {
            return false;
        }

        if ($user->role === 'admin') {
            return true;
        }

        return $user->company_id === $staff->company_id;
    }

    public function delete(User $user, User $staff): bool
    {
        if (!in_array($user->role, ['admin', 'manager', 'company_owner'])) {
            return false;
        }

        if ($user->id === $staff->id) {
            return false;
        }

        if ($user->role === 'admin') {
            return true;
        }

        return $user->company_id === $staff->company_id;
    }

    public function restore(User $user, User $staff): bool
    {
        return $user->role === 'admin' || $user->role === 'company_owner';
    }

    public function forceDelete(User $user, User $staff): bool
    {
        return $user->role === 'admin';
    }
}
