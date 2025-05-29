<?php

namespace App\Filament\Resources\LogManagementResource\Pages;

use App\Filament\Resources\LogManagementResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLogManagement extends EditRecord
{
    protected static string $resource = LogManagementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
