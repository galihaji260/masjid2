<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusKegiatan extends Model
{
    use HasFactory;

    public function agendaStatus(){
        return $this->hasMany(Agenda::class,'status');
    }
}
