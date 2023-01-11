<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ManagementAccess\Role;
use App\Models\ManagementAccess\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Super Admin
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permission()->sync($admin_permissions->pluck('id'));

        // Simple Permission For Admin
        $user_permissions = $admin_permissions->filter(function ($permission) {
            return substr($permission->name, 0, 5) != 'user_' && substr($permission->name, 0, 5) != 'role_' && substr($permission->name, 0, 11) != 'permission_';
        });
        Role::findOrFail(2)->permission()->sync($user_permissions);
    }
}
