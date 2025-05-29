<?php

namespace App\Filament\Operador\Resources\OCIResource\Pages;

use App\Filament\Operador\Resources\OCIResource;
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
