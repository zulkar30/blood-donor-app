<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    // Nama tabel
    public $table = 'permission';

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
    public function role()
    {
        return $this->belongsToMany('App\Models\ManagementAccess\Role');
    }

    // Relasi one to many
    public function permission_role()
    {
        return $this->hasMany('App\Models\ManagementAccess\PermissionRole', 'permission_id');
    }
}
