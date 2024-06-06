<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'name',
        'address',
        'phone',
        'email'
    ];

    public function contratos()
    {
        return $this->hasMany(Contrato::class, 'cliente_id');
    }
}
