<?php

namespace App\Policies;

use App\Member;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MemberPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @param Member $member
     * @return bool
     */
    public function self(User $user, Member $member)
    {
        return $user->member->id === $member->id;
    }


    /**
     * @param User $user
     * @param $member
     * @return bool
     */
    public function colleague(User $user, $member)
    {
        return $user->member->company_id === $member->company_id;
    }


    /**
     * @param User $user
     * @return bool
     */
    public function pdg(User $user)
    {
        return $user->member->category->category === 'pdg';
    }


    /**
     * @param User $user
     * @return bool
     */
    public function manager(User $user)
    {
        return $user->member->category->category === 'manager';
    }


    /**
     * @param User $user
     * @return bool
     */
    public function accounting(User $user)
    {
        return $user->member->category->category === 'accounting';
    }


    /**
     * @param User $user
     * @return bool
     */
    public function commercial(User $user)
    {
        return $user->member->category->category === 'commercial';
    }


    /**
     * @param User $user
     * @return bool
     */
    public function storekeeper(User $user)
    {
        return $user->member->category->category === 'storekeeper';
    }


    /**
     * @param User $user
     * @return bool
     */
    public function delivery(User $user)
    {
        return $user->member->category->category === 'delivery';
    }

}
