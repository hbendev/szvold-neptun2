<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

use App\Solution;

class Subject extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'credit', 'description', 'name', 'identifier', 'creator_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    protected $casts = [
        'isPublished' => 'boolean',
        'solved' => 'true'
    ];

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }

    public function creator()
    {
        return $this->belongsTo('App\User', 'creator_id');
    }

    public function students()
    {
        return $this->belongsToMany('App\User', 'student_subject', 'subject_id', 'student_id' );
    }
}
