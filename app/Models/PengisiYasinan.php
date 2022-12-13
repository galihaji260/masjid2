<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengisiYasinan extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'pasaran', 'pengisi'];

    public function personalData()
    {
        return $this->hasMany('PersonalData', 'pengisi', 'id');
    }
}
