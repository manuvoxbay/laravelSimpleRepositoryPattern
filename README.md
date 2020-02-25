
Reference : https://medium.com/employbl/use-the-repository-design-pattern-in-a-laravel-application-13f0b46a3dce 

Previously we wrote our application logic in the controller. There’s an alternative approach to development that abstracts some calls into PHP classes called Repositories. The idea is that we can decouple models from controllers and assign readable names to complicated queries.

Step 1: create a file for app/Repositories/Repository.php.



 	namespace App\Repositories;
	use App\Repositories\RepositoryInterface;
	use App\User;

	class Repository implements RepositoryInterface
	{
		public function sampleOne($request)
		{
			print_r($request);
		}
		public function sampleTwo()
		{
			return "inside The Sample Two";
		}
	}



Note: The implements RepositoryInterface section isn’t strictly necessary but it adds an extra layer of structure to our code. An interface is a contract that defines the methods a class MUST have defined. In our case the interface looks like this

Step2: Create RepositoryInterface and define all methods


	namespace App\Repositories;

	interface RepositoryInterface
	{
		public function sampleOne($request);
		public function sampleTwo();
	}

Step 3: Use the repository inside the controllers


	use Illuminate\Http\Request;
	use App\User;
	use App\Repositories\Repository;
	class TestController extends Controller
	{
		public function test()
		{   
        			$repo = new Repository();
        			$request = array();
        			$request['name'] = "manu joseph";
        			$request['age'] = "25";
        			return $repo->sampleOne($request);       
    		}
	}

My Note 

=> Actully we can use the elequent insdie the repositorieas like normal. And also it work similar to controller use. 
=>But we can do this without interface Class
