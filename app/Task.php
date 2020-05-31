<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Task extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    ];

    protected $appends = ['solved'];

    public function getSolvedAttribute(){
        if(Auth::user()->type === 'teacher'){
            return false;
        }
        return Solution::where('student', Auth::user()->id)->exists();
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    protected $casts = [
    ];

    public function solutions(){
        return $this->hasMany('App\Solution');
    }

    public function subject()
    {
        return $this->belongsTo('App\Subject', 'subject_id');
    }
}
