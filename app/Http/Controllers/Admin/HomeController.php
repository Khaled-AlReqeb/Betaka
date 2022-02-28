<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Project;
use App\Repositories\Eloquents\UserEloquent;
use App\Sector;
use App\Team;
use App\User;
use App\UserSubscription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     private  $userEloquent;

    public function __construct(UserEloquent $userEloquent)
    {
        $this->middleware('auth:admin');
         $this->userEloquent=$userEloquent;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $admins = Admin::count();
        $users = User::get()->count();




        $previous_week = strtotime("-1 week +1 day");
        $start_week = strtotime("last sunday midnight",$previous_week);
        $end_week = strtotime("next saturday",$start_week);
        $start_week = date("Y-m-d",$start_week);
        $end_week = date("Y-m-d",$end_week);

        $usersChart = User::select(DB::raw("COUNT(*) as count"), DB::raw("Date(created_at) as day"),
            DB::raw("Month(created_at) as month"))
//            ->whereBetween('created_at', [$start_week, $end_week])
            ->whereMonth('created_at', '=', Carbon::now()->month)
            ->groupBy('day','month')
            ->orderBy('day')
            ->get();

//        dd($usersChart);


        $data = [];


        foreach($usersChart as $row)
        {
            ;
            $time = date_create($row->day);
            $day = date_format($time, 'm-d');


            $data['label']['data'][] = [$day , (int) $row->count];
        }

        $data['chart_data'] = json_encode($data);
//        dd(  $data['chart_data']);



        return view(admin_vw() . '.home' , compact(
            'admins',
            'users',
            'usersChart',
            'data'
        ));
    }
}
