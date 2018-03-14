<?php

namespace App\Repositories;

interface RepositoryInterface
{
    public function all($columns = ['*']);

    public function find($id, $column = ['*']);

    public function findOrFail($id, $column = ['*']);

    public function paginate($limit = null, $column = ['*']);

    public function create(array $attributes);

    public function update($id, array $attributes);

    public function delete($id);

    public function findByField($field, $value);

    public function get($columns = ['*']);

    public function with($relations);

    public function where($column, $operator, $condition);

    public function orderBy($column, $keyword);

    public function count();

    public function take($number);

    public function createMany($array);

    public function whereIn($column, $values);
}
