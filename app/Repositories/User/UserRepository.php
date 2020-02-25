<?php 

namespace App\Repositories\User;
use App\Repositories\User\RepositoryInterface;
use App\User;
use Validator;

class UserRepository implements RepositoryInterface
{
    public function sampleOne($request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        if ($validator->fails()) {
            //validation fail
            return response()->json([
                'status' => false,
                'error' => $validator->errors()->first(),
            ], 400);
        }
    
        //validation completed successfully
        // Do all your actons here
        return response()->json([
            'status' => true,
            'message' => 'validation success',
            'data' => $request->all()
        ], 200);
    }
    public function sampleTwo()
    {
        return "inside The Sample Two";
    }
}