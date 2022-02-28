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
use App\Story;
use App\StoryTranslation;
use App\TetsMh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Spatie\Permission\Models\Role;

class TestEloquent extends Uploader implements Repository
{

    private $model, $translation;

    public function __construct(TetsMh $model)
    {
        $this->model = $model;
    }
    function anyData()
    {

        $data = $this->model->orderByDesc('updated_at');
        return datatables()->of($data)
            ->addColumn('action', function ($item) {
                $admin=authAdmin();

                $edit="";
//                if($admin->can('Edit roles')) {
                    $edit = '   <a href="' . url(admin_test_url() . '/test-edit/' . $item->id) . '" class="btn btn-circle btn-icon-only purple edit-test-mdl">
                                        <i class="fa fa-edit"></i>
                                    </a>';
//                }
//
                $delete="";
//                if($admin->can('Delete roles'))
                    $delete = '  <a href="' . url(admin_test_url() . '/' . $item->id) . '" class="btn btn-circle btn-icon-only red delete">
                                        <i class="fa fa-trash"></i>
                                    </a>';
//

//                if(!isset($edit)&& !isset($delete) )
//                    return "";
//
                return $edit .  $delete ;

            })->addIndexColumn()
            ->rawColumns([ 'action'])->toJson();
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
//        $model = Admin::create($attributes);

        $test = new TetsMh();
        $test->title = $attributes['title'];
        $test->image = $this->upload($attributes, 'image');


        if ($test->save()) {


            $test = $this->model->find($test->id);

            $test->save();
            return response_api(true, 200, trans('app.created'), $test);

        }
        return response_api(false, 422, __('app.error'));


    }

    function update(array $attributes, $id = null)
    {
        // TODO: Implement update() method.
        $test = $this->model->find($id);

        if (isset($attributes['title']))
            $test->title = $attributes['title'];

        if (isset($attributes['image'])) {
            $test->image = $this->upload($attributes, 'image');
            $test->save();
        }

        if ($test->save()) {
            $test->save();

            return response_api(true, 200, trans('app.updated'), $test);

        }
        return response_api(false, 422, trans('app.not_updated'));
    }

    function delete($id)
    {
        // TODO: Implement delete() method.
        $model = $this->model->find($id);

        if (isset($model) && $model->delete())
            return response_api(true, 200, __('app.success'), []);
        return response_api(false, 422, __('app.error'), []);

    }


}
