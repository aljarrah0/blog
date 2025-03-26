<?php

namespace Modules\Post\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['title', 'description', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
