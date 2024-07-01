<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    public function run()
    {
        $arrayOfPermissionUser=[
            'update task','delete task','change status task',
            'signUp','login',' add comment for task','add comment for project'

        ];
        $arrayOfPermissionAdmin=[
            'create project','update project','delete project','get project',
            'create task','update task','delete task','get task','send message task',
            'dertemine period task','change status task','send invention','determine administrator ',
            'signUp','login',' add comment for task','add comment for project'
        ];
        $permissions=collect($arrayOfPermissionAdmin)->map(function($permission){
                return ['name'=>$permission,'guard_name'=>'web'];
        });
        Permission::insert($permissions->toArray());
        $roleAdmin=Role::create(['name'=>'admin'])->givePermissionTo($arrayOfPermissionAdmin);


        $permissionsUser=collect($arrayOfPermissionUser)->map(function($permission){
            return ['name'=>$permission,'guard_name'=>'user'];
        });
        Permission::insert($permissionsUser->toArray());
        $roleUser=Role::create(['name'=>'member'])->givePermissionTo($arrayOfPermissionUser);

        }
}
