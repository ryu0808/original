<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animal;
use Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**public function __construct()
    {
        $this->middleware('auth');
    }
    */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $posts = Animal::all()->sortByDesc('created_at')->take(5);
        
        
        return view('home', ['posts' => $posts]);
    }
}
