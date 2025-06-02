<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LogManagementResource\Pages;
use App\Models\Log;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns;
use Filament\Tables\Filters\SelectFilter;

class LogManagementResource extends Resource
{
    protected static ?string $model = Log::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationGroup = 'Administração';
    protected static ?int $navigationSort = 99;

    public static function getModelLabel(): string
    {
        return 'Log';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Logs';
    }

    public static function getNavigationLabel(): string
    {
        return 'Gestão de Logs';
    }

    public function canAccessPanel(?Authenticatable $user): bool
    {
        return $user?->hasRole('admin', 'gerente');
    }

    // Nenhum form: logs não devem ser editados diretamente
    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),

                Columns\TextColumn::make('user.name')
                    ->label('Usuário')
                    ->searchable(),

                Columns\TextColumn::make('action')
                    ->label('Ação')
                    ->searchable(),

                Columns\TextColumn::make('name')
                    ->label('Nome')
                    ->limit(30)
                    ->searchable(),

                Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'success' => fn($state) => $state === 'success',
                        'danger' => fn($state) => $state === 'error',
                        'warning' => fn($state) => $state === 'warning',
                        'gray' => fn($state) => !in_array($state, ['success', 'error', 'warning']),
                    ]),

                Columns\TextColumn::make('data_cadastro')
                    ->label('Data de Cadastro')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'success' => 'Sucesso',
                        'error' => 'Erro',
                        'warning' => 'Aviso',
                    ]),
                SelectFilter::make('action')
                    ->label('Ação')
                    ->searchable()
                    ->options(
                        Log::query()->distinct()->pluck('action', 'action')->toArray()
                    ),
            ])
            ->actions([])  // Sem ações diretas
            ->bulkActions([])  // Sem ações em lote
            ->defaultSort('data_cadastro', 'desc')
            ->paginationPageOptions([10, 25, 50, 100, 250]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLogManagement::route('/'),
            // Sem rotas para create ou edit
        ];
    }
}
