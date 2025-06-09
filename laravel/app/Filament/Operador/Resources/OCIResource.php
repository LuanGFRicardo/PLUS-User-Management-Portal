<?php

namespace App\Filament\Operador\Resources;

use App\Filament\Operador\Resources\OCIResource\Pages;
use App\Filament\Operador\Resources\OCIResource\RelationManagers;
use App\Models\OCI;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OCIResource extends Resource
{
    protected static ?string $model = OCI::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
            'index' => Pages\ListOCIS::route('/'),
            'create' => Pages\CreateOCI::route('/create'),
            'edit' => Pages\EditOCI::route('/{record}/edit'),
        ];
    }
}
