<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{

    /**
     * The attributes that are not assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    protected $table = 'user_education';

    public $timestamps = false;
    /**
     * The Users that belong to the skill.
     */
    public function user()
    {
        return $this->belongsTo(\User::class);
    }

 
}
