<?php

namespace Database\Seeders;

use App\Models\PointOfSaleGrouping;
use Illuminate\Database\Seeder;

class PointOfSaleGroupingSeeder extends Seeder
{
    public function run(): void
    {
        $salesCategories = [
            'ADD-ON',
            'ALA CARTE',
            'BEVERAGES',
            'LDRINK',
            'LDRINK-UPFIX',
            'MDRINK',
            'MDRINK-UPFIX',
            'OTHERS',
            'REGULAR MEAL',
            'UPFIX',
            'UPKRUSH',
            'UPKRUSH-UPFIX',
        ];

        $posGroupings = [
            'CHICKEN',
            'CHICKEN ALA CARTE',
            'CHICKEN BUNDLE',
            'BOXED MEALS',
            'BURGERS',
            'BURGERS ALA CARTE',
            'SNACKS',
            'SNACKS ALA CARTE',
            'SALADS',
            'FIXINS',
            'BUCKETS',
            'DRINKS',
            'EXTRAS / UPGRADE',
            'BREAKFAST',
            'BREAKFAST ALA CARTE',
            'DONUTS',
            'DESSERT AND SPP',
            'KRUSHERS',
            'COMBO UPKRUSH',
            'COMBO UPKRUSH 2',
            'PROMO AND DISC',
            'PROMO AND DISC 2',
            'COMBO PROMO UPKRUSH',
            'PILOT',
            'PILOT 2',
            'COB PILOT',
            'BURGERS PILOT',
            'FIXINS PILOT',
            'BURGERS PILOT 2',
            'LSM',
            'DRINKS PILOT',
            'BOXED MEALS PILOT',
            'BREAKFAST PILOT',
            'BOWLS PILOT',
            'NON-SALES',
            'SNACK PILOT',
            'BUCKETS PILOTS',
            'B CODES',
            'CHICKEN AGG',
            'CHICKEN ALA CARTE AGG',
            'BOXED MEALS AGG',
            'BURGERS AGG',
            'BURGERS ALA CARTE AGG',
            'SNACKS AGG',
            'SNACKS ALA CARTE AGG',
            'FIXINS AGG',
            'BUCKETS AGG',
            'EXTRAS / UPGRADE AGG',
            'DRINKS AGG',
            'DEL',
            'DEL AGG',
            'CHICKEN BUNDLE AGG',
            'PILOT AGG',
            'DESSERT AND SPP AGG',
            'BREAKFAST AGG',
            'BREAKFAST ALA CARTE AGG',
            'FLE PARTY AGG',
            'CHICKEN ONLY',
            'SNACKS AND BURGERS',
            'SIDE ORDER',
            'SOFT DRINKS',
            'MEALS',
            'WESITE SIMPLIFY',
            'PILOT-CHICKEN',
            'PILOT-DRINKS',
            'PILOT-BUCKETS',
            'PILOT-BURGERS',
            'PILOT-SNACKS',
            'PILOT-BOXED MEALS',
            'CHAMPS ALA CARTE',
            'CHAMPS COMBO',
        ];

        foreach ($salesCategories as $name) {
            PointOfSaleGrouping::firstOrCreate(
                ['name' => $name, 'type' => 'sales_category']
            );
        }

        foreach ($posGroupings as $name) {
            PointOfSaleGrouping::firstOrCreate(
                ['name' => $name, 'type' => 'pos_grouping']
            );
        }
    }
}
