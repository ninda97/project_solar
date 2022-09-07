<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions_admin = [
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'ticket-list',
            'ticket-show',
            'ticket-update'
        ];

        $permissions_user = [
            'ticket-list',
            'ticket-show'
        ];

        foreach ($permissions_admin as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }

        // All Permissions
        $permission_saved = Permission::pluck('id')->toArray();

        // Give Role Admin All Access
        $role = Role::whereId(1)->first();
        $role->syncPermissions($permission_saved);

        // Admin Role Sync Permission
        $user = User::where('role_id', 1)->first();
        $user->assignRole($role->id);

        //Give Role Staff Permission
        $staff_role = Role::whereId(2)->first();
        $staff_role->givePermissionTo('ticket-list');
        $staff_role->givePermissionTo('ticket-show');

        //Give Permission to staff role
        $staff_permission = User::where('role_id', 2)->first();
        $staff_permission->assignRole($staff_role->id);
    }
}
