<?php
/**
 * Created by PhpStorm.
 * UserRequest: mohammedsobhei
 * Date: 5/2/18
 * Time: 11:43 PM
 */

namespace App\Repositories\Eloquents;

use App\Admin;
use App\Repositories\Interfaces\Repository;
use App\Repositories\Uploader;
use App\Rules\MatchOldPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;

class AccountEloquent extends Uploader implements Repository
{

    private $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    function anyData()
    {

    }

    function getAll(array $attributes)
    {
        // TODO: Implement getAll() method.
        $data = $this->model->all();
        if (request()->segment(1) == 'api') {
            return response_api(true, 200, null, $data);
        }
        return $data;
    }

    function getById($id)
    {
        // TODO: Implement getById() method.
        return $this->model->find($id);
    }

    function create(array $attributes)
    {

    }


    function update(array $attributes, $id = null)
    {

        // TODO: Implement update() method.

        $id = auth()->user()->id;
        $account = $this->model->find($id);

        if (isset($attributes['userName']))
            $account->userName = $attributes['userName'];
//        if (isset($attributes['name']))
//            $account->name = $attributes['name'];

        if (isset($attributes['email']))
            $account->email = $attributes['email'];


        if ($account->save())
            alert()->success('لقد تم تحديث بياناتك بنجاح','تم');

            return back();
//            return response_api(true, 200, trans('app.success'), $account);
//        return response_api(false, 422, trans('app.error'));
    }

    function delete($id)
    {
        // TODO: Implement delete() method.
    }

}
