<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         // fetching data from the api
         $categories = Http::get('https://the-trivia-api.com/api/categories');
        //  $categories = Http::get('https://the-trivia-api.com/api/questions?categories=arts&limit=15');
        $categories = json_decode($categories, TRUE);
        return view('home',compact('categories'));
    }
}
