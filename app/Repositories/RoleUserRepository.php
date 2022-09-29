<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class RoleUserRepository
{
    public function createRoleUser(
        $user_id,
        $role_id
    ) {
        return DB::table('role_user')->insert([
            'user_id' => $user_id,
            'role_id' => $role_id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    public function removeRoleUser(
        $user_id,
        $role_id
    ) {
        return DB::table('role_user')->where('user_id', $user_id)
            ->where('role_id', $role_id)
            ->delete();
    }
}
