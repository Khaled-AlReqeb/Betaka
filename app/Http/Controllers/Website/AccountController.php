<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\UpdateAccountRequest;
use App\Http\Requests\Users\UpdatePasswordRequest;
use App\Repositories\Eloquents\AccountEloquent;
use App\Rules\MatchOldPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    private $account;

    public function __construct(AccountEloquent $accountEloquent)
    {
        $this->middleware(['auth']);
        $this->account = $accountEloquent;
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function edit($id)
    {
        $id = auth()->user()->id;
        $account = $this->account->getById($id);
        $data = [
            'title' => 'Users List',
            'sub_title' => 'Edit User',
//            'back_url' => url(admin_admins_url()),
            'account' => $account
        ];

//        dd($data);
        if (auth()->user()->is_active == 1){
            return view('website.account', $data);
        } else{
            return redirect('/website');
        }

    }

    // edit admin company page
    public function update(UpdateAccountRequest $request, $id)
    {

//        $request->validate([
//            'current_password' => ['required', new MatchOldPassword()],
//            'new_password' => ['required'],
//            'new_confirm_password' => ['same:new_password'],
//        ]);

        return $this->account->update($request->all(), $id);
//
//        $id = auth()->user()->id;
//        $account = User::find($id);
//
//        if (isset($attributes['name']))
//            $account->name = $attributes['name'];
//
//        if (isset($attributes['email']))
//            $account->email = $attributes['email'];
//
//        if (isset($attributes['password']))
//            $account->password = bcrypt($attributes['password']);
//
//        $account->save();
//
//        return back();
//        return response()->json(true);

    }

    public function passwordUpdate(Request $request)
    {
//        $request->validate([
//            'current_password' => ['required', new MatchOldPassword()],
//            'new_password' => ['required'],
//            'new_confirm_password' => ['same:new_password'],
//        ]);

        $this->validator($request);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        alert()->success('لقد تم تعديل كملة المرور بنجاح','تم');
        return back();

//        dd('Password change successfully.');
    }



    private function validator(Request $request)
    {
        //validation rules.

        $rules = [
            'current_password' => ['required', new MatchOldPassword()],
            'new_password' => ['required' , 'min:6'],
            'new_confirm_password' => ['same:new_password'],
        ];

        //custom validation error messages.
        $messages = [
            'current_password.required' => 'كلمة المرور الحالية مطلوبة',
            'new_password.required' => 'كلمة المرور الجديدة مطلوبة',
            'current_password.exists' => 'كلمة المرور الحالية لا تتطابق مع سجلاتُنا',
            'current_password.min' => 'كلمة المرور يجب ان تتكون من 6 أحرف أو أرقام على الاقل',
            'new_password.min' => 'كلمة المرور يجب ان تتكون من 6 أحرف أو أرقام على الاقل',
            'new_confirm_password.same' => 'كلمة المرور الجديدة غير متطابقة مع تأكديها'
//            'is_active' => 'لقد تم تعطيل حسابك من قبل المشرف يرجى التواصل مع الدعم الفني لحل المشكلة',
        ];

        //validate the request.
        $request->validate($rules,$messages);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
