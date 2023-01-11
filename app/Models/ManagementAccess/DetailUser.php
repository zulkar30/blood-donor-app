<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailUser extends Model
{
    // Nama tabel
    public $table = 'detail_user';

    // Untuk format date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Kolom tabel yang boleh diisi
    protected $fillable = [
        'user_id',
        'type_user_id',
        'role_id',
        'contact',
        'address',
        'photo',
        'gender',
        'age',
        'created_at',
        'updated_at',
    ];

    // Relasi one to one
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    // Relasi one to many
    public function type_user()
    {
        return $this->belongsTo('App\Models\ManagementAccess\TypeUser', 'type_user_id', 'id');
    }
}
