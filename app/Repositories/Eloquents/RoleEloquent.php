<?php

namespace App\Repositories\Eloquents;



use App\Repositories\Interfaces\Repository;
use Illuminate\Support\Facades\Config;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleEloquent implements Repository
{

    private $model;

    public function __construct(Role $model)
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
                if($admin->can('Edit roles')) {
                    $edit = '   <a href="' . url(admin_roles_url() . '/role-edit/' . $item->id) . '" class="btn btn-circle btn-icon-only purple edit-role-mdl">
                                        <i class="fa fa-edit"></i>
                                    </a>';
                }

                $delete="";
                if($admin->can('Delete roles'))
                    $delete = '  <a href="' . url(admin_roles_url() . '/' . $item->id) . '" class="btn btn-circle btn-icon-only red delete">
                                        <i class="fa fa-trash"></i>
                                    </a>';
//

                if(!isset($edit)&& !isset($delete) )
                    return "";

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


    public function modal_create()
    {
        $permissions=Permission::get();
        $view = view()->make(admin_vw() . '.modal_role', [
            'modal_id' => 'add-role',
            'modal_title' => 'Add role',
            'icon' => '<i class="fa fa-plus"></i>',
            'action' => '<button type="submit" class="btn green"><i class="fa fa-plus"></i> Add </button>',
            'form' => [
                'method' => 'POST',
                'url' => url(admin_roles_url() . '/role-create'),
                'form_id' => 'formAdd',
                'fields' => [
                    'name' => 'text',
                    'permissions'=>$permissions ,
                ], 'fields_name' => [
                    'name' => 'Role name',
                    'permissions' => 'Permissions',
                ],
            ]
        ]);

        $html = $view->render();

        return $html;
    }

    public function modal_update($id)
    {

        $item = $this->model->find($id);
        $permissions=Permission::get();

//        dd($item->guard_name);
        if (isset($item)) {
            $view = view()->make(admin_vw() . '.modal_role', [
                'modal_id' => 'edit-role',
                'modal_title' => 'Edit role',
                'icon' => '<i class="fa fa-edit"></i>',
                'action' => '<button type="submit" class="btn purple"><i class="fa fa-edit"></i> Edit </button>',
                'form' => [
                    'method' => 'PUT',
                    'url' => url(admin_roles_url() . '/role-edit/' . $id),
                    'form_id' => 'formEdit',
                    'fields' => [
                        'name' => 'text',
                        'permissions'=>$permissions
                    ], 'fields_name' => [
                        'name' => 'Name',
                        'permissions'=>'Permissions'
                    ], 'values' => [
                        'name' => $item->name,
                        'permissions'=>$item

                    ],
                ]
            ]);

            $html = $view->render();

            return $html;
        }
        return 'error';
    }

    function create(array $attributes)
    {
        // TODO: Implement create() method.
        $role = new Role();
        $role->name = $attributes['name'];


        foreach ($attributes['permissions'] as $permission)
        {
            $permission_item=Permission::find($permission);
//            dd($permission_item->name);

            if(isset($permission_item))
                $role->givePermissionTo($permission_item);
//            dd($role->givePermissionTo($permission_item));
//
//            $role->givePermissionTo(Permission::all());
        }

        if ($role->save()) {

            $role = $this->model->find($role->id);
            return response_api(true, 200, 'Role is created' , $role);

        }
        return response_api(false, 422, 'Role is not_created');

    }


    function update(array $attributes, $id = null)
    {
        // TODO: Implement update() method.

        $model = $this->model->find($id);

        $model->update(['name'=>$attributes['name']]);

        $permissions = $attributes['permissions'];

        $p_all = Permission::all();//Get all permissions

        foreach ($p_all as $p) {
            $model->revokePermissionTo($p); //Remove all permissions associated with role
        }

        foreach ($permissions as $permission) {
            $p = Permission::where('id', $permission)->firstOrFail(); //Get corresponding form //permission in db
            $model->givePermissionTo($p);  //Assign permission to role
        }

        if ($model->save()) {
            return response_api(true, 200, 'Role is updated', $model);
        }
        return response_api(false, 422, 'Role is not_updated');
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
