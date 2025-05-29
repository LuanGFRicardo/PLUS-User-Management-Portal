<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Renomear colunas
            $table->renameColumn('name', 'nome');
            $table->renameColumn('password', 'senha');

            // Remover colunas desnecessárias
            $table->dropColumn(['email_verified_at', 'remember_token']);

            // Adicionar novas colunas
            $table->timestamp('data_cadastro')->useCurrent()->after('senha');
            $table->timestamp('data_aprovacao')->nullable()->after('data_cadastro');
            $table->timestamp('data_reprovacao')->nullable()->after('data_aprovacao');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Reverter nomes
            $table->renameColumn('nome', 'name');
            $table->renameColumn('senha', 'password');

            // Recriar colunas removidas
            $table->timestamp('email_verified_at')->nullable()->after('email');
            $table->rememberToken()->after('email_verified_at');

            // Remover novas colunas
            $table->dropColumn(['data_cadastro', 'data_aprovacao', 'data_reprovacao']);
        });
    }
};
