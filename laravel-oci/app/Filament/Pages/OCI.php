<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class OCI extends Page
{
    protected static ?string $title = 'Requisições JSON para OCI';

    protected static ?string $navigationLabel = 'Requisições JSON para OCI';

    protected static ?string $navigationIcon = 'heroicon-o-arrow-path';

    protected static ?string $navigationGroup = 'OCI';

    protected static ?int $navigationSort = 1;

    protected static string $view = 'filament.pages.oci.oci-json-generator';

    public function canAccessPanel(?Authenticatable $user): bool
    {
        return $user?->hasRole('admin', 'gerente', 'operador');
    }
}
