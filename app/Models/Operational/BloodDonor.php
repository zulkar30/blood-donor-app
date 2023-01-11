<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodDonor extends Model
{
    // Nama tabel
    public $table = 'blood_donor';

    // Untuk format date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Kolom tabel yang boleh diisi
    protected $fillable = [
        'officer_id',
        'name',
        'blood_type',
        'gender',
        'age',
        'date',
        'time',
        'status',
        'created_at',
        'updated_at',
    ];

    // Relasi one to many
    public function officer()
    {
        return $this->belongsTo('App\Models\MasterData\Officer', 'officer_id', 'id');
    }
}
