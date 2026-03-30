<?php

namespace App\Filament\Resources\Mmrves\Pages;

use App\Filament\Resources\Mmrves\MmrfResource;
use App\Models\Status;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Builder;

class ListMmrves extends ListRecords
{
    protected static string $resource = MmrfResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Action::make('createMmrf')
            //     ->icon(Heroicon::Plus)
            //     ->label('New Request')
            //     ->url(route('filament.mdm.pages.create-mmrf')),

            CreateAction::make()
                ->icon(Heroicon::Plus)
                ->label('New Request')
        ];
    }

    public function getTabs(): array
    {
        $tabs = [
            'all' => Tab::make('All')
                ->badge(fn() => $this->getModel()::count())
                ->badgeColor('gray')
        ];

        $statuses = Status::where('type', 'mmrf')->get();

        foreach ($statuses as $status) {
            $tabs[$status->name] = Tab::make($status->name)
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status_id', $status->id))
                ->badge(fn() => $this->getModel()::where('status_id', $status->id)->count())
                ->badgeColor('gray');
        }

        return $tabs;
    }
}
