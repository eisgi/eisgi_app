<?php

namespace App\Policies;

use App\Models\ConseilDiscipline;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ConseilDisciplinePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ConseilDiscipline $conseilDiscipline): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ConseilDiscipline $conseilDiscipline): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ConseilDiscipline $conseilDiscipline): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ConseilDiscipline $conseilDiscipline): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ConseilDiscipline $conseilDiscipline): bool
    {
        //
    }
}
