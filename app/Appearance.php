<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appearance extends Model
{
    use SoftDeletes;

    protected $fillable = ['image' , 'imageUrl' , 'color' , 'user_id'];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getimageAttribute($value)
    {
        if (isset($value))
            return url('assets/upload') . '/' . $value;
    }

}
