<?php
namespace App\Repositories;

abstract class EloquentRepository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel();

    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    public function all($columns = ['*'])
    {
        return $this->model->all($columns);
    }

    public function find($id, $columns = ['*'])
    {
        return $this->model->find($id, $columns);
    }

    public function findOrFail($id, $columns = ['*'])
    {
        return $this->model->findOrFail($id, $columns);
    }

    public function paginate($limit = null, $columns = ['*'])
    {
        $paginate = $limit ? $limit : config('setting.paginate');

        return $this->model->paginate($paginate, $columns);
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);;
    }

    public function update($id, array $attributes)
    {
        return $this->model->where('id', $id)->update($attributes);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function findByField($field, $value)
    {
        return $this->model->where($field, '=', $value);
    }

    public function get($columns = ['*'])
    {
        return $this->model->get($columns);
    }

    public function with($relations)
    {
        if (is_string($relations)) {
            $relations = func_get_args($relations);
        }

        return $this->model->with($relations);
    }

    public function where($column, $operator = null, $condition = null)
    {
        return $this->model->where($column, $operator, $condition);
    }

    public function orderBy($column, $sortBy)
    {
        return $this->model->orderBy($column, $sortBy);
    }

    public function count()
    {
        return $this->model->count();
    }

    public function take($number)
    {
        return $this->model->take($number);
    }

    public function createMany($array)
    {
        return $this->model->createMany($array);
    }

    public function whereIn($column, $values)
    {
        $values = is_array($values) ? $values : [$values];

        return $this->model->whereIn($column, $values);
    }
}
