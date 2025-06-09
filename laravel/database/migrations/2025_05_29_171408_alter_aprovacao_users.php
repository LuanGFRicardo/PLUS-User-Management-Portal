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
                ->nullable()
                ->default(null)
                ->comment('NULL = Pendente, 0 = Reprovado, 1 = Aprovado')
                ->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('aprovacao')
                ->default(0)
                ->nullable()
                ->comment('0 = Não Aprovado, 1 = Aprovado')
                ->change();
        });
    }
};
