<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SearchUserController extends Controller
{

    public function index()
    {
        return User::
         orderBy('created_at','DESC')
        ->select('name','email',DB::raw('DATE_FORMAT(birthday, "%b %d, %Y") as birthday'))
        ->get();
    }

}
