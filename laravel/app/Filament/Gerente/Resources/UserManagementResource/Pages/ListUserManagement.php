<?php

namespace App\Filament\Gerente\Resources\UserManagementResource\Pages;

use App\Filament\Gerente\Resources\UserManagementResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUserManagement extends ListRecords
{
    protected static string $resource = UserManagementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
