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
            if (Schema::hasColumn('empresas', 'nome_fantasia')) {
                $table->dropColumn('nome_fantasia');
            }
            if (Schema::hasColumn('empresas', 'email')) {
                $table->dropColumn('email');
            }
            if (Schema::hasColumn('empresas', 'cidade')) {
                $table->dropColumn('cidade');
            }
            if (Schema::hasColumn('empresas', 'estado')) {
                $table->dropColumn('estado');
            }
            if (Schema::hasColumn('empresas', 'cep')) {
                $table->dropColumn('cep');
            }

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

    public function down(): void
    {
        Schema::table('empresas', function (Blueprint $table) {
            if (!Schema::hasColumn('empresas', 'nome_fantasia')) {
                $table->string('nome_fantasia')->after('id');
            }
            if (!Schema::hasColumn('empresas', 'email')) {
                $table->string('email')->nullable()->after('cnpj');
            }
            if (!Schema::hasColumn('empresas', 'cidade')) {
                $table->string('cidade')->nullable()->after('endereco');
            }
            if (!Schema::hasColumn('empresas', 'estado')) {
                $table->string('estado')->nullable()->after('cidade');
            }
            if (!Schema::hasColumn('empresas', 'cep')) {
                $table->string('cep')->nullable()->after('estado');
            }

            if (!Schema::hasColumn('empresas', 'created_at') && !Schema::hasColumn('empresas', 'updated_at')) {
                $table->timestamps();
            }

            $table->dropColumn(['ativo', 'data_cadastro', 'data_inativacao']);
        });
    }
};
