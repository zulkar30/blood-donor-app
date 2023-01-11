<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Screening extends Model
{
    // Nama tabel
    public $table = 'screening';

    // Untuk format date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Kolom tabel yang boleh diisi
    protected $fillable = [
        'officer_id',
        'blood_type',
        'hiv',
        'hcv',
        'hbsag',
        'vdrl',
        'result',
        'date',
        'officer_id',
        'created_at',
        'updated_at',
    ];

    // Relasi one to many
    public function officer()
    {
        return $this->belongsTo('App\Models\Operational\Officer', 'officer_id', 'id');
    }
}
