<?php
namespace App\Repositories\User;

interface UserInterface
{
    public function getAuthUser($column, $condition);
}
