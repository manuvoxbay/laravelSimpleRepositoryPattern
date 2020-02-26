
<h2>Laravel Repository Pattern</h2>
Reference : https://medium.com/employbl/use-the-repository-design-pattern-in-a-laravel-application-13f0b46a3dce 

Previously we wrote our application logic in the controller. There’s an alternative approach to development that abstracts some calls into PHP classes called Repositories. The idea is that we can decouple models from controllers and assign readable names to complicated queries.

Step 1: create a file for app/Repositories/User/UserRepository.php.







 	
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



Note: The implements RepositoryInterface section isn’t strictly necessary but it adds an extra layer of structure to our code. An interface is a contract that defines the methods a class MUST have defined. In our case the interface looks like this

Step2: Create RepositoryInterface and define all methods (location:app/Repositories/User/RepositoryInterface.php)


	namespace App\Repositories\User;

	interface RepositoryInterface
	{
		public function sampleOne($request);
		public function sampleTwo();
	}

Step 3: Use the repository inside the controllers


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

 Note: doc is  only have some basic informations
