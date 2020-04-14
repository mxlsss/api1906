<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{
    protected $table='a_users';
    protected $guarded =[];
    public $timestamps = false;
}
