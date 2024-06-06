<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenTrabajo extends Model
{
    use HasFactory;

    protected $table = 'ordenes_trabajos';

    protected $fillable = [
        'quantity_used',
        'date',
        'observations'
    ];

    protected $casts = [
        'date' => 'datetime:d-m-Y',
    ];

    public function mantenimiento()
    {
        return $this->belongsTo(Mantenimiento::class, 'mantenimiento_id');
    }

    public function inventarioPieza()
    {
        return $this->belongsTo(InventarioPieza::class, 'inventario_pieza_id');
    }
}
