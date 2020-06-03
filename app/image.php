<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    protected $table = 'images';
    
    public $primaryKey= 'ID_image';

    public $timestamps = true;
}
