<?php

namespace App\Http\Controllers;
use App\Programma;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programmas = Programma::all();

        if (auth()->user() != null) {
            $user_id = auth()->user()->id;
        } else {
            $user_id = '';
        }


        return view('welcome', compact('programmas', 'user_id'));
    }
}
