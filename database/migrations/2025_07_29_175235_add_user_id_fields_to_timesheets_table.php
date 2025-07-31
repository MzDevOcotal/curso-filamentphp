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
        Schema::table('timesheets', function (Blueprint $table) {
            // Añadir la columna user_id
            // foreignId() es el método recomendado para claves foráneas UNSIGNED BIGINT
            //constrained() automáticamente infiere el nombre de la tabla (users) y la columna (id)
            $table->foreignId('user_id')
                ->nullable() // Permite que el campo sea NULL. Quita esto si SIEMPRE debe estar asociado a un usuario.
                ->constrained() // Asume 'users' tabla y 'id' columna
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('timesheets', function (Blueprint $table) {
                        // Primero, elimina la clave foránea
            $table->dropConstrainedForeignId('user_id'); // Elimina la restricción automáticamente inferida

            // Luego, elimina la columna
            $table->dropColumn('user_id');
        });
    }
};
