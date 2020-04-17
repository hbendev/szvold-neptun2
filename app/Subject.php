<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'credit', 'description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'identifier', 'name', 'creator_id'
    ];

    public function creator()
    {
        return $this->belongsTo('App\User', 'creator_id');
    }

    public function students()
    {
        return $this->belongsToMany('App\Subject', 'student_subject', 'subject_id', 'student_id' );
    }
}
