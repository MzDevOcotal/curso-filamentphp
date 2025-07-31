<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'country_id',
        'state_id',
        'city_id',
        'address',
        'postal_code'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }

    /* RELACIONES MUCHOS A MUCHOS PARA TABLAS PIVOTE */

    /* Un usuario puede tener muchos calendars (tabla pivote) */
    public function calendars(){
        return $this->belongsToMany(Calendar::class);
    }

    /* Un usuario puede tener muchos departamentos (tabla pivote) */
    public function departaments(){
        return $this->belongsToMany(Departament::class);
    }

    /* Un usuario puede tener muchas vacaciones */
    public function holidays(){
        return $this->hasMany(Holiday::class);
    }

    /* Un usuario puede tener muchas hojas de tiempo */
    public function timesheets(){
        return $this->hasMany(Timesheet::class);
    }






}
