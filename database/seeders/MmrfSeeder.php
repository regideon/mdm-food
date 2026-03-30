<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MmrfSeeder extends Seeder
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
                'tracking_number' => 'TRK-2024-001',
                'code'           => 'MMRF-2024-0042',
                'material_code'  => 'MAT-JANE-001',
                'requested_at'   => Carbon::parse('2024-01-12'),
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'requested_by'   => 2,
                'status_id'      => 2,
                'tracking_number' => 'TRK-2024-002',
                'code'           => 'MMRF-2024-0041',
                'material_code'  => 'MAT-MIKE-002',
                'requested_at'   => Carbon::parse('2024-01-11'),
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'requested_by'   => 4,
                'status_id'      => 4,
                'tracking_number' => 'TRK-2024-004',
                'code'           => 'MMRF-2024-0040',
                'material_code'  => 'MAT-DAVID-004',
                'requested_at'   => Carbon::parse('2024-01-09'),
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'requested_by'   => 6,
                'status_id'      => 5,
                'tracking_number' => 'TRK-2024-006',
                'code'           => 'MMRF-2024-0039',
                'material_code'  => 'MAT-ROBERT-006',
                'requested_at'   => Carbon::parse('2024-01-07'),
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
        ];

        DB::table('mmrves')->insert($records);
    }
}
