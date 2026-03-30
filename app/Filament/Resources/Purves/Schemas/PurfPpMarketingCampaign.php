<?php

namespace App\Filament\Resources\Purves\Schemas;

use Filament\Forms\Components\ViewField;
use Filament\Schemas\Components\Section;

class PurfPpMarketingCampaign
{
    public static function getSchema(): array
    {
        return [
            ViewField::make('pp_marketing_campaign')
                ->view('components.repeater-table')
                ->viewData([
                    'columns' => [
                        ['key' => 'pp_product_code',      'label' => 'Product Code',         'width' => '120px'],
                        ['key' => 'campaign_name',        'label' => 'Campaign Name',        'width' => '150px'],
                        ['key' => 'campaign_description', 'label' => 'Campaign Description', 'width' => '180px', 'type' => 'textarea'],
                        ['key' => 'campaign_start_date',  'label' => 'Campaign Start Date',  'width' => '140px', 'type' => 'date'],
                        ['key' => 'campaign_end_date',    'label' => 'Campaign End Date',    'width' => '140px', 'type' => 'date'],
                        ['key' => 'forecast_sales',       'label' => 'Forecast Sales',       'width' => '110px', 'type' => 'number'],
                        ['key' => 'forecast_quantity',    'label' => 'Forecast Quantity',    'width' => '120px', 'type' => 'number'],
                        ['key' => 'pp_product_type',      'label' => 'Product Type',         'width' => '130px', 'type' => 'select', 'options' => []],
                        ['key' => 'general_category',     'label' => 'General Category',     'width' => '130px', 'type' => 'select', 'options' => []],
                        ['key' => 'bundle',               'label' => 'Bundle',               'width' => '110px', 'type' => 'select', 'options' => []],
                        ['key' => 'meat_block',           'label' => 'Meat Block',           'width' => '110px', 'type' => 'select', 'options' => []],
                        ['key' => 'day_part',             'label' => 'Day Part',             'width' => '110px', 'type' => 'select', 'options' => []],
                        ['key' => 'lto_type',             'label' => 'LTO Type',             'width' => '110px', 'type' => 'select', 'options' => []],
                        ['key' => 'pp_channel',           'label' => 'Channel',              'width' => '110px', 'type' => 'select', 'options' => []],
                    ],
                    'defaultItems' => 15,
                ])
                ->columnSpanFull()
                ->hiddenLabel(),
        ];
    }
}
