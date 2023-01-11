<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // Nama tabel
    public $table = 'role';

    // Untuk format date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Kolom tabel yang boleh diisi
    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
    ];

    // Relasi many to many
    public function permission()
    {
        return $this->belongsToMany('App\Models\ManagementAccess\Permission');
    }

    // Relasi one to many
    public function permission_role()
    {
        return $this->hasMany('App\Models\ManagementAccess\PermissionRole', 'role_id');
    }

    // Relasi many to many
    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    // Relasi one to many
    public function role_user()
    {
        return $this->hasMany('App\Models\ManagementAccess\RoleUser', 'role_id');
    }
}
