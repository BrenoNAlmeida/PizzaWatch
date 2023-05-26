<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prova extends Model
{
    use HasFactory;
    protected $fillable = [
        'foto',
        'Evalidado',
        'devedor_id',
        'created_at',
    ];

    //relacionamento de dividida com usuario
    public function devedor()
    {
        return $this->belongsTo(User::class);
    }
    
}
