<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use App\Movie;
use App\Category;
use App\Http\Controllers\Controller;



class WelcomeController extends Controller
{
    public function index()
    {
        $users_count = User::whereRole('user')->count();
        $categories_count = Category::count();
        $movies_count = Movie::where('percent', 100)->count();

        return view('dashboard.welcome', compact('users_count', 'movies_count', 'categories_count'));
    }

}
