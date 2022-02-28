<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Links\CreateLinkRequest;
use App\Link;
use App\LinkImge;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LinkController extends Controller
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
//        $links = Link::where('user_id' , auth()->user()->id)->get();
        $links = Link::where('user_id' , auth()->user()->id)->orderBy('order','asc')->get();

//        dd($links);

        $linksView = Link::where(['user_id' =>  auth()->user()->id , 'is_active' => 1 ,]);


        $linksView = $linksView->where( DB::raw('now()'), '>=', DB::raw('startDate') )
                      ->where( DB::raw('now()'), '<=', DB::raw('finishDate') )
//            ->where(['finishDate' => ' ,'startDate'=>'' ])
            ->orderBy('order','asc')->get();
//dd($linksView);

        if (auth()->user()->is_active == 1){
            return view('website.link' ,compact('user','links' ,  'linksView'));
        } else{
            return redirect('/website');
        }

    }
    public function addLink($id)
    {
        $id = auth()->user()->id;
//        $appearance = User::where( 'id',auth()->user()-$id)->get();
        $user = User::find($id);
//        $links = Link::where('user_id' , auth()->user()->id)->get();
        $links = Link::where('user_id' , auth()->user()->id)->orderBy('id','desc')->get();

        $linksView = Link::where(['user_id' =>  auth()->user()->id , 'is_active' => 1]);
        $linksView = $linksView->where( DB::raw('now()'), '>=', DB::raw('startDate') )
            ->where( DB::raw('now()'), '<=', DB::raw('finishDate') )
//            ->orwhere(['finishDate' => Null ,'startDate'=>'' ])
            ->orderBy('id','desc')->get();

        if (auth()->user()->is_active == 1){
            return view('website.addLink' ,compact('user','links' , 'linksView'));
        } else{
            return redirect('/website');
        }

    }

    public function order(Request $request)
    {
        $links = Link::all();

        foreach ($links as $link) {
            foreach ($request->order as $order) {
                if ($order['id'] == $link->id) {
                    $link->update(['order' => $order['position']]);
                }
            }
        }

        return response('Update Successfully.', 200 , $links);
    }

    public function store(CreateLinkRequest $request)
    {
//        return 'gggggg';

//        $item = Link::find($request->linkID);
//        dd($request->linkID);

//        $fi = Carbon::createFromFormat('m/d/Y' ,$request['finishDate'])->format('Y-m-d');
//        dd($request->finishDate);


        if($file = $request->file('image') !== null){

            $file = $request->file('image');
            $name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload') , $name);

        }	else{
            $name = 'bg-10.jpg';
        }

//        dd($request->all());

        $AllLinks = $request->all();
//        dd($AllLinks);

//        foreach($AllLinks as $request)
//        {
//            $link = Link::create([
//                'image' =>$name,
//                'title' => $request->get('title'),
//                'link' =>$request->get('link'),
////            'startDate' =>'2-1-2020',
////            'startDate' => $request->get('startDate')->format('Y-m-d'),
//                'startDate' => Carbon::createFromFormat('m/d/Y', $request->get('startDate'))->format('Y-m-d'),
//                'finishDate' => Carbon::createFromFormat('m/d/Y', $request->get('finishDate'))->format('Y-m-d'),
////            'finishDate' => $request->get('finishDate')->format('Y-m-d'),
////            'finishDate' => '2-2-2020',
//
////            $data['transaction_date'] = Carbon::createFromFormat('m/d/Y', $request->transaction_date)->format('Y-m-d'),
//
//                'user_id' => auth()->user()->id,
//                'created_at' => date('Y-m-d H:i:s'),
//            ]);
//        }

//
//        $link = Link::create([
//            'image' =>$name,
//            'title' => $request->get('title'),
//            'link' =>$request->get('link'),
////            'startDate' => $request->get('startDate')->format('Y-m-d'),
//            'startDate' => Carbon::createFromFormat('m/d/Y', $request->get('startDate'))->format('Y-m-d'),
//            'finishDate' => Carbon::createFromFormat('m/d/Y', $request->get('finishDate'))->format('Y-m-d'),
////            'finishDate' => $request->get('finishDate')->format('Y-m-d'),
//
////            $data['transaction_date'] = Carbon::createFromFormat('m/d/Y', $request->transaction_date)->format('Y-m-d'),
//
//        'user_id' => auth()->user()->id,
//            'created_at' => date('Y-m-d H:i:s'),
//        ]);
//        foreach ($request['title'] as $key => $attribute){
//            $link = Link::query()->create([
//                'image' => $name,
////                'url' =>  $request['url'][$key],
//                'title' =>  $attribute,
//                'link' =>  $attribute['link'],
//                'startDate' =>  Carbon::createFromFormat('m/d/Y',$attribute['startDate'])->format('Y-m-d'),
//                'finishDate' =>   Carbon::createFromFormat('m/d/Y' ,$attribute['finishDate'])->format('Y-m-d'),
//                'user_id' =>  auth()->user()->id,
//                'created_at' =>  date('Y-m-d H:i:s'),
//
//
//            ]);
//            $link->save();
//
//            dd($link);
//        }


        $links = Link::all();
        foreach($links as $linkUpdate)
        {
//        dd($linkUpdate);
//            $linkUpdate = [];
        }
//        dd($linkUpdate);

//        $data = [];
//
//        $item = Link::find($request->linkID);
//        $tt = $linkUpdate->id;
//
//        $data['id']['LinkId'][] = [$item , $tt];
//        $data['data'] = json_encode($data);
//        dd($data['data']);
//        dd($data);

//        if ($linkUpdate->id == $request->get('linkID')){
//            dd('ID IS HERE');
//        } else {
//            dd('ID IS NOTTTTTTTtt');
//        }

        foreach($request->get('title') as $key => $title)
        {
            if( $active = $request['link'][$key] == null){
                $active = 0;
            } else{
                $active = 1;
            }
//              dd($active);
//            $item = Link::find($request['linkID'][$key]);
//            dd($item);

            $data = [];

            $item = Link::find($request->linkID);
            $tt = $linkUpdate->id;

            $data['id']['LinkId'][] = [$item , $tt];
            $data['data'] = json_encode($data);
//            dd($data['data']);
            if ($data['data']){

//                dd('HI from update');
//                $item = Link::find($request->linkID);
                $item = Link::find($request['linkID'][$key]);
                $data = [
                    'title' =>$title,
                    'image' => $name,
                    'link' =>   $request['link'][$key],
                    'is_active' =>  $active,
                    'startDate' =>  Carbon::createFromFormat('m/d/Y',$request['startDate'][$key])->format('Y-m-d'),
                    'finishDate' =>   Carbon::createFromFormat('m/d/Y' ,$request['finishDate'][$key])->format('Y-m-d'),
                    'user_id' =>  auth()->user()->id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
                $item->update($data);
            }else{
                $link = Link::create([
                    'title' =>$title,
                    'image' => $name,
                    'link' =>   $request['link'][$key],
                    'is_active' =>  $active,
                    'startDate' =>  Carbon::createFromFormat('m/d/Y',$request['startDate'][$key])->format('Y-m-d'),
                    'finishDate' =>   Carbon::createFromFormat('m/d/Y' ,$request['finishDate'][$key])->format('Y-m-d'),
                    'user_id' =>  auth()->user()->id,
                    'created_at' => date('Y-m-d H:i:s'),
                ]);
            }



        }
//        dd($link);
//        if ($link){
            alert()->success('لقد تمت العملية بنجاح','تم');
            return back()->with('success', 'success');
//        }else{
//            return back()->with('warning', 'warning');
//        }

//        dd($link);


//        if ($request->has('attributes')) {
//            $cart_item = Link::query()->create([
//                'image' => $name,
//                'title' => $request['title'],
//                'link' =>$request['link'],
//                'startDate' =>  Carbon::createFromFormat('m/d/Y',$request['startDate'])->format('Y-m-d'),
//                'finishDate' =>  Carbon::createFromFormat('m/d/Y' ,$request['finishDate'])->format('Y-m-d'),
//                'user_id' => auth()->user()->id,
//                'created_at' => date('Y-m-d H:i:s'),
//
//            ]);
////            foreach ($request['attributes'] as $attribute){
////                Link::query()->create([
////                    'image' => $name,
////                    'title' => $attribute['title'],
////                    'link' =>$attribute['link'],
////                    'startDate' =>  Carbon::createFromFormat('m/d/Y',$attribute['startDate'])->format('Y-m-d'),
////                    'finishDate' =>  Carbon::createFromFormat('m/d/Y' ,$attribute['finishDate'])->format('Y-m-d'),
////                    'user_id' => auth()->user()->id,
////                    'created_at' => date('Y-m-d H:i:s'),
////                ]);
////            }
//            $cart_item->save();
//
//            dd($cart_item);
//        }





//        return back()->with('success');


//
//        $input = $request->all();
//        dd($input);
//
//
//        foreach ($input['rows'] as $row) {
//            $items = new Link([
////                'image' =>$name,
//                'title' => $row['title'],
//                'link' => $row['link'],
//                'startDate' =>'2-1-2020',
//                'finishDate' => '2-2-2020',
////                'startDate' => Carbon::createFromFormat('m/d/Y', $request->get('startDate'))->format('Y-m-d'),
////                'finishDate' => Carbon::createFromFormat('m/d/Y', $request->get('finishDate'))->format('Y-m-d'),
//                'user_id' => auth()->user()->id,
//                'created_at' => date('Y-m-d H:i:s'),
//            ]);
//            $items->saveMany();
//        }
    }

    public function storeLink(CreateLinkRequest $request)
    {
//        $rules = [
//            'image' => 'nullable|image',
//            'order' => 'nullable|integer',
//            'views' => 'nullable|integer',
//            'is_active' => 'nullable',
//            'title' => 'nullable',
//            'link' => 'nullable',
////            'link' => 'required|unique:links',
//            'startDate' => 'nullable',
//            'finishDate' => 'nullable',
//        ];
//
//
//        $validated = Validator::make($request->all() , $rules);
//        if ($validated->failed()){
//            return  redirect()->back()->withErrors($validated);
//        }

        if($file = $request->file('image') !== null){

            $file = $request->file('image');
            $name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload') , $name);

        }	else{
            $name = 'bg-10.jpg';
        }


        foreach($request->get('title') as $key => $title)
        {

            if( $request['startDate'][$key] == null){
                $sd = date('Y-m-d H:i:s');
            } else{
                $sd = Carbon::createFromFormat('m/d/Y',$request['startDate'][$key])->format('Y-m-d');
            }
            if( $request['finishDate'][$key] == null){
                $fd = Carbon::now()->addYear(5);
//                $fd = date('Y-m-d H:i:s');

            } else{
                $fd =  Carbon::createFromFormat('m/d/Y' ,$request['finishDate'][$key])->format('Y-m-d');
            }

            if( $request['title'][$key] == null){
                $title = 'Betaka';
            } else{
                $title;
            }
            if( $request['link'][$key] == null){
                $link = 'https://www.google.com/';

            } else{
                $link =   $request['link'][$key];
            }

            $link = Link::create([
                    'title' =>$title,
                    'image' => $name,
                    'link' =>   $link,
                    'is_active' =>  1,
                    'startDate' => $sd,
                    'finishDate' =>  $fd,
                    'user_id' =>  auth()->user()->id,
                    'created_at' => date('Y-m-d H:i:s'),
                ]);

//            dd($link);
//            if($request->file('images') !== null){
//            foreach($request->file('images') as $key=>$file)
//            {
//
//                    $image_path = $file->store('images','public');
//                    $image_name = $file->getClientOriginalName();
//
//                $carImage = LinkImge::create([
//                    'image' => $image_path,
//                    'link_id' => $link->id,
//                ]);
//            }
//            }
            }

        alert()->success('لقد تمت العملية بنجاح','تم');
        return back()->with('success', 'success');


        }


//    function LinkActive($id)
//    {
//
//        $link = Link::find($id['link_id']);
//
//        if (isset($link)) {
//            $link->is_active = !$link->is_active;
//            if ($link->save())
//                return response_api(true, 200);
//        }
//        return response_api(false, 422);
//
//    }

    public function LinkActive(Request $request , $id)
    {

        $link = Link::Find($id)
            ->update([
                'is_active' => 0,
            ]);
        return response()->json(true);

//        alert()->warning('لقد تم تفعيل الرابط بنجاح' , 'تم');
//        return redirect()->back();
    }
    public function LinkInActive(Request $request , $id)
    {

        $link = Link::Find($id)
            ->update([
                'is_active' => 1,
            ]);

        return response()->json(true);
//        alert()->warning('لقد تم إيقاف الرابط بنجاح' , 'تم');
//        return redirect()->back();
    }

    public function destroy($id)
    {
//        $id = $request->activeId;
        $link = Link::Find($id)->delete();
        alert()->warning('لقد تم حذف الرابط بنجاح' , 'تم');
        return redirect()->back();
    }


    public function updateOrder(Request $request)
    {
        if ($request->has('ids')) {
            $arr = explode(',', $request->input('ids'));


//            dd($arr);


//            value="{{ $tags->implode(',') }}"

            foreach ($arr as $sortOrder => $id) {
                $menu = Link::find($id);
//                dd($menu);

                $menu->order = $sortOrder;
                $menu->save();
            }
            return ['success' => true, 'message' => 'Updated'];
        }
    }


//    public function updateOrder(Request $request)
//    {
//        $posts = Link::all();
//
//        foreach ($posts as $post) {
//            foreach ($request->order as $order) {
//                if ($order['id'] == $post->id) {
//
////                    dd([ $order , $post->id ]);
//
//                    $post->update(['order' => $order['position']]);
//                }
//            }
//        }
////
//        return response_api(true, 200, __('app.success'), $posts);
//    }



//    public function order(Request $request)
//    {
//        $links = Link::all();
//
//        foreach ($links as $link) {
//            foreach ($request->order as $order) {
//                if ($order['id'] == $link->id) {
//                    $link->update(['order' => $order['position']]);
//                }
//            }
//        }
//
//        return response('Update Successfully.', 200 , $links);
//    }



}
