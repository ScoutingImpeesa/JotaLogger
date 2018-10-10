<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Club extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public $additional_attributes = ['full_name'];
    public $fillable = ['name','callsign','locator','city','country']; 

    public function getFullNameAttribute()
    {
        return "{$this->name} {$this->callsign} {$this->city}";
    }
}
