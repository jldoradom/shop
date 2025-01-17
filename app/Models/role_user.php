<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role_user extends Model
{
    protected $table = "role_user";

    use HasFactory;

    protected $fillable = [
        'role_id',
        'user_id'
    ];

}
