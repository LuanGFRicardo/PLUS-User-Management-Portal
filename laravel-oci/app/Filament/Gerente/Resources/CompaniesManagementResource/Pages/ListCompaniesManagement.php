<?php

namespace App\Filament\Gerente\Resources\CompaniesManagementResource\Pages;

use App\Filament\Gerente\Resources\CompaniesManagementResource;
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
