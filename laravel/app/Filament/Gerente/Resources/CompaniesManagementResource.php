<?php

namespace App\Filament\Gerente\Resources;

use App\Filament\Gerente\Resources\CompaniesManagementResource\Pages;
use App\Filament\Gerente\Resources\CompaniesManagementResource\RelationManagers;
use App\Models\CompaniesManagement;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompaniesManagementResource extends Resource
{
    protected static ?string $model = CompaniesManagement::class;
    protected static ?string $title = 'Gestão de Empresas';

    protected static ?string $navigationLabel = 'Gestão de Empresas';

    protected static ?string $navigationIcon = 'heroicon-o-building-office';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCompaniesManagement::route('/'),
            'create' => Pages\CreateCompaniesManagement::route('/create'),
            'edit' => Pages\EditCompaniesManagement::route('/{record}/edit'),
        ];
    }
}
