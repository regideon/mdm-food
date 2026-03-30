<?php

namespace App\Filament\Resources\Purves\Schemas;

use Filament\Forms\Components\ViewField;

class PurfMis
{
    public static function getSchema(): array
    {
        return [
            ViewField::make('mis_items')
                ->view('components.repeater-table')
                ->viewData([
                    'columns' => [
                        ['key' => 'mis_start_date',          'label' => 'Start Date',          'width' => '120px', 'type' => 'date'],
                        ['key' => 'mis_product_code',        'label' => 'Product Code',        'width' => '130px'],
                        ['key' => 'mis_product_description', 'label' => 'Product Description', 'width' => '200px'],
                        ['key' => 'mis_product_category_1',  'label' => 'Category 1',          'width' => '110px'],
                        ['key' => 'mis_product_category_2',  'label' => 'Category 2',          'width' => '110px'],
                        ['key' => 'mis_product_category_3',  'label' => 'Category 3',          'width' => '110px'],
                        ['key' => 'mis_product_category_4',  'label' => 'Category 4',          'width' => '110px'],
                        ['key' => 'mis_product_category_5',  'label' => 'Category 5',          'width' => '110px'],
                        ['key' => 'mis_product_category_6',  'label' => 'Category 6',          'width' => '110px'],
                    ],
                    'defaultItems' => 15,
                ])
                ->columnSpanFull()
                ->hiddenLabel(),
        ];
    }
}
