<?php

namespace App\Filament\Resources\CompaniesManagementResource\Pages;

use App\Filament\Resources\CompaniesManagementResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCompaniesManagement extends ListRecords
{
    protected static string $resource = CompaniesManagementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
