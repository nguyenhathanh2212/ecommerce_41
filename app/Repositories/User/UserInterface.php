<?php
namespace App\Repositories\User;

interface UserInterface
{
    public function getAuthUser($column, $condition);

    public function getAllUsers();

    public function search($text);

    public function changeAdmin($id, $status);

    public function deleteUser($id);
}
