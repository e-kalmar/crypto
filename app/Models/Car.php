<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'license_number',
        'vin',
        'year',
        'model',
        'manufacturer'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
