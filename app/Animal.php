<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'dogtype' => 'required',
        'color' => 'required',
        'gender' => 'required',
        'prefecture' => 'required',
        'birthday' => 'required',
        'price' => 'required',
        );
        
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
