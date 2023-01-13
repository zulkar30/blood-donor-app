<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    // Nama tabel
    public $table = 'patient';

    // Untuk format date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Kolom tabel yang boleh diisi
    protected $fillable = [
        'name',
        'birth_place',
        'birth_date',
        'contact',
        'address',
        'photo',
        'gender',
        'age',
        'blood_type',
        'room',
        'diagnosis',
        'created_at',
        'updated_at',
    ];

    // Relasi one to many
    public function blood_request()
    {
        return $this->hasMany('App\Models\Operational\BloodRequest', 'patient_id');
    }
}
