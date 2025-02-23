<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'view course',
            'create course',
            'update course',
            'delete course',
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }

        $teacherRole = Role::create([
            'name' => 'teacher'
        ]);

        $teacherRole->givePermissionTo([
            'view course',
            'create course',
            'update course',
            'delete course',
        ]);

        $studentRole = Role::create([
            'name' => 'student'
        ]);

        $studentRole->givePermissionTo([
            'view course'
        ]);

        // menambahkan data user pada super admin
        $user = User::create([
            'name' => 'mustajab',
            'email' => 'mustajab@gmail.com',
            'password' => bcrypt('123456')
        ]);
        $user->assignRole($teacherRole);
    }
}
