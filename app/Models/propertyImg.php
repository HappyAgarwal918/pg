<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class propertyImg extends Model
{
    use HasFactory;

    protected $table = "property_img";

    protected $fillable = ['name', 'img_src', 'excerpt', 'property_id'];

    // public $timestamps = false;

    public function imgproperty()
    {
        return $this->belongsTo(properties::class, 'property_id');
    }
}
