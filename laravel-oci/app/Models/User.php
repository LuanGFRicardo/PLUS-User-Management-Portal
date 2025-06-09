<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    public const APROVACAO_PENDENTE = 2;
    public const APROVACAO_REPROVADO = 0;
    public const APROVACAO_APROVADO = 1;

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'empresa_id',
        'aprovacao',
        'data_aprovacao',
        'data_reprovacao',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'data_aprovacao' => 'datetime',
            'data_reprovacao' => 'datetime',
        ];
    }

    /**
     * Relacionamento com a empresa.
     *
     * @return BelongsTo
     */
    public function empresa(): BelongsTo
    {
        return $this->belongsTo(Empresa::class);
    }

    protected $attributes = [
        'aprovacao' => self::APROVACAO_PENDENTE,
    ];

    public function isApproved(): bool
    {
        return $this->aprovacao === self::APROVACAO_APROVADO;
    }
}
