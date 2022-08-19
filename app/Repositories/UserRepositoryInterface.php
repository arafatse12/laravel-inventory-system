<?php
namespace App\Repositories;

use App\User;

interface UserRepositoryInterface
{
    public function all();
    public function findById($userId);
    public function update($userId);
    public function delete($userId);
}
