<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodRequest extends Model
{
    // Nama tabel
    public $table = 'blood_request';

    // Untuk format date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Kolom tabel yang boleh diisi
    protected $fillable = [
        'doctor_id',
        'officer_id',
        'patient_id',
        'name',
        'blood_type',
        'volume',
        'gender',
        'age',
        'created_at',
        'updated_at',
    ];

    // Relasi one to many
    public function doctor()
    {
        return $this->belongsTo('App\Models\MasterData\Doctor', 'doctor_id', 'id');
    }

    // Relasi one to many
    public function officer()
    {
        return $this->belongsTo('App\Models\MasterData\Officer', 'officer_id', 'id');
    }

    // Relasi one to many
    public function patient()
    {
        return $this->belongsTo('App\Models\MasterData\Patient', 'patient_id', 'id');
    }
}
