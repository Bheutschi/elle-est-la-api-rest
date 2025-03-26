<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasUuids;
    use HasFactory;
    protected $fillable = [
        'id',
        'total',
        'status',
        'date_commande',
    ];


}
