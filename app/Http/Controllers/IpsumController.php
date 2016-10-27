<?php

namespace P3\Http\Controllers;

use Illuminate\Http\Request;

use P3\Http\Requests;

class IpsumController extends Controller
{

    public function index() {
    	return view('ipsum.index');
    }

    public function generate(Request $request) {
        
        // Validate number of paragraphs requested
        $this->validate($request, ['numParagraphs' => 'required|numeric|max:10',]);

        
        // Get the numer of paragraphs requested
        $numParagraphs = $request->input('numParagraphs');

        $generatedIpsum = $this->createIpsum($numParagraphs);
        
        // Redirect back to form, including the array of generated users and the old input
                return redirect("gladosipsum")
                        ->with("generatedIpsum", $generatedIpsum)
                        ->withInput();
    }

    public function createIpsum($numParagraphs) {
    	$lipsum = new \P3\Classes\GladosIpsum();
    	return $lipsum->sentences($numParagraphs, 'p');
    }
}
