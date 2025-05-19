<?php

namespace App\Filament\Resources\RBACResource\Pages;

use App\Filament\Resources\RBACResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRBACS extends ListRecords
{
    protected static string $resource = RBACResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
