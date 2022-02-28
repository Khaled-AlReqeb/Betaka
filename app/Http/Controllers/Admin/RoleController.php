<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Roles\CreateRoleRequest;
use App\Repositories\Eloquents\RoleEloquent;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    private $role;

    public function __construct(RoleEloquent $role)
    {
        $this->role = $role;
    }

    public function index()
    {
        return view(admin_roles_vw() . '.index');
    }


//    public function create()
//    {
//        return $this->role->modal_create();
//    }
//
//    public function edit($id)
//    {
//        return $this->role->modal_update($id);
//
//    }


    public function create()
    {
        $permissions=Permission::get();

//        'permissions'=>$permissions ,
        return view(admin_roles_vw() . '.create' , compact('permissions'));
    }
    public function edit($id)
    {
        $role = $this->role->getById($id);
        $permissions=Permission::get();
        $data = [
            'role' => $role,
            'permissions'=>$permissions ,
        ];
        return view(admin_roles_vw() . '.edit', $data);
    }


    public function anyData()
    {
        return $this->role->anyData();
    }



    public function store(CreateRoleRequest $request)
    {
        return $this->role->create($request->all());
    }

    public function update(CreateRoleRequest $request, $id)
    {
        return $this->role->update($request->all(), $id);
    }

    public function delete($id)
    {
        return $this->role->delete($id);
    }



}
