<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $fillable = ['nama_kegiatan', 'tanggal', 'penanggung_jawab', 'pengisi', 'jenis', 'status','divisi'];

    public function statusAgenda(){
        return $this->belongsTo(StatusKegiatan::class,'status');
    }

    public function pengisiAgenda(){
        return $this->belongsTo(PersonalData::class,'pengisi');
    }

    public function pjAgenda(){
        return $this->belongsTo(PersonalData::class,'penanggung_jawab');
    }

    public static function search($data)
    {
        $self =self::where(function ($query) use ($data) {
            foreach ($data as $key => $value) {
                $query->where($key, 'like', '%' . $value . '%');
            }
        })->get();
        
        return $self ;
    }
}
