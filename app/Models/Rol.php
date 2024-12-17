<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles'; // Define el nombre correcto de la tabla
    protected $fillable = ['nombre', 'descripcion'];

    // Relación muchos a muchos con Permisos
    public function permisos()
    {
        return $this->belongsToMany(Permiso::class, 'permiso_role', 'rol_id', 'permiso_id');
    }
    

    

    // Relación muchos a muchos con Empleados
    public function empleados()
    {
        return $this->belongsToMany(Empleado::class, 'role_user');
    }
}



