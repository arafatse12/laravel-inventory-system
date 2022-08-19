<?php

namespace App\Repositories;

use App\User;

class UserRepository implements UserRepositoryInterface
{
    public function all()
    {
       return User::
        orderby('name')
        ->get();
    }
    public function findById($userId){
        $user = User::where('id','=',$userId)->firstOrFail();
        return $user;
    }

    public function update($userId){
        $user =  User::where('id','=',$userId)->firstOrFail();
        $user->update(request()->only('name'));
    }
    public function delete($userId){
        $user =  User::where('id','=',$userId)->delete();
    }

}

