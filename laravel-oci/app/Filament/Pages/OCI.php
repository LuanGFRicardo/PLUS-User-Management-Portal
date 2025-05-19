<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class OCI extends Page
{
    protected static ?string $title = 'Requisições JSON para OCI';

    protected static ?string $navigationLabel = 'Requisições JSON para OCI';

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.oci.oci-json-generator';
}
