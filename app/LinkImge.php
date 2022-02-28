<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LinkImge extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['image' , 'link_id'];

    public function Link()
    {
        return $this->belongsTo(Link::class, 'link_id');
    }

    public function getimageAttribute($value)
    {
        if (isset($value))
            return url('assets/upload') . '/' . $value;
    }
}
