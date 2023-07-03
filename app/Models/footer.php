<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class footer extends Model
{
    use HasFactory;

    protected $table = 'footer';

    protected $fillable = [
        'about',
        'email',
        'phone',
        'address',
        'facebook',
        'twitter',
        'pinterest',
        'googleplus',
        'dribbble',
        'instagram',
    ];

    // public $timestamps = false;
}
