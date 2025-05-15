<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable =[
        'legalization_ date',
        'addres',
        'city',
        'observation_id',
        'casual_id'
    ];

    public function causal()
    {
        return $this->belongsTo(Causal::class, 'causal_id');
    }

    public function observation()
    {
        return $this->belongsTo(Observation::class, 'observation_id');
    }

    public function activities()
    {
        //return $this->belongsToMany(Activity::class, 'orders_activity', 'order_id', 'activity_id');
        return $this->belongsToMany(Activity::class);
    }

}
