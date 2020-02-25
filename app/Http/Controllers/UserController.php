<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\User\UserRepository; // repository pattern

class UserController extends Controller
{
    public function test(Request $request)
    {   
        $repo = new UserRepository();
        $res = $repo->sampleOne($request);  
        return $res;
    }
}
