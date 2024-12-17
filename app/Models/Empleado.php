<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'cedula',
        'email',
        'telefono',
        'fecha_nacimiento',
        'direccion',
        'departamento_id',
        'cargo_id',
        'salario_base',
        'fecha_contratacion',
        'estado',
    ];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }

    public function contratos()
    {
        return $this->hasMany(Contrato::class);
    }

    public function salarios()
    {
        return $this->hasMany(Salario::class);
    }

    public function permisosLaborales()
    {
        return $this->hasMany(PermisoLaboral::class);
    }
    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'role_user');
    }
    

}
