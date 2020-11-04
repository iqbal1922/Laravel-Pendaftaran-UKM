<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'mahasiswa';
    protected $fillable = ['nim', 'nama_mahasiswa', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'kelas','jurusan', 'rombel'];

    public function user()
    {
        return $this->hasOne('App\User', "id_mahasiswa");
    }
    
}
