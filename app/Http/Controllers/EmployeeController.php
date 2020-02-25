<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Employee\EmployeeRepository; // repository pattern
use App\Repositories\User\UserRepository; // repository pattern

class EmployeeController extends Controller
{
    public function register(Request $request)
    {
        //comment one repository usage to check the working
        $repo = new UserRepository(); // user repository inside employee controller
        $res = $repo->sampleOne($request);  
        return $res;

        $respo = new EmployeeRepository(); // employee repository insdie employee controller
        $response = $respo->employeeRegister($request);
        return $response;
    }
}
