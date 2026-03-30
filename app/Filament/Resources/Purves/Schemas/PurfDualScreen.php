<?php

namespace App\Filament\Resources\Purves\Schemas;

use Filament\Forms\Components\ViewField;

class PurfDualScreen
{
    public static function getSchema(): array
    {
        return [
            ViewField::make('dual_screens')
                ->view('components.repeater-table')
                ->viewData([
                    'columns' => [
                        ['key' => 'ds_project_name', 'label' => 'Project Name', 'width' => '160px'],
                        ['key' => 'ds_campaign',     'label' => 'Campaign',     'width' => '150px'],
                        ['key' => 'ds_image_link',   'label' => 'Image Link',   'width' => '220px'],
                        ['key' => 'ds_store_type',   'label' => 'Store Type',   'width' => '140px', 'type' => 'select', 'options' => [], 'placeholder' => 'Select store type'],
                    ],
                    'defaultItems' => 15,
                ])
                ->columnSpanFull()
                ->hiddenLabel(),
        ];
    }
}
