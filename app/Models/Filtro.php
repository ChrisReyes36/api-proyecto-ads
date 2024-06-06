<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filtro extends Model
{
    use HasFactory;

    protected $table = 'filtros';

    protected $fillable = [
        'model',
        'brand',
        'description',
        'acquisition_date'
    ];

    public function contratos()
    {
        return $this->hasMany(Contrato::class, 'filtro_id');
    }
}
