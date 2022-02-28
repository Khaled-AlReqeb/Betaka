<?php

namespace App\Http\Controllers\Website;

use App\Appearance;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AppearanceController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index($id)
    {
        $id = auth()->user()->id;
//        $appearance = User::where( 'id',auth()->user()-$id)->get();
        $user = User::find($id);
//        ['user_id' =>  auth()->user()->id , 'is_active' => 1]
        $links = DB::table('links')
            ->join('users', 'users.id', '=', 'links.user_id')
            ->where( 'users.name', $user->name)
            ->where( DB::raw('now()'), '>=', DB::raw('startDate') )
            ->where( DB::raw('now()'), '<=', DB::raw('finishDate') )
//            ->orWhere(['links.finishDate' => '' ,'links.startDate'=>'' ])
            ->where( 'links.is_active', 1)
            ->where( 'links.deleted_at', Null)
            ->orderBy('links.order','asc')
            ->paginate( 30 );

//        dd($links);

        if (auth()->user()->is_active == 1){
            return view('website.appearance' ,compact('user' , 'links'));

        } else{
            return redirect('/website');
        }
    }

    public function profileImage($id , Request $request)
    {
        $user = User::find($id);


        if ($request->has('userName'))
            $user->userName = $request->get('userName');
//        if (isset($attributes['image']))
//            $profile->password = bcrypt($attributes['password']);
//        if($file = $request->file('image') !== null){
//
//            $file = $request->file('image');
//            $name = time().'.'.$file->getClientOriginalExtension();
//            $file->move(public_path('upload') , $name);
//
//        }	else{
//            $name = 'bg-8.jpg';
//        }
//        if($request->hasFile('image')){
//            $file = $request->file('image');
//            $name = time().'.'.$file->getClientOriginalExtension();
//            $file->move(public_path('upload') , $name);
////            $ImagePath = $file->move(public_path('upload') , $name);
//
////            if (!File::exists($ImagePath)) {
////                File::makeDirectory($ImagePath, 0777, true);
////            }
//        }
//        elseif($file = $request->file('image') == null){
//            $name = $request->get('image');
//        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = uploadFileImage($image);
            $user->image= $name;
        }
        elseif($file = $request->file('image') == null){
            $name =  $request->get('imageName');
            $user->image= $name;
        }
//        elseif($file = $request->file('image') == null){
//            $name = null;
//            $user->image= $name;
//        }


        $user->save();

        return back();

    }

    public function uploadBackground($id , Request $request)
    {
        $user = User::find($id);

        if ($request->has('color'))
            $user->color = $request->get('color');
        if($file = $request->file('backgroundImage') !== null){

            $file = $request->file('backgroundImage');
            $name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload') , $name);

        }	else{
            $name = $request->get('backgroundImageValue');
        }

        $user->backgroundImage= $name;
        $user->save();

        return back();

    }

    public function update($id , Request $request)
    {
        $user = User::find($id);
        if ($request->has('imageUrl'))
            $user->imageUrl = $request->get('imageUrl');
        $user->save();

        return back();
    }
}
