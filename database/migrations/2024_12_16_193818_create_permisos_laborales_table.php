<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('permisos_laborales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->constrained('empleados')->onDelete('cascade');
            $table->string('tipo_permiso'); // Vacaciones, licencia médica, etc.
            $table->date('fecha_solicitud');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('estado')->default('Pendiente'); // Aprobado, Rechazado, Pendiente
            $table->timestamps();
        });
    }
    
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permisos_laborales');
    }
};
