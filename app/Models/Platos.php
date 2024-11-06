<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platos extends Model
{
    use HasFactory;
    protected $table = 'platos';

    protected $fillable = [
        'Nombre',
        'Descripcion',
        'Imagen',
        'Imagen2',
        'Imagen3',
        'Estok',
        'Estok_min', // Asegúrate de que el nombre aquí sea correcto
        'Precio',
        'categoria_id' // Añade esta línea si tu tabla de platos tiene esta columna
    ];

    public $timestamps = true;
    protected $guarded = ['id'];
    protected $hidden = ['created_at', 'updated_at'];

    // Definir la relación con Categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id'); // Asegúrate de que el nombre de la columna sea correcto
    }
}
