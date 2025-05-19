<?php

namespace App\Filament\Resources\OCIResource\Pages;

use App\Filament\Resources\OCIResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOCI extends EditRecord
{
    protected static string $resource = OCIResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
