<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status','information','dateupdate','websites_id',
    ];
    
    public function website(){
        return $this->belongsTo('App\Website','websites_id');
    }
}