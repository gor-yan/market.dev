<?php

namespace App;

use App\Models\Employment;
use App\Models\Education;
use App\Models\Portfolio;
use App\Models\Proposal;
use App\Models\Skill;
use App\Models\Category;
use App\Models\Job;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;
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
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * @return bool
     */
    public function isFreelancer()
    {
        return $this->role == 'freelancer';
    }

    /**
     * @return bool
     */
    public function isClient()
    {
        return $this->role == 'client';
    }

    /**
     * Return Full Name For User
     * return string
     */
    public function getFullName()
    {
        return $this->name." ".$this->surname;
    }

    /**
     * The Skill that belong to the Users.
     */
    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'user_skill')->withTimestamps();
    }

    /**
     * Client posted jobs
     */
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }


    /**
     * The Category that belong to the Users.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_user')->withTimestamps();
    }

    /**
     * The Educations that belong to the Users.
     */
    public function educations()
    {
        return $this->hasMany(Education::class);
    }

    /**
     * The Employments that belong to the Users.
     */
    public function employments()
    {
        return $this->hasMany(Employment::class);
    }

    /**
     * The Portfolio that belong to the Users.
     */
    public function portfolio()
    {
        return $this->hasMany(Portfolio::class);
    }

    /**
     *
     */
    public function proposals()
    {
        return $this->hasMany(Proposal::class);
    }
}
