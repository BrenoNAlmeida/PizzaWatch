<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divida extends Model
{
    use HasFactory;
    protected $fillable = [
        'pizza',
        'redrigerante',
        'paga',
        'devedor_id',
        'prova_id',
        'created_at',
    ];

    //relacionamento de prova com divida
    public function prova()
    {
        return $this->belongsTo(Prova::class);
    }

}
