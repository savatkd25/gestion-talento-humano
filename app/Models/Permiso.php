<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $fillable = ['nombre', 'descripcion'];

    // Relación muchos a muchos con Roles
    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'permiso_role', 'permiso_id', 'rol_id');
    }
    

 

}
