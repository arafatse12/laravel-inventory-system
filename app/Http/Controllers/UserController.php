<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;

class UserController extends Controller
{
    private $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function index(){
        $users = $this->userRepository->all();
        return $users;
    }
    public function show($userId){
        $user =  $this->userRepository->findById($userId);
        return $user;
    }

    public function update($userId){
        $this->userRepository->update($userId);
        return redirect('user/show/'.$userId);
    }
    public function destroy($userId){
        $this->userRepository->delete($userId);
        return redirect('user/all/');
    }
}
