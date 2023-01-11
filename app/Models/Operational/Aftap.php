<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aftap extends Model
{
    // Nama tabel
    public $table = 'aftap';

    // Untuk format date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Kolom tabel yang boleh diisi
    protected $fillable = [
        'officer_id',
        'donor_id',
        'pouch_type',
        'blood_type',
        'volume',
        'created_at',
        'updated_at',
    ];
    
    // Relasi one to many
    public function donor()
    {
        return $this->belongsTo('App\Models\MasterData\Donor', 'donor_id', 'id');
    }
    
    // Relasi one to many
    public function officer()
    {
        return $this->belongsTo('App\Models\MasterData\Officer', 'officer_id', 'id');
    }
}
