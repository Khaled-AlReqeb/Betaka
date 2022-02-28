<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Link;
use Illuminate\Http\Request;

class SortLink extends Controller
{
    public function index(Request $request)
    {
//        $data = Link::orderBy('order', 'asc')->get();
        $data = Link::where('user_id' , auth()->user()->id)->orderBy('order','asc')->get();
        return view('menu', compact('data'));
    }

    public function updateOrder(Request $request)
    {
        if ($request->has('ids')) {
            $arr = explode(',', $request->input('ids'));

            foreach ($arr as $sortOrder => $id) {
                $menu = Link::find($id);
                $menu->order = $sortOrder;
                $menu->save();
            }
            return ['success' => true, 'message' => 'Updated'];
        }
    }
}
