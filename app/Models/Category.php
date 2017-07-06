<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are not assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * The Users that belong to the category.
     */
    public function users()
    {
        return $this->belongsToMany(\User::class, 'category_user')->withTimestamps();
    }

    /**
     * The Users that belong to the category.
     */
    public function jobs()
    {
        return $this->belongsToMany(\Job::class, 'category_job')->withTimestamps();
    }
}
