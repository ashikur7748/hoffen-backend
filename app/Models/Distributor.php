<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    use HasFactory;
    protected $fillable = [
        'distributor_name',
        'person',
        'mobile',
        'email',
        'social_media'
    ];
}
