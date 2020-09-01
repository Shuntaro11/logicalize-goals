<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reason extends Model
{
    protected $fillable = [
        'reason', 'goal_id',
    ];

    public function goal()
    {
        return $this->belongsTo(\App\Goal::class, 'goal_id', 'id');
    }
}
