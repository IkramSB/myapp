<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class patient extends Model
{
    protected $table = 'patients';
    
    public $primaryKey= 'ID_patient';

    public $timestamps = true;
}
