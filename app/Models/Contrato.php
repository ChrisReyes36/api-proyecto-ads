<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;

    protected $table = 'contratos';

    protected $fillable = [
        'start_date',
        'end_date',
        'maintenance_plan',
        'cliente_id',
        'filtro_id'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function filtro()
    {
        return $this->belongsTo(Filtro::class, 'filtro_id');
    }

    public function alertas()
    {
        return $this->hasMany(Alerta::class, 'contrato_id');
    }

    public function mantenimientos()
    {
        return $this->hasMany(Mantenimiento::class, 'contrato_id');
    }
}
