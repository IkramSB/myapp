<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class secretaire extends Model
{
    protected $table = 'secretaires';
    
    public $primaryKey= 'ID_secretaire';

    public $timestamps = true;
}
