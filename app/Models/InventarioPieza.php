<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventarioPieza extends Model
{
    use HasFactory;

    protected $table = 'inventario_piezas';

    protected $fillable = [
        'name',
        'description',
        'quantity',
        'location'
    ];

    public function ordenesTrabajo()
    {
        return $this->hasMany(OrdenTrabajo::class, 'inventario_pieza_id');
    }
}
