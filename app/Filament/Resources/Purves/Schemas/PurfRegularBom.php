<?php

namespace App\Filament\Resources\Purves\Schemas;

use Filament\Forms\Components\ViewField;
use Filament\Schemas\Components\Section;

class PurfRegularBom
{
    public static function getSchema(): array
    {
        return [
            ViewField::make('regular_bom')
                ->view('components.repeater-table')
                ->viewData([
                    'columns' => [
                        ['key' => 'regular_bom_product_code',                       'label' => 'Product Code',                          'width' => '130px'],
                        ['key' => 'regular_bom_fixin_drink_product_size',           'label' => 'Fixin/Drink Product Size',              'width' => '150px', 'type' => 'select',   'options' => [],                                                                                                                    'placeholder' => 'Select size'],
                        ['key' => 'regular_bom_type',                               'label' => 'BOM Type',                              'width' => '130px', 'type' => 'select',   'options' => [],                                                                                                                    'placeholder' => 'Select BOM type'],

                        ['key' => 'regular_luzon_plastic_material_code',            'label' => 'Luzon Plastic - Material Code',         'width' => '160px', 'type' => 'select',   'options' => [],                                                                                                                    'placeholder' => 'Select material code'],
                        ['key' => 'regular_luzon_plastic_material_description',     'label' => 'Luzon Plastic - Material Description',  'width' => '200px', 'type' => 'readonly'],
                        ['key' => 'regular_luzon_plastic_qty',                      'label' => 'Luzon Plastic - Qty',                   'width' => '100px', 'type' => 'number'],
                        ['key' => 'regular_luzon_plastic_uom',                      'label' => 'Luzon Plastic - UOM',                   'width' => '100px'],

                        ['key' => 'regular_luzon_paper_material_code',              'label' => 'Luzon Paper - Material Code',           'width' => '160px', 'type' => 'select',   'options' => [],                                                                                                                    'placeholder' => 'Select material code'],
                        ['key' => 'regular_luzon_paper_material_description',       'label' => 'Luzon Paper - Material Description',    'width' => '200px', 'type' => 'readonly'],
                        ['key' => 'regular_luzon_paper_qty',                        'label' => 'Luzon Paper - Qty',                     'width' => '100px', 'type' => 'number'],
                        ['key' => 'regular_luzon_paper_uom',                        'label' => 'Luzon Paper - UOM',                     'width' => '100px'],

                        ['key' => 'regular_luzon_naga_material_code',               'label' => 'Luzon Plastic Naga - Material Code',    'width' => '180px', 'type' => 'select',   'options' => [],                                                                                                                    'placeholder' => 'Select material code'],
                        ['key' => 'regular_luzon_naga_material_description',        'label' => 'Luzon Plastic Naga - Material Desc',    'width' => '200px', 'type' => 'readonly'],
                        ['key' => 'regular_luzon_naga_qty',                         'label' => 'Luzon Plastic Naga - Qty',              'width' => '100px', 'type' => 'number'],
                        ['key' => 'regular_luzon_naga_uom',                         'label' => 'Luzon Plastic Naga - UOM',              'width' => '100px'],

                        ['key' => 'regular_vismin_plastic_material_code',           'label' => 'VisMin Plastic - Material Code',        'width' => '160px', 'type' => 'select',   'options' => [],                                                                                                                    'placeholder' => 'Select material code'],
                        ['key' => 'regular_vismin_plastic_material_description',    'label' => 'VisMin Plastic - Material Description', 'width' => '200px', 'type' => 'readonly'],
                        ['key' => 'regular_vismin_plastic_qty',                     'label' => 'VisMin Plastic - Qty',                  'width' => '100px', 'type' => 'number'],
                        ['key' => 'regular_vismin_plastic_uom',                     'label' => 'VisMin Plastic - UOM',                  'width' => '100px'],

                        ['key' => 'regular_vismin_paper_material_code',             'label' => 'VisMin Paper - Material Code',          'width' => '160px', 'type' => 'select',   'options' => [],                                                                                                                    'placeholder' => 'Select material code'],
                        ['key' => 'regular_vismin_paper_material_description',      'label' => 'VisMin Paper - Material Description',   'width' => '200px', 'type' => 'readonly'],
                        ['key' => 'regular_vismin_paper_qty',                       'label' => 'VisMin Paper - Qty',                    'width' => '100px', 'type' => 'number'],
                        ['key' => 'regular_vismin_paper_uom',                       'label' => 'VisMin Paper - UOM',                    'width' => '100px'],

                        ['key' => 'regular_vismin_naga_material_code',              'label' => 'VisMin Plastic Naga - Material Code',   'width' => '180px', 'type' => 'select',   'options' => [],                                                                                                                    'placeholder' => 'Select material code'],
                        ['key' => 'regular_vismin_naga_material_description',       'label' => 'VisMin Plastic Naga - Material Desc',   'width' => '200px', 'type' => 'readonly'],
                        ['key' => 'regular_vismin_naga_qty',                        'label' => 'VisMin Plastic Naga - Qty',             'width' => '100px', 'type' => 'number'],
                        ['key' => 'regular_vismin_naga_uom',                        'label' => 'VisMin Plastic Naga - UOM',             'width' => '100px'],
                    ],
                    'defaultItems' => 15,
                ])
                ->columnSpanFull()
                ->hiddenLabel(),
        ];
    }
}
