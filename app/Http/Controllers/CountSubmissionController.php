<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountSubmissionController extends Controller
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
     * @return response()
     */
    public function index(Request $request)
    {
        $submissions = Submission::select(DB::raw('name, count(*) as submission_count'))
                     ->groupBy('name')
                     ->get('id');
        return view('count-submissions');
        // dd($submissions);
    }
}
