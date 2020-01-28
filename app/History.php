<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'histories';
    protected $guarded = array('id');

    public static $rules = array(
        'post_id' => 'required',
        'edited_at' => 'required',
    );
}
