<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categoria';

    protected $fillable = ['Nombre']; // Ajusta esto según los campos que tengas

    public function platos()
    {
        return $this->hasMany(Platos::class, 'categoria_id');
    }
}
