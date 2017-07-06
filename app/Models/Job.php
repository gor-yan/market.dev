<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Job extends Model
{
    use SoftDeletes;

    const TYPE_HOURLY = 'hourly';
    const TYPE_FIXED = 'fixed';
    const STATUS_NEW = 'new';
    const STATUS_CLOSED = 'closed';
    const STATUS_PROGRESS = 'progress';
    const STATUS_FINISHED = 'finished';


    public $timestamps = true;

    /**
     * The attributes that are not assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * The Skill that belongs to Job.
     */
    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'skill_job')->withTimestamps();
    }


    /**
     * The Category that belongs to Job.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_job')->withTimestamps();
    }

    /**
     *
     */
    public function proposals()
    {
        return $this->hasMany(Proposal::class);
    }
}


























