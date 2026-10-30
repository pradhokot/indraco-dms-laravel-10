<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'code' => 'admin',
                'name' => 'Super Admin',
                'description' => 'Akses penuh seluruh modul, manajemen akun pengguna, audit trail, dan konfigurasi master sistem DMS.',
            ],
            [
                'code' => 'gudang',
                'name' => 'Admin Gudang',
                'description' => 'Akses operasional fisik gudang, alokasi rak dokumen, validasi penyimpanan, penarikan, dan denah 2D gudang.',
            ],
            [
                'code' => 'departemen',
                'name' => 'Departemen',
                'description' => 'Akses staf departemen untuk pengajuan simpan, tarik, perpanjangan, pemusnahan, dan inventaris dokumen departemen terkait.',
            ],
        ];

        foreach ($roles as $role) {
            Role::updateOrCreate(['code' => $role['code']], $role);
        }
    }
}
