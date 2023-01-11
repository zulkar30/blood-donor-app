<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crossmatch extends Model
{
    // Nama tabel
    public $table = 'crossmatch';

    // Untuk format date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Kolom tabel yang boleh diisi
    protected $fillable = [
        'officer_id',
        'blood_type',
        'fase1',
        'fase2',
        'fase3',
        'result',
        'date',
        'created_at',
        'updated_at',
    ];

    // Relasi one to many
    public function officer()
    {
        return $this->belongsTo('App\Models\MasterData\Officer', 'officer_id', 'id');
    }
}
