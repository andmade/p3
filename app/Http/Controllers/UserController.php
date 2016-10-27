<?php
namespace P3\Http\Controllers;
use Illuminate\Http\Request;
use P3\Http\Requests;
use Webmozart\Json\JsonEncoder;
class UserController extends Controller
{
	
	public function index() {
		return view('usergen.index');
	}

	public function generate(Request $request) {
		
		// Validate number of users requested
		$this->validate($request, ['numUsers' => 'required|numeric|max:64',]);

		
		// Get the numer of users requested + any additional options and send to createUser function
		$numUsers = $request->input('numUsers');
		$setEmail = $request->input('email');
		$setPicture = $request->input('picture');
		$setJoinDate = $request->input('joinDate');
		$setUsername = $request->input('username');
		$setBio = $request->input('bio');

		$users = $this->createUsers($numUsers, $setEmail, $setPicture, $setJoinDate, $setUsername, $setBio);
		$json = $this->createJSON($users);
		
		// Redirect back to form, including the array of generated users and the old input
				return redirect("usergen")
						->with("users", $users)
						->with("json", $json)
						->withInput();
	}
	protected function createUsers($numUsers, $setEmail, $setPicture, $setJoinDate, $setUsername, $setBio) {
		$faker = \Faker\Factory::create();
		
		// Create the array of generated users, in the form of Name -> arrayOfOtherUserProperties
		
		$generatedUsers = [];
		for ($i=0; $i < $numUsers; $i++) {
			$currentUser = $faker->name;
			$generatedUsers[$currentUser] = [];
		}

		// Populate the chosen properties
		foreach ($generatedUsers as $user=>$properties) {
			if ($setEmail) {$generatedUsers[$user]["email"] = $faker->email;}
			if ($setPicture) {$generatedUsers[$user]["picture"] = "/img/testsubject0".mt_rand(1,4).".png";}
			if ($setJoinDate) {$generatedUsers[$user]["joinDate"] = $faker->date($format = 'M-d-Y', $max = 'now');}
			if ($setUsername) {$generatedUsers[$user]["username"] = "@".$faker->userName;}
			if ($setBio) {$generatedUsers[$user]["bio"] = $faker->text($maxNbChars = 140) ;}
		}

		//Return the users and any properties
		return $generatedUsers;
	}

	protected function createJSON ($users) {
		/*Note: 
		This would be done more robustfully IRL to accomodate several simultatenous users, but for this project, I just have the one file that gets overwritten everytime someone gets a new set of users.
		*/
		$encoder = new JsonEncoder();
		$encoder->setPrettyPrinting(true);
		$encoder->encodeFile($users,"users.json");
		$url = asset('users.json');
		return $url;
	}
}