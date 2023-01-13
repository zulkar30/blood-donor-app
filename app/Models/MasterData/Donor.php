<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    // Nama tabel
    public $table = 'donor';

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
        'created_at',
        'updated_at',
    ];

    // Relasi one to many
    public function aftap()
    {
        return $this->hasMany('App\Models\Operational\Aftap', 'officer_id');
    }
}
