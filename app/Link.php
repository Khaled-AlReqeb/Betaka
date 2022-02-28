<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Link extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['image' , 'title' , 'link' ,'views' ,'order' ,'is_active' , 'startDate' ,'finishDate' , 'user_id'];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function setTransactionDateAttribute($value)
    {
        $this->attributes['startDate'] = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
        $this->attributes['finishDate'] = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
    }

    public function getimageAttribute($value)
    {
        if (isset($value))
            return url('assets/upload') . '/' . $value;
    }
}
