<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number','description','agencies_id',
    ];

    public function agency(){
        return $this->belongsTo('App\Agency','agencies_id');
    }
    
    public function website(){
        return $this->hasMany('App\Website','divisions_id');
    }
}