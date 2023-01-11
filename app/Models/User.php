<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    // Untuk format date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'updated_at',
        'created_at',
        'email_verified_at',
    ];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     * 
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'photo'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
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
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    // Relasi one to one
    public function detail_user()
    {
        return $this->hasOne('App\Models\ManagementAccess\DetailUser', 'user_id');
    }

    // Relasi many to many
    public function role()
    {
        return $this->belongsToMany('App\Models\ManagementAccess\Role');
    }

    // Relasi one to many
    public function role_user()
    {
        return $this->hasMany('App\Models\ManagementAccess\RoleUser', 'user_id');
    }

    // Relasi one to one
    public function doctor()
    {
        return $this->hasOne('App\Models\Operational\Doctor', 'user_id');
    }

    // Relasi one to one
    public function donor()
    {
        return $this->hasOne('App\Models\Operational\Donor', 'user_id');
    }

    // Relasi one to one
    public function officer()
    {
        return $this->hasOne('App\Models\Operational\Officer', 'user_id');
    }

    // Relasi one to one
    public function patient()
    {
        return $this->hasOne('App\Models\Operational\Patient', 'user_id');
    }
}
