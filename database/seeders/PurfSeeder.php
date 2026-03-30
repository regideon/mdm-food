<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PurfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $records = [
            [
                'requested_by'   => 1,
                'status_id'      => 1,
                'id_generator' => 'PURF-' . Carbon::now()->format('mdYHis'),
                'tracking_number' => 'TRK-2024-001',
                'code' => 'CODE-001',
                // 'material_code'  => 'MAT-JANE-001', --- IGNORE ---
                'requested_at'   => Carbon::parse('2024-01-02'),
                'launch_date'   => Carbon::parse('2024-01-12'),
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'requested_by'   => 2,
                'status_id'      => 2,
                'id_generator' => 'PURF-' . Carbon::now()->subDays(13)->format('mdYHis'),
                'tracking_number' => 'TRK-2024-002',
                'code' => 'CODE-002',
                // 'material_code'  => 'MAT-MIKE-002', --- IGNORE ---
                'requested_at'   => Carbon::parse('2024-01-01'),
                'launch_date'   => Carbon::parse('2024-01-11'),
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'requested_by'   => 4,
                'status_id'      => 4,
                'id_generator' => 'PURF-' . Carbon::now()->subDays(3)->format('mdYHis'),
                'tracking_number' => 'TRK-2024-004',
                'code' => 'CODE-004',
                // 'material_code'  => 'MAT-DAVID-004', --- IGNORE ---
                'requested_at'   => Carbon::now()->subDays(13),
                'launch_date'    => Carbon::now()->addDays(3),
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'requested_by'   => 6,
                'status_id'      => 5,
                'tracking_number' => 'TRK-2024-006',
                'id_generator' => 'PURF-' . Carbon::now()->subDays(12)->format('mdYHis'),
                'code' => 'CODE-006',
                // 'material_code'  => 'MAT-ROBERT-006', --- IGNORE ---
                'requested_at'   => Carbon::parse('2024-01-07'),
                'launch_date'    => Carbon::parse('2024-01-30'),
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
        ];

        DB::table('purves')->insert($records);
    }
}
