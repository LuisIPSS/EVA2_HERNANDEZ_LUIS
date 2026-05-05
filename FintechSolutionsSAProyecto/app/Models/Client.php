<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'rut',
        'first_name',
        'last_name',
        'email',
        'phone_number',
    ];

}
