<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    // Nama tabel
    public $table = 'permission_role';

    // Untuk format date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Kolom tabel yang boleh diisi
    protected $fillable = [
        'permission_id',
        'role_id',
        'created_at',
        'updated_at',
    ];

    // Relasi one to many
    public function permission()
    {
        return $this->belongsTo('App\Models\ManagementAccess\Permission', 'permission_id', 'id');
    }

    // Relasi one to many
    public function role()
    {
        return $this->belongsTo('App\Models\ManagementAccess\Role', 'role_id', 'id');
    }
}
