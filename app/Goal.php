<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    protected $fillable = [
        'what', 'when', 'how_urgent', 'how_important', 'achievement', 'user_id',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function steps()
    {
        return $this->hasMany('App\Step', 'step_id', 'id');
    }

    public function reasons()
    {
        return $this->hasMany('App\Reason', 'reason_id', 'id');
    }
}
