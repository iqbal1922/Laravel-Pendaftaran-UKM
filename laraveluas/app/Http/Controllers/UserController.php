<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Registrasi;
use App\Ukm;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{
    public function dataukm()
    {
        $ukm = Ukm::all();
        return view('user.kelola', ['ukm' => $ukm]);
    }

    public function register()
    {
        $mahasiswa = Admin::find(Auth::user()->id_mahasiswa);
        $set_ukm = Registrasi::all()->where("id_mahasiswa", Auth::user()->id_mahasiswa);
        //Log::info($set_ukm);
        $ukm = Ukm::all();
        return view('user.register', ['mahasiswa' => $mahasiswa, 'ukm' => $ukm, 'set_ukm' => $set_ukm]);
    }

    public function registered($id_ukm, Request $request)
    {
        $result = Registrasi::where(['id_mahasiswa' => Auth::user()->id_mahasiswa, 'id_ukm' => $id_ukm])->count();

        if ($result >= 1) {
            // Session::flash('message', 'Anda tidak bisa mengikuti ekskul yang sama lebih dari satu');
            return redirect()->back()->with(['warning' => 'Anda tidak bisa mengikuti ekskul yang sama lebih dari dari satu !']);
        } else {
            $total = Registrasi::where(['id_mahasiswa' => Auth::user()->id_mahasiswa])->count();
            if ($total >= 3) {
                // Session::flash('message', 'Anda tidak bisa mengikuti ekskul yang lebih dari 3');
                return redirect()->back()->with(['warning' => 'Anda tidak bisa mengikuti ekskul yang lebih dari 3 !']);
            } else {
                Registrasi::insert([
                    'id_ukm' => $request->id,
                    'id_mahasiswa' => Auth::user()->id_mahasiswa,
                    'tanggal_daftar' => date('Y-m-d')
                ]);
                return redirect()->back()->with(['success' => 'Anda berhasil mengikuti ekskul !']);
            }
        }
    }
}
