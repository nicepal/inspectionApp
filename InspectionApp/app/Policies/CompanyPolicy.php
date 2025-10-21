<?php

namespace App\Policies;

use App\Models\Company;
use App\Models\User;

class CompanyPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Company $company): bool
    {
        return $user->isAdmin() || $user->company_id === $company->id;
    }

    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    public function update(User $user, Company $company): bool
    {
        return $user->isAdmin() || 
               ($user->company_id === $company->id && ($user->isCompanyOwner() || $user->isManager()));
    }

    public function delete(User $user, Company $company): bool
    {
        return $user->isAdmin();
    }

    public function restore(User $user, Company $company): bool
    {
        return $user->isAdmin();
    }

    public function forceDelete(User $user, Company $company): bool
    {
        return $user->isAdmin();
    }
}
