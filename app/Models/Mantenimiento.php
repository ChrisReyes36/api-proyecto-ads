<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    use HasFactory;

    protected $table = 'mantenimientos';

    protected $fillable = [
        'scheduled_date',
        'date_made',
        'status',
        'observations',
        'contrato_id'
    ];

    protected $casts = [
        'scheduled_date' => 'datetime:d-m-Y',
        'date_made' => 'datetime:d-m-Y',
    ];

    public function contrato()
    {
        return $this->belongsTo(Contrato::class, 'contrato_id');
    }

    public function ordenesTrabajo()
    {
        return $this->hasMany(OrdenTrabajo::class, 'mantenimiento_id');
    }
}
