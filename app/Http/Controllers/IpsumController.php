<?php

namespace P3\Http\Controllers;

use Illuminate\Http\Request;

use P3\Http\Requests;

class IpsumController extends Controller
{

    // public function __invoke() {
    // 	return view('ipsum.index');
    // }

    

    public function index() {
    	$generatedIpsum = $this->getIpsum(5);
    	return view('ipsum.index')->with('generatedIpsum', $generatedIpsum);
    }

    public function getIpsum($numParagraphs) {
    	$lipsum = new \joshtronic\LoremIpsum();
    	return $lipsum->sentences($numParagraphs);

    }
}
