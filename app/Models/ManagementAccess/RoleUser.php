<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    // Nama tabel
    public $table = 'role_user';

    // Untuk format date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Kolom tabel yang boleh diisi
    protected $fillable = [
        'role_id',
        'user_id',
        'created_at',
        'updated_at',
    ];

    // Relasi one to many
    public function role()
    {
        return $this->belongsTo('App\Models\ManagementAccess\Role', 'role_id', 'id');
    }

    // Relasi one to many
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
