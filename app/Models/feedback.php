<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    use HasFactory;

    protected $table = "feedback";

    protected $fillable = [
        'feedback',
        'user_id',
    ];

    public function feedbackuser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
