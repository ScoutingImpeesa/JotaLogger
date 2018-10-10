<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use App\User;

class QSO extends Model
{
    use SoftDeletes;
    protected $table = 'qsos';
    protected $dates = ['deleted_at'];
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function club()
    {
        return $this->belongsTo('App\Club','id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','id');
    }

    public function save(array $options = [])
    {
        // If no author has been assigned, assign the current user's id as the author of the post
        if (!$this->user_id && Auth::user()) {
            $this->user_id = Auth::user()->id;
        }
        if (!$this->owner_club_id && Auth::user()) {
            $this->owner_club_id = User::find(Auth::user()->id)->club_id;
        }
        parent::save();
    }
}
