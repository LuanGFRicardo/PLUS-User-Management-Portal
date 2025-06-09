<?php

namespace App\Filament\Gerente\Resources\UserManagementResource\Pages;

use App\Filament\Gerente\Resources\UserManagementResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUserManagement extends EditRecord
{
    protected static string $resource = UserManagementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
