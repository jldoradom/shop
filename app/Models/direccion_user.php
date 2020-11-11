<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class direccion_user extends Model
{
    use HasFactory;

    protected $fillable = [
        'direccion_id',
        'user_id'
    ];


    public function direccion(){
        return $this->belongsTo(Direccion::class);
    }
}
