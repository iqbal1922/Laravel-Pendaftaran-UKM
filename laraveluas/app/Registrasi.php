<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registrasi extends Model
{
    protected $table = 'registrasi';
    protected $filable = ['tanggal_daftar'];

    public function mahasiswa(){
        return $this->belongsTo('App\Admin', "id_mahasiswa");
    }

    public function ukm(){
        return $this->belongsTo("App\Ukm", "id_ukm");
    }
}
