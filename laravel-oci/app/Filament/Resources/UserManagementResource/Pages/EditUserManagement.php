<?php

namespace App\Filament\Resources\UserManagementResource\Pages;

use App\Filament\Resources\UserManagementResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUserManagement extends EditRecord
{
    protected static string $resource = UserManagementResource::class;

    protected function handleRecordUpdate(\Illuminate\Database\Eloquent\Model $record, array $data): \Illuminate\Database\Eloquent\Model
    {
        $role = $data['role'];
        unset($data['role']);

        $record->update($data);

        $record->syncRoles([$role]);

        return $record;
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}
