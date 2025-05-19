<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RBACResource\Pages;
use App\Filament\Resources\RBACResource\RelationManagers;
use App\Models\RBAC;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RBACResource extends Resource
{
    protected static ?string $model = RBAC::class;

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
            'index' => Pages\ListRBACS::route('/'),
            'create' => Pages\CreateRBAC::route('/create'),
            'edit' => Pages\EditRBAC::route('/{record}/edit'),
        ];
    }
}
