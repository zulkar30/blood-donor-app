<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeUser extends Model
{
    // Nama tabel
    public $table = 'type_user';

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

    // Relasi one to many
    public function detail_user()
    {
        return $this->hasMany('App\Models\ManagementAccess\DetailUser', 'type_user_id');
    }
}
