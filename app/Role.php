<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['id','role_name'];

    public function users(){
      return $this->belongsToMany(User::Class,'role_user','email','role_id');
    }


}
