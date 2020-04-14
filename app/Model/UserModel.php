<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    //    protected $primaryKey="id";
    protected $table='a_user';
    protected $guarded =[];
    public $timestamps = false;
}
