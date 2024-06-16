<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'linkwebsite','divisions_id','subdivisions_id'
    ];
    public function division(){
        return $this->belongsTo('App\Divison','divisions_id');
    }
    public function subdivision(){
        return $this->belongsTo('App\Subdivison','subdivisions_id');
    }
    public function report(){
        return $this->hasMany('App\Report','websites_id');
    }
}