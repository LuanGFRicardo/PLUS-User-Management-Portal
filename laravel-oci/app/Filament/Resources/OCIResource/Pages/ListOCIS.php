<?php

namespace App\Filament\Resources\OCIResource\Pages;

use App\Filament\Resources\OCIResource;
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
