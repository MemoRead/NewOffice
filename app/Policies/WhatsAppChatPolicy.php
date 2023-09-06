<?php

namespace App\Policies;

use App\Models\User;
use App\Models\WhatsAppChat;
use Illuminate\Auth\Access\Response;

class WhatsAppChatPolicy
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
    public function view(User $user, WhatsAppChat $whatsAppChat): bool
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
    public function update(User $user, WhatsAppChat $whatsAppChat): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, WhatsAppChat $whatsAppChat): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, WhatsAppChat $whatsAppChat): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, WhatsAppChat $whatsAppChat): bool
    {
        //
    }
}
