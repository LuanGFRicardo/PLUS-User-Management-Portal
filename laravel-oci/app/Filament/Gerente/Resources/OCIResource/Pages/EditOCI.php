<?php

namespace App\Filament\Gerente\Resources\OCIResource\Pages;

use App\Filament\Gerente\Resources\OCIResource;
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
