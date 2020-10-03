<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $fillable = [
        'name', 'quantity','item_type', 'user_id','created_at','updated_at'
    ];
}
