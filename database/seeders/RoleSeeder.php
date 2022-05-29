<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        collect([
            ['name' => 'Show User'],
            ['name' => 'Delete User'],
            ['name' => 'Update User'],
            ['name' => 'Create User'],
            ['name' => 'Show Permission'],
            ['name' => 'Delete Permission'],
            ['name' => 'Update Permission'],
            ['name' => 'Create Permission'],
            ['name' => 'Show Tag'],
            ['name' => 'Delete Tag'],
            ['name' => 'Update Tag'],
            ['name' => 'Create Tag'],
            ['name' => 'Show Give Permission'],
            ['name' => 'Delete Give Permission'],
            ['name' => 'Update Give Permission'],
            ['name' => 'Create Give Permission'],
            ['name' => 'Show User Role'],
            ['name' => 'Delete User Role'],
            ['name' => 'Update User Role'],
            ['name' => 'Create User Role'],
            ['name' => 'Show Category'],
            ['name' => 'Delete Category'],
            ['name' => 'Update Category'],
            ['name' => 'Create Category'],
            ['name' => 'Show Bobot'],
            ['name' => 'Delete Bobot'],
            ['name' => 'Update Bobot'],
            ['name' => 'Create Bobot'],
            ['name' => 'Show Kabupaten'],
            ['name' => 'Delete Kabupaten'],
            ['name' => 'Update Kabupaten'],
            ['name' => 'Create Kabupaten'],
            ['name' => 'Show Kecamatan'],
            ['name' => 'Delete Kecamatan'],
            ['name' => 'Update Kecamatan'],
            ['name' => 'Create Kecamatan'],
            ['name' => 'Show Desa'],
            ['name' => 'Delete Desa'],
            ['name' => 'Update Desa'],
            ['name' => 'Create Desa'],
            ['name' => 'Show sampah'],
            ['name' => 'Delete sampah'],
            ['name' => 'Update sampah'],
            ['name' => 'Create sampah'],
        ])->each(function ($permission) {
            Permission::create($permission);
        });

        collect([
            ['name' => 'super admin'],
            ['name' => 'admin'],
            ['name' => 'koordinator'],
            ['name' => 'user'],
        ])->each(function ($role) {
            Role::create($role);
        });

        $admin = Role::find(2);
        $admin->givePermissionTo(
            ['Show User'],
            ['Update User'],
            ['Create User'],
            ['Show Permission'],
            ['Show Tag'],
            ['Delete Tag'],
            ['Update Tag'],
            ['Create Tag'],
            ['Show Give Permission'],
            ['Show User Role'],
            ['Show Category'],
            ['Delete Category'],
            ['Update Category'],
            ['Create Category'],
            ['Show Bobot'],
            ['Delete Bobot'],
            ['Update Bobot'],
            ['Create Bobot'],
            ['name' => 'Show Kabupaten'],
            ['name' => 'Delete Kabupaten'],
            ['name' => 'Update Kabupaten'],
            ['name' => 'Create Kabupaten'],
            ['name' => 'Show Kecamatan'],
            ['name' => 'Delete Kecamatan'],
            ['name' => 'Update Kecamatan'],
            ['name' => 'Create Kecamatan'],
            ['name' => 'Show Desa'],
            ['name' => 'Delete Desa'],
            ['name' => 'Update Desa'],
            ['name' => 'Create Desa'],
            ['Show sampah'],
            ['Delete sampah'],
            ['Update sampah'],
            ['Create sampah'],
        );

        $koordinator = Role::find(3);
        $koordinator->givePermissionTo([
            ['Show User'],
            ['Show Tag'],
            ['Show User Role'],
            ['Show Category'],
            ['Show Bobot'],
            ['Show Kabupaten'],
            ['Show Kecamatan'],
            ['Show Desa'],
            ['Show sampah'],
        ]);

        $userpermision = Role::find(4);
        $userpermision->givePermissionTo([
            ['Show sampah'],
            ['Delete sampah'],
            ['Update sampah'],
            ['Create sampah'],
            ['Show Category'],
            ['Show Bobot'],
            ['Show Kabupaten'],
            ['Show Kecamatan'],
            ['Show Desa'],
        ]);
    }
}
