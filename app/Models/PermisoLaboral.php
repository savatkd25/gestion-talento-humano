<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermisoLaboral extends Model
{
    use HasFactory;

    // Relación con Empleado
    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
}

