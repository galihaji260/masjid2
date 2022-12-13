<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $fillable = ['nama_kegiatan', 'tanggal', 'penanggung_jawab', 'pengisi', 'jenis', 'status','divisi'];

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
