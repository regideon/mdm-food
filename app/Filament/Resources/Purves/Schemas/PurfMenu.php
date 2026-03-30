<?php

namespace App\Filament\Resources\Purves\Schemas;

use Filament\Forms\Components\ViewField;
use Filament\Schemas\Components\Section;

class PurfMenu
{
    public static function getSchema(): array
    {
        return [
            ViewField::make('menu_details')
                ->view('components.repeater-table')
                ->viewData([
                    'columns' => [
                        ['key' => 'serving_size',           'label' => 'Serving Size',                              'width' => '90px'],
                        ['key' => 'product_code',           'label' => 'Product Code',                              'width' => '110px'],
                        ['key' => 'product_name',           'label' => 'Product Name',                              'width' => '150px'],
                        ['key' => 'product_write_up',       'label' => 'Product Write-Up (Online & SOK/Robot Kiosk)', 'width' => '200px', 'type' => 'textarea'],
                        ['key' => 'fixin_drink_product_size', 'label' => 'Fixin/Drink Product Size',                  'width' => '120px', 'type' => 'select', 'options' => [], 'placeholder' => 'Select size'],
                        ['key' => 'product_type',           'label' => 'Product Type',                              'width' => '110px', 'type' => 'select', 'options' => [], 'placeholder' => 'Select type'],
                        ['key' => 'pos_grouping',           'label' => 'POS Grouping',                              'width' => '110px', 'type' => 'select', 'options' => [], 'placeholder' => 'Select grouping'],
                        ['key' => 'food_type',              'label' => 'Food Type',                                 'width' => '100px', 'type' => 'select', 'options' => [], 'placeholder' => 'Select food type'],
                        ['key' => 'menu_item_category',     'label' => 'Menu Item Category',                        'width' => '130px', 'type' => 'select', 'options' => [], 'placeholder' => 'Select category'],
                        ['key' => 'daypart',                'label' => 'Daypart',                                   'width' => '100px', 'type' => 'select', 'options' => [], 'placeholder' => 'Select daypart'],
                        ['key' => 'sok_robot_category_name', 'label' => 'SOK/Robot Category Name',                   'width' => '140px', 'type' => 'select', 'options' => [], 'placeholder' => 'Select category'],
                        ['key' => 'category_name',          'label' => 'Category Name',                             'width' => '120px', 'type' => 'select', 'options' => [], 'placeholder' => 'Select category'],
                        ['key' => 'product_keywords',       'label' => 'Product Keywords',                          'width' => '140px'],
                        ['key' => 'price_low',              'label' => 'LOW',                                       'width' => '70px',  'type' => 'number'],
                        ['key' => 'price_mid',              'label' => 'MID',                                       'width' => '70px',  'type' => 'number'],
                        ['key' => 'price_high',             'label' => 'HIGH',                                      'width' => '70px',  'type' => 'number'],
                        ['key' => 'price_agg',              'label' => 'AGG',                                       'width' => '70px',  'type' => 'number'],
                        ['key' => 'price_fort',             'label' => 'FORT',                                      'width' => '70px',  'type' => 'number'],
                        ['key' => 'price_naia3',            'label' => 'NAIA3',                                     'width' => '70px',  'type' => 'number'],
                        ['key' => 'price_bora',             'label' => 'BORA',                                      'width' => '70px',  'type' => 'number'],
                        ['key' => 'price_del_mid',          'label' => 'DEL MID',                                   'width' => '80px',  'type' => 'number'],
                        ['key' => 'price_del_high',         'label' => 'DEL HIGH',                                  'width' => '80px',  'type' => 'number'],
                        ['key' => 'price_agg_mid',          'label' => 'AGG MID',                                   'width' => '80px',  'type' => 'number'],
                        ['key' => 'price_agg_high',         'label' => 'AGG HIGH',                                  'width' => '80px',  'type' => 'number'],
                        ['key' => 'price_luzon',            'label' => 'LUZON',                                     'width' => '75px',  'type' => 'number'],
                        ['key' => 'price_luzon_naga',       'label' => 'LUZON NAGA',                                'width' => '90px',  'type' => 'number'],
                        ['key' => 'price_vismin',           'label' => 'VISMIN',                                    'width' => '75px',  'type' => 'number'],
                        ['key' => 'component_upgrade_size', 'label' => 'Component Upgrade Size',                    'width' => '130px'],
                        ['key' => 'qty',                    'label' => 'Qty',                                       'width' => '60px',  'type' => 'number'],
                        ['key' => 'components',             'label' => 'Components',                                'width' => '120px'],
                        ['key' => 'default_component',      'label' => 'Default Component?',                        'width' => '110px', 'type' => 'checkbox'],
                        ['key' => 'component_add_on_price', 'label' => 'Component Add-On Price',                    'width' => '130px', 'type' => 'number'],
                        ['key' => 'testing_checker',        'label' => 'Testing Checker',                           'width' => '100px', 'type' => 'checkbox'],
                    ],
                    'defaultItems' => 15,
                ])
                ->columnSpanFull()
                ->hiddenLabel(),
        ];
    }
}
