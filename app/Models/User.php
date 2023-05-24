<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];


    /**
     * Devuelve un array con los pedidos que ese usuario ha realizado
     * relacion uno(User) a muchos(Pedidos)
     * testeado tinker exitoso
     * 
     */
    public function pedidos(){
        return $this->hasMany('App\Models\Pedido');
    }

    /**
     * Devuelve un array con las suscripciones que ese usuario ha realizado
     * relacion uno(User) a muchos(Suscripciones)
     */
    public function suscripciones(){
        return $this->hasMany('App\Models\Suscripcion');
    }



    // Verificar si el usuario tiene una suscripción activa
    public function hasSubscription()
    {
        return $this->suscripciones()->where('activo', true)->exists();
    }


}
