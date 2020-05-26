<?php

namespace App;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class authentification extends Authenticatable
{
    use Notifiable;
    
    protected $fillable = [
        'id_user','login', 'password','role',
    ];
    protected $hidden = [
        'password',
    ];

    public function is_admin()
    {
        $role = $this->role;
        if(strcmp($role, "admin")==0)
        {
            return true;
        }
        return false;
    }
    public function is_medecin()
    {
        $role = $this->role;
        if(strcmp($role, "medecin")==0)
        {
            return true;
        }
        return false;
    }
    public function is_patient()
    {
        $role = $this->role;
        if(strcmp($role, "patient")==0)
        {
            return true;
        }
        return false;
    }
    public function is_secretaire()
    {
        $role = $this->role;
        if(strcmp($role, "secretaire")==0)
        {
            return true;
        }
        return false;
    }
}
