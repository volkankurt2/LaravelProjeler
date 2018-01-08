<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminProfileModel extends Model
{
    protected $table = "users";
    protected $fillable = ["name","email","password","phone","adress","city","country","post_code","linkedin","facebook","twitter","instagram","remember_token","admin"];
}
