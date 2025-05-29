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
            $table->tinyInteger('aprovacao')
                ->default(0)
                ->after('empresa_id')
                ->comment('0 = Não Aprovado, 1 = Aprovado');

            $table->timestamp('data_aprovacao')
                ->nullable()
                ->after('aprovacao')
                ->comment('Data e hora da aprovação do usuário');

            $table->timestamp('data_reprovacao')
                ->nullable()
                ->after('data_aprovacao')
                ->comment('Data e hora da reprovação do usuário');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['aprovacao', 'data_aprovacao', 'data_reprovacao']);
        });
    }
};
