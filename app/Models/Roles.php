<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model // Manteniendo el nombre como Roles
{
    use HasFactory;

    // Definir la tabla si no sigue la convención
    protected $table = 'roles'; // Asegúrate de que la tabla en la base de datos se llame 'roles'

    // Si deseas definir qué campos son asignables en masa
    protected $fillable = [
        'name',
    ];

    // Definir la relación con el modelo User
    public function users()
    {
        return $this->hasMany(User::class, 'rol_id'); // Definir la relación con el modelo User
    }
}
