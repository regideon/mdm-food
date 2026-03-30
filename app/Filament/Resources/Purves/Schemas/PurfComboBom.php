<?php

namespace App\Filament\Resources\Purves\Schemas;

use Filament\Forms\Components\ViewField;
use Filament\Schemas\Components\Section;

class PurfComboBom
{
    public static function getSchema(): array
    {
        return [
            ViewField::make('combo_bom_items')
                ->view('components.repeater-table')
                ->viewData([
                    'columns' => [
                        ['key' => 'combo_bom_product_code',           'label' => 'Product Code',         'width' => '130px'],
                        ['key' => 'combo_bom_fixin_drink_product_size', 'label' => 'Fixin/Drink Size',     'width' => '130px', 'type' => 'select', 'options' => [],                                                                          'placeholder' => 'Select size'],
                        ['key' => 'combo_bom_region',                 'label' => 'Region',               'width' => '120px', 'type' => 'select', 'options' => [['value' => 'luzon',   'label' => 'Luzon'],   ['value' => 'vismin', 'label' => 'VisMin']], 'placeholder' => 'Select region'],
                        ['key' => 'combo_bom_type',                   'label' => 'BOM Type',             'width' => '130px', 'type' => 'select', 'options' => [['value' => 'plastic',  'label' => 'Plastic'], ['value' => 'paper',  'label' => 'Paper'],  ['value' => 'naga', 'label' => 'Plastic Naga']], 'placeholder' => 'Select BOM type'],
                        ['key' => 'combo_material_code',              'label' => 'Material Code',        'width' => '130px', 'type' => 'select', 'options' => [],                                                                          'placeholder' => 'Select material code'],
                        ['key' => 'combo_material_description',       'label' => 'Material Description', 'width' => '180px', 'type' => 'readonly'],
                        ['key' => 'combo_qty',                        'label' => 'Qty',                  'width' => '80px',  'type' => 'number'],
                        ['key' => 'combo_uom',                        'label' => 'UOM',                  'width' => '90px'],
                    ],
                    'defaultItems' => 15,
                ])
                ->columnSpanFull()
                ->hiddenLabel(),
        ];
    }
}
