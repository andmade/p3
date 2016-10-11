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
    	return view('ipsum.index');
    }
}
