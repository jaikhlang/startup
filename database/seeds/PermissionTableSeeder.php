<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createPermission = new Permission();
        $createPermission->name = 'access-backend';
        $createPermission->save();

        $createPermission = new Permission();
        $createPermission->name = 'access-profile';
        $createPermission->save();

        $createPermission = new Permission();
        $createPermission->name = 'manage-users';
        $createPermission->save();

        $createPermission = new Permission();
        $createPermission->name = 'manage-settings';
        $createPermission->save();

        $createPermission = new Permission();
        $createPermission->name = 'manage-roles';
        $createPermission->save();

        $createPermission = new Permission();
        $createPermission->name = 'manage-permissions';
        $createPermission->save();

        $createPermission = new Permission();
        $createPermission->name = 'manage-uploads';
        $createPermission->save();

        $createPermission = new Permission();
        $createPermission->name = 'access-messages';
        $createPermission->save();
    }
}
