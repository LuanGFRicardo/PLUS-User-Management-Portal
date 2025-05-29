<?php

namespace App\Filament\Resources\LogManagementResource\Pages;

use App\Filament\Resources\LogManagementResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLogManagement extends ListRecords
{
    protected static string $resource = LogManagementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
