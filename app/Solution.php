<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Solution extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    protected $casts = [
        'rated' => 'boolean',
    ];

    public function task()
    {
        return $this->belongsTo('App\Task', 'task_id');
    }

    public function student()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
