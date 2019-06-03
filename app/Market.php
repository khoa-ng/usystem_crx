<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class market extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'market';
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */ 
    protected $fillable = [
        'id', 'date' , 'country' , 'proxy', 'upwork_password', 'email', 'email_password', 'rising_talent' , 'test' , 'bid_date' , 'lancer_type' , 'security_question' , 'security_answer' , 'series'.'status', 'running' , 'utc' , 'proxy_port'
   ];
}
