<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class sponser extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sponser';

    protected $fillable = ['name', 'img', 'path'];

    // public $timestamps = false;
}
