<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        $permissions = [
            'role-get',
            'role-insert',
            'role-update',
            'role-delete',
            'data-siswa-get',
            'data-siswa-insert',
            'data-siswa-update',
            'data-siswa-delete',
            'data-guru-get',
            'data-guru-insert',
            'data-guru-update',
            'data-guru-delete',
            'data-applicant-get',
            'data-applicant-insert',
            'data-applicant-update',
            'data-applicant-delete',
            'data-alumni-get',
            'data-alumni-insert',
            'data-alumni-update',
            'data-alumni-delete',
            'data-pondok-get',
            'data-pondok-insert',
            'data-pondok-update',
            'data-pondok-delete',
            'data-user-get',
            'data-user-insert',
            'data-user-update',
            'data-user-delete',
            'data-administrasi-get',
            'data-administrasi-insert',
            'data-administrasi-update',
            'data-administrasi-delete',
            'data-standar-get',
            'data-standar-insert',
            'data-standar-update',
            'data-standar-delete'
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
