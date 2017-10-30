<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rating extends Model
{
    //
    protected $table = 'rating';
    
         /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
           'id', 'id_user', 'id_user_give', 'rating'
        ];
}
