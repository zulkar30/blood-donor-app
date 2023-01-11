<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    // Nama tabel
    public $table = 'doctor';

    // Untuk format date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Kolom tabel yang boleh diisi
    protected $fillable = [
        'user_id',
        'name',
        'birth_place',
        'birth_date',
        'contact',
        'address',
        'photo',
        'gender',
        'age',
        'blood_type',
        'created_at',
        'updated_at',
    ];

    // Relasi one to one
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    // Relasi one to many
    public function blood_request()
    {
        return $this->hasMany('App\Models\Operational\BloodRequest', 'doctor_id');
    }
}
