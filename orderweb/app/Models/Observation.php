<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    use HasFactory;
    protected $table = 'Observation';
     protected $fillable = [
        'description'
      
    ];

     public function orders(){
        return $this->hasMany(Order::class);
    }
}
