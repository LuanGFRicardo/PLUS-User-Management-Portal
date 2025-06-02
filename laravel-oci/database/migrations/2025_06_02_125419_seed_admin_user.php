<?php

use Illuminate\Database\Migrations\Migration;
use App\Models\User;
use Spatie\Permission\Models\Role;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Garantir que a role 'admin' existe
        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);

        // Criar o usuário Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@gmail.com'], // condição
            [
                'name' => 'Admin',
                'password' => bcrypt('admin'),
                'aprovacao' => User::APROVACAO_APROVADO,
                'email_verified_at' => now(),
            ]
        );

        // Atribuir a role 'admin'
        if (!$admin->hasRole('admin')) {
            $admin->assignRole('admin');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $admin = User::where('email', 'admin@gmail.com')->first();

        if ($admin) {
            $admin->delete();
        }
    }
};
