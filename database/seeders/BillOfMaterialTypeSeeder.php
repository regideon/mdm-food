<?php

namespace Database\Seeders;

use App\Models\BillOfMaterialType;
use Illuminate\Database\Seeder;

class BillOfMaterialTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            'REGULAR',
            'COMBO',
            'UPFIXIN',
            'UPDRINK - MEDUIM',
            'UPFIXIN & DRINK - MEDUIM',
            'UPDRINK - LARGE',
            'UPFIXIN & DRINK - LARGE',
            'UPDRINK - FLOAT',
            'UPFIXIN & DRINK - FLOAT',
        ];

        foreach ($types as $type) {
            BillOfMaterialType::firstOrCreate(['name' => $type]);
        }
    }
}
