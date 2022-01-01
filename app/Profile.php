<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';

    public $primarykey = 'id';
    public $timestamp = true;


    
    public function user(){
        return $this-> belongsTo('App\User');
    }
}
