<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dossiermedical extends Model
{
    protected $table = 'dossiermedicals';
    
    public $primaryKey= 'ID_dossier';

    public $timestamps = true;
}
