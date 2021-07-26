<?php

namespace App\Http\Controllers;

use App\Models\admin\NewsCategory;
use Illuminate\Http\Request;

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
        $NewsCategorys = NewsCategory::all();

        return view('dashboard' , compact('NewsCategorys'));
    }
}
