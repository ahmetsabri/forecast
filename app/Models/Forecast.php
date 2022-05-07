<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forecast extends Model
{
    protected $fillable = ['date', 'data'];

    protected $casts = [
        'data' => 'array'
    ];

    public function setDataAttribute($value)
    {
        $this->attributes['data'] = json_encode($value);
    }
}
