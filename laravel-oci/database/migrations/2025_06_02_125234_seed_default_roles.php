<?php

use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Role;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $roles = ['admin', 'gerente', 'operador'];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role, 'guard_name' => 'web']);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $roles = ['admin', 'gerente', 'operador'];

        foreach ($roles as $role) {
            $roleModel = Role::where('name', $role)->first();
            if ($roleModel) {
                $roleModel->delete();
            }
        }
    }
};
