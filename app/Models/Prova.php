<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prova extends Model
{
    use HasFactory;
    protected $fillable = [
        'foto',
        'testemunha_id',
        'devedor_id',
        'created_at',
    ];

    //relacionamento de dividida com usuario
    public function Prova()
    {
        return $this->hasOne(User::class, 'id');
    }
    public function testemunha()
    {
        return $this->belongsTo(User::class, 'testemunha_id');
    }
    public function devedor()
    {
        return $this->belongsTo(User::class, 'devedor_id');
    }
    
}
