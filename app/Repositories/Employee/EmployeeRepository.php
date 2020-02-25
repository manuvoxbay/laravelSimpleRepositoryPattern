<?php 
 	namespace App\Repositories\Employee;
	use App\Repositories\Employee\EmployeeInterface;
	use App\User;

	class EmployeeRepository implements EmployeeInterface
	{
		public function employeeRegister($request)
		{
			return response()->json([
                'status' => true,
                'message' => 'insdie the employee repo',
                'data' => $request->all()
            ]);
		}
	}
?>
