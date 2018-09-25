<?php

namespace App\Policies;

use App\Company;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyPolicy
{
    use HandlesAuthorization;

    public function myCompany(User $user, Company $company)
    {
        return $user->member->company_id === $company->id;
    }
}
