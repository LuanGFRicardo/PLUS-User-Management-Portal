<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserManagementResource\Pages;
use App\Models\User;
use App\Models\Empresa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Builder;

class UserManagementResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Usuário';

    public static function getModelLabel(): string
    {
        return 'Usuário';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Usuários';
    }

    public static function getNavigationLabel(): string
    {
        return 'Gestão de Usuários';
    }

    public function canAccessPanel(?Authenticatable $user): bool
    {
        return $user?->hasRole('admin', 'gerente');
    }

    protected static ?string $title = 'Gestão de Usuários';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nome')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->required()
                    ->email()
                    ->maxLength(255),

                Forms\Components\TextInput::make('password')
                    ->label('Senha')
                    ->password()
                    ->required(fn($record) => $record === null) // Só obrigatório na criação
                    ->dehydrateStateUsing(fn($state) => bcrypt($state)),

                Forms\Components\Select::make('empresa_id')
                    ->label('Empresa')
                    ->relationship('empresa', 'razao_social')
                    ->searchable()
                    ->preload(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nome')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),

                Tables\Columns\TextColumn::make('empresa.razao_social')
                    ->label('Empresa')
                    ->sortable(),

                Tables\Columns\TextColumn::make('data_aprovacao')
                    ->label('Aprovado em')
                    ->dateTime(),

                Tables\Columns\TextColumn::make('data_reprovacao')
                    ->label('Reprovado em')
                    ->dateTime(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('aprovacao')
                    ->label('Status de Aprovação')
                    ->options([
                        User::APROVACAO_PENDENTE => 'Pendente',
                        User::APROVACAO_REPROVADO => 'Reprovado',
                        User::APROVACAO_APROVADO => 'Aprovado',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),

                Action::make('aprovar')
                    ->label('Aprovar')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->visible(fn($record) => is_null($record->data_aprovacao) && is_null($record->data_reprovacao))
                    ->requiresConfirmation()
                    ->action(function($record) {
                        $record->update([
                            'aprovacao' => User::APROVACAO_APROVADO,
                            'data_aprovacao' => now(),
                            'data_reprovacao' => null,
                        ]);
                    }),

                Action::make('reprovar')
                    ->label('Reprovar')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->visible(fn($record) => is_null($record->data_aprovacao) && is_null($record->data_reprovacao))
                    ->requiresConfirmation()
                    ->action(function($record) {
                        $record->update([
                            'aprovacao' => User::APROVACAO_REPROVADO,
                            'data_reprovacao' => now(),
                            'data_aprovacao' => null,
                        ]);
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListUserManagement::route('/'),
            'create' => Pages\CreateUserManagement::route('/create'),
            'edit' => Pages\EditUserManagement::route('/{record}/edit'),
        ];
    }
}
