<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class comments extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comments';
    protected $guarded = [];

    public function User(){
        return $this->belongsTo(\App\User::class);
    }

    public function Task(){
        return $this->belongsTo(\App\Task::class);
    }
}
