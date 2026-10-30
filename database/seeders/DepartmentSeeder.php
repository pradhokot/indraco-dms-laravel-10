<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            [
                'code' => 'FAT',
                'name' => 'Finance, Accounting, and Tax',
                'description' => 'Departemen Keuangan, Akuntansi, dan Perpajakan',
                'is_active' => true,
            ],
            [
                'code' => 'HCS',
                'name' => 'Human Capital Services',
                'description' => 'Departemen Sumber Daya Manusia dan Personalia',
                'is_active' => true,
            ],
            [
                'code' => 'GA',
                'name' => 'General Affair',
                'description' => 'Departemen Umum dan Fasilitas Operasional',
                'is_active' => true,
            ],
            [
                'code' => 'LOG',
                'name' => 'Logistik',
                'description' => 'Departemen Logistik dan Distribusi',
                'is_active' => true,
            ],
            [
                'code' => 'MKT',
                'name' => 'Marketing',
                'description' => 'Departemen Pemasaran dan Penjualan',
                'is_active' => true,
            ],
            [
                'code' => 'PUR',
                'name' => 'Purchasing',
                'description' => 'Departemen Pengadaan Barang dan Jasa',
                'is_active' => true,
            ],
        ];

        foreach ($departments as $dept) {
            Department::updateOrCreate(['code' => $dept['code']], $dept);
        }
    }
}
