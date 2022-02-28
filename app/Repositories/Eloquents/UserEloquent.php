<?php
/**
 * Created by PhpStorm.
 * UserRequest: mohammedsobhei
 * Date: 5/2/18
 * Time: 11:43 PM
 */

namespace App\Repositories\Eloquents;

use App\Repositories\Interfaces\Repository;
use App\Repositories\Uploader;
use App\User;
use Illuminate\Support\Facades\Config;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class UserEloquent extends Uploader implements Repository
{

    private $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    function anyData()
    {

        $data = $this->model->orderByDesc('updated_at');

        return datatables()->of($data)
            ->filter(function ($query) {

                if (request()->filled('name')) {
                    $query->where('name', 'LIKE', '%' . request()->get('name') . '%');
                }

                if (request()->filled('email')) {
                    $query->where('email', 'LIKE', '%' . request()->get('email') . '%');
                }
                if (request()->filled('is_active')) {
                    $query->where('is_active', request()->get('is_active'));
                }
            })
            ->editColumn('image', function ($item) {

                if (isset($item->image))
                    return '<img src="' . $item->image . '" width="80px" height="80px" class="img-circle">';
            })->editColumn('is_active', function ($item) {
                if ($item->is_active)
                    return '<input type="checkbox" class="make-switch is_active" data-on-text="&nbsp;ON&nbsp;" data-off-text="&nbsp;OFF&nbsp;" name="is_active" data-id="' . $item->id . '" checked  data-on-color="success" data-size="mini" data-off-color="warning">';
                return '<input type="checkbox" class="make-switch is_active" data-on-text="&nbsp;ON&nbsp;" data-off-text="&nbsp;OFF&nbsp;" name="is_active" data-id="' . $item->id . '" data-on-color="success" data-size="mini" data-off-color="warning">';
            })->addColumn('action', function ($item) {
                $admin=authAdmin();

                if($admin->can('View user'))
                return '<a href="' . url('/admin/users/' . $item->id . '/view') . '" class="btn btn-circle btn-icon-only blue">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    ';
            })->addIndexColumn()
            ->rawColumns(['is_active', 'image', 'action'])->toJson();
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
        // TODO: Implement create() method.

    }

    function update(array $attributes, $id = null)
    {
        // TODO: Implement update() method.

    }
    function userActive($id)
    {

        $user = $this->model->find($id['user_id']);

        if (isset($user)) {
            $user->is_active = !$user->is_active;
            if ($user->save())
                return response_api(true, 200);
        }
        return response_api(false, 422);

    }

    function delete($id)
    {
        // TODO: Implement delete() method.
        $model = $this->model->find($id);

        if (isset($model) && $model->delete())
            return response_api(true, 200, __('app.success'), []);
        return response_api(false, 422, __('app.error'), []);

    }

    function login(array $attributes)
    {
        if (auth()->attempt(['email' => $attributes['email'], 'password' => $attributes['password']], (isset($attributes['rememberme'])) ?: 0)) {
            $user = auth()->user();
            $user_info = User::where('id', $user->id)->first();
            return response()->json(['status' => true, 'user' => $user_info]);
        }
        return response()->json(['status' => false, 'msg' => __('auth.failed_user_pass')]);
    }

    function logout()
    {
        auth()->logout();
        return response()->json(['status' => true]);
    }

}
