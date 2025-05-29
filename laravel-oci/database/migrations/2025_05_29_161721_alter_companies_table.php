<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('empresas', function (Blueprint $table) {
            // Remover colunas indesejadas
            $table->dropColumn([
                'nome_fantasia',
                'email',
                'cidade',
                'estado',
                'cep'
            ]);

            // Adicionar novas colunas
            $table->tinyInteger('ativo')
                ->default(1)
                ->after('telefone')
                ->comment('1 = Ativo, 0 = Inativo');

            $table->timestamp('data_cadastro')
                ->nullable()
                ->after('ativo')
                ->comment('Data de cadastro da empresa');

            $table->timestamp('data_inativacao')
                ->nullable()
                ->after('data_cadastro')
                ->comment('Data de inativação da empresa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('empresas', function (Blueprint $table) {
            // Recriar colunas removidas
            $table->string('nome_fantasia')->after('id');
            $table->string('email')->nullable()->after('cnpj');
            $table->string('cidade')->nullable()->after('endereco');
            $table->string('estado')->nullable()->after('cidade');
            $table->string('cep')->nullable()->after('estado');

            // Laravel automaticamente cria 'created_at' e 'updated_at' com timestamps()
            $table->timestamps();

            // Remover as colunas adicionadas
            $table->dropColumn(['ativo', 'data_cadastro', 'data_inativacao']);
        });
    }
};
