<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Support\Facades\DB;

class SubmissionChartController extends Controller
 {
//    public function index()
//    {

//         $submissions = ['Monday' =>, 'Tuesday'=>25, 'Wednesday'=>10, 'Thursday'=>15, 'Friday'=>40];
//         return view('sample-chart', compact('submissions'));
//    }
// }

    //     /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $submissions = Submission::select(DB::raw("COUNT(*) as count"),
            DB::raw("DAYNAME(created_at) as 'day_name'"))
                    ->whereYear('created_at', date('Y-m-d'))
                    ->groupBy(DB::raw("day_name"))
                    ->pluck('count','day_name');
        $labels = $submissions->keys();
        $data = $submissions->values();

        return view('sample-chart', compact('data', 'labels'));
    }
}
