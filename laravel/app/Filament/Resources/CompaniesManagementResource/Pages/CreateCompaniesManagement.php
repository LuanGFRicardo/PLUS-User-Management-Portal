<?php

namespace App\Filament\Resources\CompaniesManagementResource\Pages;

use App\Filament\Resources\CompaniesManagementResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCompaniesManagement extends CreateRecord
{
    protected static string $resource = CompaniesManagementResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl();
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction(),
            $this->getCancelFormAction(),
        ];
    }
}
