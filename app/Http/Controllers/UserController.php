<?php
namespace P3\Http\Controllers;
use Illuminate\Http\Request;
use P3\Http\Requests;
class UserController extends Controller
{
	public function index() {
		return view('usergen.index');
	}
	public function generate(Request $request) {
		// Validate
		$this->validate($request, ['numUsers' => 'required|numeric|max:64',]);

		
		// Get the numer of users requested and send to createUser function
		$numUsers = $request->input('numUsers');

		$users = $this->createUsers($numUsers);
		// Redirect back to form, including the array of generated users
				return redirect("usergen")->with("users", $users);
	}
	protected function createUsers($numUsers) {
		$faker = \Faker\Factory::create();
		
		// Create the array of generated users, in the form of Name -> arrayOfOtherUserAttributes
		$generatedUsers = [];
		for ($i=0; $i < $numUsers; $i++) {
			$currentUser = $faker->name;
			$generatedUsers[$currentUser] = [];
		}

		// Populate the attributes
		foreach ($generatedUsers as $user=>$properties) {
			$generatedUsers[$user]["email"] = $faker->email;
			$generatedUsers[$user]["picture"] = "/img/testsubject0".mt_rand(0,4).".png";
			$generatedUsers[$user]["joinDate"] = $faker->date($format = 'M-d-Y', $max = 'now');
			$generatedUsers[$user]["userName"] = $faker->userName;
			$generatedUsers[$user]["bio"] = $faker->text($maxNbChars = 200) ;
		}
		return $generatedUsers;
	}
}