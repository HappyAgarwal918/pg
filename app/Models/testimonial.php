<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class testimonial extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'testimonial';

    protected $fillable = ['name', 'designation', 'description', 'img', 'img_path'];

    // public $timestamps = false;
}
