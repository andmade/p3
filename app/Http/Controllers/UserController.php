<?php
namespace P3\Http\Controllers;
use Illuminate\Http\Request;
use P3\Http\Requests;
class UserController extends Controller
{
	public function index() {
			$faker = \Faker\Factory::create();
			
		return view('usergen.index')->with("randomNames");
	}
	public function generate(Request $request) {
		$numNames = $request->input('numNames');
		$faker = \Faker\Factory::create();
		$randomNames = [];
		for ($i=0; $i < $numNames; $i++) {
			$randomNames[] = $faker->name;
		}
			
		// return view('usergen.index')->with("randomNames", $randomNames);
		return redirect("usergen")->with("randomNames", $randomNames);
		
	}
}