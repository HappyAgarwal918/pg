<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wishlist extends Model
{
    use HasFactory;

    protected $table = "wishlist";

    protected $fillable = [
        'property_id',
        'user_id',
    ];

    public function savedproperty()
    {
        return $this->belongsTo(properties::class,'property_id');
    }
}
