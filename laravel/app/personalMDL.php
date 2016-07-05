<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class personalMDL extends Model
{
    protected $table = 'personal';
    //protected $primaryKey = "my_id";#en caso la llave prmaria sea diferente de id
    public $timestamps = false;
    
}
