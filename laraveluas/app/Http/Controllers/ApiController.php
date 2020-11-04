<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function mahasiswa()
    {
        $mahasiswa = Admin::all();
        return json_encode($mahasiswa);
    }
}
