<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class mailchimp extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'mailchimp';

    protected $fillable = ['email'];

    // public $timestamps = false;

}
