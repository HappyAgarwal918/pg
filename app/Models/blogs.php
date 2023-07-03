<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class blogs extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'blogs';

    protected $fillable = ['title', 'featured_img', 'img_path', 'description', 'tags'];

    // public $timestamps = false;
}
