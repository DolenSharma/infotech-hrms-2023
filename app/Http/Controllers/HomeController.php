<?php

namespace App\Http\Controllers;

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
     * Write code on Method
     *
     * @return \Illuminate\Contracts\Support\Renderable()
     */
    public function index(){
        return view('https://www.lrainfotech.com');
    }

    

}
