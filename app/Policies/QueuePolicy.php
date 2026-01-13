<?php

namespace App\Policies;

use App\Models\Queue;
use App\Models\User;

class QueuePolicy
{
    /**
     * User hanya boleh cancel antrian miliknya sendiri
     * dan status masih WAITING
     */
    public function cancel(User $user, Queue $queue): bool
    {
        return $queue->user_id === $user->id
            && $queue->status === 'WAITING';
    }
}