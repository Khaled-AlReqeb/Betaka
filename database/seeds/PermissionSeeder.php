<?php

use Illuminate\Database\Seeder;
use \Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name'=>'Show All Admins',
            'name_ar'=>'عرض المشرفين',
            'category'=>'admins',
            'guard_name'=>'admin'
        ]);
        Permission::create([
            'name'=>'Add admins',
            'name_ar'=>'إضافة مشرفين',
            'category'=>'admins',
            'guard_name'=>'admin'
        ]);
        Permission::create([
            'name'=>'Edit admins',
            'name_ar'=>'تعديل مشرفين',
            'category'=>'admins',
            'guard_name'=>'admin'
        ]);
        Permission::create([
            'name'=>'Delete admins',
            'name_ar'=>'حذف مشرفين',
            'category'=>'admins',
            'guard_name'=>'admin'
        ]);

        Permission::create([
            'name'=>'Show All users',
            'name_ar'=>'عرض كل المستخدمين',
            'category'=>'users',
            'guard_name'=>'admin'
        ]);
        Permission::create([
            'name'=>'View user',
            'name_ar'=>'عرض بيانات المستخدم',
            'category'=>'users',
            'guard_name'=>'admin'
        ]);


        Permission::create([
            'name'=>'Show All Roles',
            'name_ar'=>'عرض الادوار',
            'category'=>'roles',
            'guard_name'=>'admin'
        ]);
        Permission::create([
            'name'=>'Add roles',
            'name_ar'=>'إضافة أدوار',
            'category'=>'roles',
            'guard_name'=>'admin'
        ]);
        Permission::create([
            'name'=>'Edit roles',
            'name_ar'=>'تعديل الادوار',
            'category'=>'roles',
            'guard_name'=>'admin'
        ]);
        Permission::create([
            'name'=>'Delete roles',
            'name_ar'=>'حذف أدوار',
            'category'=>'roles',
            'guard_name'=>'admin'
        ]);


        Permission::create([
            'name'=>'Show All settings',
            'name_ar'=>'عرض الاعدادت',
            'category'=>'settings',
            'guard_name'=>'admin'
        ]);
        Permission::create([
            'name'=>'Add settings',
            'name_ar'=>'تعديل الاعدادت',
            'category'=>'settings',
            'guard_name'=>'admin'
        ]);




        $admin=\App\Admin::find(1);
        $role = Role::create(['id'=>1 ,'name' => 'super-admin' ,'guard_name'=>'admin']);
        $role->givePermissionTo(Permission::all());
        $admin->assignRole($role->name);
        $admin->save();
    }
}
