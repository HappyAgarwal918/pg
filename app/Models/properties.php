<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class properties extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'properties';

    protected $fillable = [
        'locality',
        'latitude',
        'longitude',
        'name',
        'full_address',
        'room_type',
        'sb_room_count',
        'sb_bathroom_count',
        'sb_room_size',
        'sb_category',
        'sb_furnished_type',
        'sb_price',
        'db_room_count',
        'db_bathroom_count',
        'db_room_size',
        'db_category',
        'db_furnished_type',
        'db_price',
        'tb_room_count',
        'tb_bathroom_count',
        'tb_room_size',
        'tb_category',
        'tb_furnished_type',
        'tb_price',
        'fb_room_count',
        'fb_bathroom_count',
        'fb_room_size',
        'fb_category',
        'fb_furnished_type',
        'fb_price',
        'description',
        'food',
        'meal_type',
        'tenant',
        'amenities',
        'parking',
        'user_id',
    ];

    // public $timestamps = false;

    public function propertyuser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function wishlistproperty()
    {
        return $this->hasMany(wishlist::class);
    }

    public function propertyimg()
    {
        return $this->hasMany(propertyImg::class, 'property_id');
    }
}
