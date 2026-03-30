<?php

namespace App\Filament\Resources\Purves\Schemas;

use Filament\Forms\Components\ViewField;

class PurfPilot
{
    public static function getSchema(): array
    {
        return [
            ViewField::make('pilot_stores')
                ->view('components.repeater-table')
                ->viewData([
                    'columns' => [
                        ['key' => 'store_name',        'label' => 'Store Name',        'width' => '180px', 'type' => 'select',   'options' => [], 'placeholder' => 'Select store'],
                        ['key' => 'store_code',        'label' => 'Store Code',        'width' => '130px', 'type' => 'readonly'],
                        ['key' => 'store_description', 'label' => 'Store Description', 'width' => '200px', 'type' => 'readonly'],
                        ['key' => 'company_code',      'label' => 'Company Code',      'width' => '130px', 'type' => 'readonly'],
                        ['key' => 'company_name',      'label' => 'Company Name',      'width' => '180px', 'type' => 'readonly'],
                    ],
                    'defaultItems' => 15,
                ])
                ->columnSpanFull()
                ->hiddenLabel(),
        ];
    }
}
