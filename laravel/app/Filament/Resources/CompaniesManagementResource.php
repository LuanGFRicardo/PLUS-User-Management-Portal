<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompaniesManagementResource\Pages;
use App\Models\Empresa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;

class CompaniesManagementResource extends Resource
{
    protected static ?string $model = Empresa::class;

    protected static ?string $title = 'Gestão de Empresas';
    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    protected static ?string $navigationGroup = 'Empresa';
    protected static ?int $navigationSort = 2;

    public static function getModelLabel(): string
    {
        return 'Empresa';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Empresas';
    }

    public static function getNavigationLabel(): string
    {
        return 'Gestão de Empresas';
    }

    public static function canAccess(): bool
    {
        $user = auth()->user();

        return $user && $user->hasRole(['admin']);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('razao_social')
                    ->label('Razão Social')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('cnpj')
                    ->label('CNPJ')
                    ->required()
                    ->maxLength(18),

                Forms\Components\TextInput::make('telefone')
                    ->label('Telefone')
                    ->maxLength(20),

                Forms\Components\Textarea::make('endereco')
                    ->label('Endereço')
                    ->maxLength(500),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('razao_social')
                    ->label('Razão Social')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('cnpj')
                    ->label('CNPJ')
                    ->searchable(),

                Tables\Columns\TextColumn::make('telefone')
                    ->label('Telefone'),

                Tables\Columns\IconColumn::make('ativo')
                    ->label('Ativo')
                    ->boolean(),

                Tables\Columns\TextColumn::make('data_cadastro')
                    ->label('Data de Cadastro')
                    ->dateTime(),

                Tables\Columns\TextColumn::make('data_inativacao')
                    ->label('Data de Inativação')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('ativo')
                    ->label('Ativo'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),

                Action::make('inativar')
                    ->label('Inativar')
                    ->icon('heroicon-o-trash')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(function ($record) {
                        $record->update([
                            'data_inativacao' => now(),
                            'ativo' => false,
                        ]);
                    })
                    ->visible(fn ($record) => is_null($record->data_inativacao)),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                ]),
            ])
            ->paginationPageOptions([10, 25, 50, 100, 250]);
    }

    public static function getRelations(): array
    {
        return [];
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
