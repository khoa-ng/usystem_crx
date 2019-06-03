<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResourceManagement extends Model
{
    protected $table = 'resources';

    protected $fillable = ['name', 'content','type','level','user_id', 'project_id'];

    public function project_info()
    {
        return $this->hasOne('App\Project','id','project_id');
    }
}
