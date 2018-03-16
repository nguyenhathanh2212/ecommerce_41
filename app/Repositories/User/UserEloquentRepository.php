<?php
namespace App\Repositories\User;

use App\Repositories\EloquentRepository;
use App\Models\User;
use Session;
use Auth;

class UserEloquentRepository extends EloquentRepository implements UserInterface
{
    public function getModel()
    {
        return User::class;
    }

    public function getAuthUser($column, $condition)
    {
    	return $this->model->where($column, $condition)->first();
    }
}
