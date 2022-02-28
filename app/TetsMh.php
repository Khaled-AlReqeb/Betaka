<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TetsMh extends Model
{
    //
    use SoftDeletes;



    protected $fillable = ['image' , 'title'];


    public function getimageAttribute($value)
    {
        if (isset($value))
            return url('assets/upload') . '/' . $value;
    }
}
