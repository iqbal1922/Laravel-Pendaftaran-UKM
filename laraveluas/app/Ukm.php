<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ukm extends Model
{
    protected $table = 'ukm';
    protected $fillable = ['nama_ukm', 'penanggung_jawab', 'lokasi', 'hari', 'jam_mulai', 'jam_selesai'];
}
