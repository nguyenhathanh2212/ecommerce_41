<?php
namespace App\Repositories\User;

use App\Repositories\EloquentRepository;
use App\Models\User;
use Session;
use Auth;
use DB;

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

	public function getAllUsers()
	{
		return $this->model->
			where('id', '<>', config('setting.num1'))->
			orderBy('is_admin', 'DESC')->
			paginate(config('setting.paginate_admin'));
	}

	public function search($text)
	{
		return $this->model->
			where('firstname', 'LIKE', '%' . $text . '%')->
			where('id', '<>', config('setting.num1'))->
			orderBy('is_admin', 'DESC')->
			paginate(config('setting.paginate_admin'));
	}

	public function changeAdmin($id, $status)
	{
		return $this->model->findOrFail($id)->update([
			'is_admin' => $status
		]);
	}

    public function deleteUser($id)
    {
    	return DB::transaction(function () use ($id) {
                $user = $this->model->findOrFail($id);
                $user->products()->detach();
                $user->comments()->delete();
                $user->delete();
            });
    }
}
