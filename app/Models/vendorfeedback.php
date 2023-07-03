<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vendorfeedback extends Model
{
    use HasFactory;

    protected $table = "vendor_feedback";

    protected $fillable = [
        'feedback',
        'rating',
        'user_id',
        'vendor_id'
    ];

    public function feedbackuser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function feedback_vendor()
    {
        return $this->belongsTo(User::class, 'vendor_id');
    }


}
