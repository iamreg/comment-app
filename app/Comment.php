<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Comment extends Model
{

    private static $rules = [
        'name' => 'required|min:2|max:50',
        'comment' => 'required'
    ];


    /**
     * Establish relationship to replies
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id')->with('replies');
    }

    /**
     *  Validates data, prefer to have this in static so I can do validation before creating an instance
     *
     * @return Validator
     */
    public static function validation($data)
    {
        return Validator::make($data, self::$rules);
    }
}
