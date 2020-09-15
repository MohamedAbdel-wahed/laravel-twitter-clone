<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tweet;


class Like extends Model
{

    protected $guarded=[];

    public function tweet()
    {
        return $this->belongsto(Tweet::class);
    }

}
