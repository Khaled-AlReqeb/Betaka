<?php

namespace App\Http\Controllers;


use App\Link;
use App\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth' ,);
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $settings = Setting::all();


//        $projects = Project::with('Category')->all();
        return view('website.home' , compact(
            'settings',
        ));
    }

    public function successVerification(){
        return view('website.success');
    }

    public function betaka($name){
        $user = User::select('*')->where('name', $name)->first();
        $links = Link::with('User')->get();

        $links = DB::table('links')
            ->join('users', 'users.id', '=', 'links.user_id')
            ->where( 'links.is_active', 1)
            ->where( 'links.deleted_at', Null)
            ->where( DB::raw('now()'), '>=', DB::raw('startDate') )
            ->where( DB::raw('now()'), '<=', DB::raw('finishDate') )
            ->where( 'users.name', $name)
            ->orderBy('links.order','asc')
            ->select('links.*')
            ->paginate( 30 );

//        $linksViews = DB::table('links')
//            ->join('users', 'users.id', '=', 'links.user_id')
//            ->where( 'links.is_active', 1)
//            ->where( 'links.deleted_at', Null)
//            ->where( DB::raw('now()'), '>=', DB::raw('startDate') )
//            ->where( DB::raw('now()'), '<=', DB::raw('finishDate') )
//            ->where( 'users.name', $name)
//            ->orderBy('links.id','desc')
//            ->select('links.*')
//            ->get();

//        dd($links);

//        foreach ($links as $link){
//            if ($link->User->name == $request->get('userName')){
//                dd($link);
//            }else{
//                dd($request->all());
//            }
//        }


        if ($user->is_active == 1){
            return view('website.betaka' , compact('user','links'));
        } else {
            return redirect('/website');
        }
//        dd($user);
    }

    public function click($name)
    {
        $click = Link::find($name);
        $click->increment('views');

        dd($click);

//        $this->views = $this->clicks + 1;
//        $this->save();
    }


    public function search()
    {
        $users = User::orderBy('id' , 'desc');
//        $car = Vehicle::orderBy('id' , 'desc');
        if (request()->has('search') && request()->get('search') != ''){
//            $cars = $car->where('name' , 'like' , "%".request()->get('search')."%");
            $users = $users->where('name' , 'like' , "%".request()->get('search')."%");
        }
        // $cars = $cars->get();
        $users = $users->paginate(20);
         if (count($users) == 0){
             return view('website.noResult');
         }


        return view('website.search', compact(
            'users'
        ));
    }

    public function addBetaka(Request $request)
    {

        $validator = \Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:30','unique:users', 'alpha_dash'],
        ]);
//        dd($validator);

        if ($validator->fails()) {
         return redirect()->back()->with('warning', 'الاسم موجود مسبقاَ ، يرجى المحاولة مرة اخرى');
         }
        else{

            $betakaName = session()->get('name');

            if(!$betakaName) {

                $betakaName = [
                    "BetakaName" => $request->get('name'),
                ];

//            session()->put('cart', $cart);
//
//            return redirect()->back()->with('success', 'Product added to cart successfully!');
            }
            session()->put('betakaName', $betakaName);

            return redirect('/register')->with('success', 'Your betaka name is unique!');
        }
//        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
}
