<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LogManagementResource\Pages;
use App\Models\Log;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Illuminate\Contracts\Auth\Authenticatable;

class LogManagementResource extends Resource
{
    protected static ?string $model = Log::class;

    protected static ?string $title = 'Gestão de Logs';
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

    public static function canAccess(): bool
    {
        $user = auth()->user();

        return $user && $user->hasRole(['admin', 'gerente', 'operador']);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('action')
                    ->label('Ação')
                    ->options([
                        'create_user' => 'Criar Usuário',
                        'create_group' => 'Criar Grupo',
                        'create_policy' => 'Criar Política de Permissão',
                    ])
                    ->reactive()
                    ->required(),

                Forms\Components\TextInput::make('name')
                    ->label('Nome')
                    ->required()
                    ->maxLength(255)
                    ->visible(fn (Forms\Get $get) => in_array($get('action'), ['create_user', 'create_group', 'create_policy'])),

                Forms\Components\Textarea::make('description')
                    ->label('Descrição')
                    ->maxLength(1000)
                    ->visible(fn (Forms\Get $get) => in_array($get('action'), ['create_user', 'create_group', 'create_policy'])),

                Forms\Components\Textarea::make('json')
                    ->label('JSON')
                    ->rows(5)
                    ->maxLength(5000)
                    ->json()
                    ->disabled()
                    ->visible(false)
                    ->dehydrated(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Usuário')
                    ->searchable(),

                Tables\Columns\TextColumn::make('action')
                    ->label('Ação')
                    ->searchable(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Nome')
                    ->limit(30)
                    ->searchable(),

                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'success' => fn($state) => $state === 'success',
                        'danger' => fn($state) => $state === 'error',
                        'warning' => fn($state) => $state === 'pending',
                        'gray' => fn($state) => !in_array($state, ['success', 'error', 'pending']),
                    ]),

                Tables\Columns\TextColumn::make('data_cadastro')
                    ->label('Data de Cadastro')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),

                Tables\Columns\TextColumn::make('json')
                    ->label('JSON')
                    ->limit(50),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'success' => 'Sucesso',
                        'error' => 'Erro',
                        'pending' => 'Pendente',
                        'other' => 'Outro',
                    ]),

                Tables\Filters\SelectFilter::make('action')
                    ->label('Ação')
                    ->searchable()
                    ->options(
                        Log::query()
                            ->distinct()
                            ->pluck('action', 'action')
                            ->sortKeys()
                            ->toArray()
                    ),
            ])
            ->actions([
                // Logs não devem ser editados ou excluídos diretamente - removido EditAction/DeleteAction
            ])
            ->bulkActions([
                // Nenhuma ação em lote, pois logs são imutáveis no contexto
            ])
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
            'create' => Pages\CreateLogManagement::route('/create'),
            // não adicionamos edit para garantir integridade dos logs
        ];
    }
}
