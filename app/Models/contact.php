<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class contact extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'contact';

    protected $fillable = ['name', 'email', 'subject', 'phone_number', 'message'];

    // public $timestamps = false;
}
