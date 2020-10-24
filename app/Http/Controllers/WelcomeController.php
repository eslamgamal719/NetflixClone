<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{

    public function index() {

        $categories = Category::with('movies')->get();
        $latest_movies = Movie::latest()->limit(2)->get();

        return view('welcome', compact('latest_movies', 'categories'));

    }

} //end of controller
