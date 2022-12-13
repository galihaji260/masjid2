<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalData extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'divisi','no_hp', 'tipe'];

    public function pengisiYasinan()
    {
        return $this->belongsTo('PengisiYasinan', 'pengisi', 'id');
    }
}
