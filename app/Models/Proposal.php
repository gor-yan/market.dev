<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Job;

class Proposal extends Model
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
     * return proposal owner
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * return proposal owner
     */
    public function jobs()
    {
        return $this->belongsTo(Job::class);
    }
}
