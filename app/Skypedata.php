<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skypedata extends Model
{
    //
    protected $table = 'skypedatas';
    protected $fillable = ['username', 'email', 'projectname', 'projectdes', 'skypename','pro_url'];
}
