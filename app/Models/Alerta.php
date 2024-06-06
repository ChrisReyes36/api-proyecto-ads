<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alerta extends Model
{
    use HasFactory;

    protected $table = 'alertas';

    protected $fillable = [
        'alert_date',
        'alert_time',
        'description',
        'status',
        'contrato_id'
    ];

    protected $casts = [
        'alert_date' => 'datetime:d-m-Y',
        'alert_time' => 'datetime:H:i:s',
    ];

    public function contrato()
    {
        return $this->belongsTo(Contrato::class, 'contrato_id');
    }
}
