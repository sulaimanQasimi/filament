<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use COM;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
protected static function boot(){
parent::boot();
static::created(function($user){
/*
   $obBaseApp = new COM("hMailServer.Application", NULL, CP_UTF8);
$obBaseApp->Authenticate("Administrator","S11solai");
$DomainASQ=$obBaseApp->Domains->ItemByName("sq.af");
$acAd=$DomainASQ->Accounts->Add();

$acAd->Address=$user->email;
$acAd->Password="123";
$acAd->Active=true;
$acAd->MaxSize=1024;
$acAd->Save();*/

});


}
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
