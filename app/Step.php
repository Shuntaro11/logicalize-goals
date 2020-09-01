<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    protected $fillable = [
        'step', 'achievement', 'goal_id',
    ];

    public function goal()
    {
        return $this->belongsTo(\App\Goal::class, 'goal_id', 'id');
    }
}
