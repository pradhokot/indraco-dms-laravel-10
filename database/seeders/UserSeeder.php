<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use App\Models\Department;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::where('code', 'admin')->first();
        $gudangRole = Role::where('code', 'gudang')->first();
        $deptRole = Role::where('code', 'departemen')->first();

        $defaultPassword = Hash::make('password'); // Password default: password

        $users = [
            // 1. Akun Super Admin
            [
                'name' => 'Super Administrator',
                'username' => 'admin',
                'email' => 'admin@indraco.com',
                'password' => $defaultPassword,
                'role' => 'admin',
                'role_id' => $adminRole?->id,
                'department_id' => null,
                'is_active' => true,
            ],

            // 2. Akun Admin Gudang
            [
                'name' => 'Admin Gudang 01',
                'username' => 'gudang',
                'email' => 'gudang@indraco.com',
                'password' => $defaultPassword,
                'role' => 'gudang',
                'role_id' => $gudangRole?->id,
                'department_id' => null,
                'is_active' => true,
            ],

            // 3. Akun Pengguna Departemen
            [
                'name' => 'Staff FAT (Finance, Accounting, Tax)',
                'username' => 'FAT',
                'email' => 'fat@indraco.com',
                'password' => $defaultPassword,
                'role' => 'departemen',
                'role_id' => $deptRole?->id,
                'department_code' => 'FAT',
                'is_active' => true,
            ],
            [
                'name' => 'Staff HCS (Human Capital)',
                'username' => 'HCS',
                'email' => 'hcs@indraco.com',
                'password' => $defaultPassword,
                'role' => 'departemen',
                'role_id' => $deptRole?->id,
                'department_code' => 'HCS',
                'is_active' => true,
            ],
            [
                'name' => 'Staff GA (General Affair)',
                'username' => 'GA',
                'email' => 'ga@indraco.com',
                'password' => $defaultPassword,
                'role' => 'departemen',
                'role_id' => $deptRole?->id,
                'department_code' => 'GA',
                'is_active' => true,
            ],
            [
                'name' => 'Staff Logistik',
                'username' => 'logistik',
                'email' => 'logistik@indraco.com',
                'password' => $defaultPassword,
                'role' => 'departemen',
                'role_id' => $deptRole?->id,
                'department_code' => 'LOG',
                'is_active' => true,
            ],
            [
                'name' => 'Staff Marketing',
                'username' => 'marketing',
                'email' => 'marketing@indraco.com',
                'password' => $defaultPassword,
                'role' => 'departemen',
                'role_id' => $deptRole?->id,
                'department_code' => 'MKT',
                'is_active' => true,
            ],
            [
                'name' => 'Staff Purchasing',
                'username' => 'purchasing',
                'email' => 'purchasing@indraco.com',
                'password' => $defaultPassword,
                'role' => 'departemen',
                'role_id' => $deptRole?->id,
                'department_code' => 'PUR',
                'is_active' => true,
            ],
        ];

        foreach ($users as $userData) {
            $deptCode = $userData['department_code'] ?? null;
            unset($userData['department_code']);

            if ($deptCode) {
                $dept = Department::where('code', $deptCode)->first();
                $userData['department_id'] = $dept?->id;
            }

            User::updateOrCreate(
                ['username' => $userData['username']],
                $userData
            );
        }
    }
}
