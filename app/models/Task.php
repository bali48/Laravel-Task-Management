<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'task';
//
//    /**
//     * The primary key associated with the table.
//     *
//     * @var string
//     */
//    protected $primaryKey = 'id';

    protected $guarded = [];


    public function user(){
        return $this->belongsTo(\App\User::class);
    }

    public function Comments(){
        return $this->hasMany(\App\comments::class);
    }

}
