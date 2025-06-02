<?php

namespace App\Filament\Resources\OCIResource\Pages;

use App\Filament\Resources\OCIResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOCI extends CreateRecord
{
    protected static string $resource = OCIResource::class;

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
