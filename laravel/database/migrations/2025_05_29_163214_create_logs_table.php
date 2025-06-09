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
        Schema::create('logs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade')
                ->comment('Usuário responsável pela ação');

            $table->string('action')
                ->comment('Tipo de requisição: CREATE, UPDATE, DELETE, etc.');

            $table->string('name')
                ->comment('Nome relacionado ao evento');

            $table->text('description')
                ->nullable()
                ->comment('Descrição detalhada da ação');

            $table->string('status')
                ->comment('Status da ação: SUCCESS, FAILURE, etc.');

            $table->json('json')
                ->comment('Payload completo do log em formato JSON');

            $table->timestamp('data_cadastro')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Data e hora do registro do log');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};
