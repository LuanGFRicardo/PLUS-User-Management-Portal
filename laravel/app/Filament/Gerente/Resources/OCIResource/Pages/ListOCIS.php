<?php

namespace App\Filament\Gerente\Resources\OCIResource\Pages;

use App\Filament\Gerente\Resources\OCIResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOCIS extends ListRecords
{
    protected static string $resource = OCIResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
