<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends BaseRepository
{
    public function model()
    {
        return User::class;
    }

    public function createUser(
        array $data
    ) {
        return $this->store($data);
    }

    public function getUsers() {
        return $this->get();
    }

    public function getUserByPhone($phone) {
        return $this->model->where('phone', 'LIKE', '%'.$phone.'%')->get();
    }
}
