<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{

    /**
     * The attributes that are not assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * The Users that belong to the skill.
     */
    public function users()
    {
        return $this->belongsToMany(\User::class, 'user_skill')->withTimestamps();
    }

    /**
     *
     */
    public function jobs()
    {
        return $this->belongsToMany(\Job::class, 'skill_job')->withTimestamps();
    }
}
