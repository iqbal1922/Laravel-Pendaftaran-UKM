<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Ukm;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function dataMhs()
    {
        $mahasiswa = Admin::all();
        return view('admin.kelola_mahasiswa', ['mahasiswa' => $mahasiswa]);
    }

    public function dataUser()
    {
        $user = User::all();
        $mahasiswa = Admin::all();
        return view('admin.kelola_pengguna', ['user' => $user, 'mahasiswa' => $mahasiswa]);
    }

    public function dataUkm()
    {
        $ukm = Ukm::all();
        return view('admin.kelola_ukm', ['ukm' => $ukm]);
    }

    public function create(Request $request)
    {
        Admin::create($request->all());
        return redirect()->back()->with(['success' => 'Data Mahasiswa Berhasil Disimpan !']);
    }

    public function createukm(Request $request)
    {
        Ukm::create($request->all());
        return redirect()->back()->with(['success' => 'Data Ukm Berhasil Disimpan !']);
    }

    public function hapus($id)
    {
        $mahasiswa = Admin::find($id);
        if ($mahasiswa->user()->count() != 0) {
            $mahasiswa->user->delete();
            $mahasiswa->delete();
        } else {
            $mahasiswa->delete();
        }
        return redirect()->back()->with(['warning' => 'Data Mahasiswa Berhasil Dihapus !']);
    }

    public function hapusukm($id)
    {
        $ukm = Ukm::find($id);
        $ukm->delete();
        return redirect()->back()->with(['warning' => 'Data Ukm Berhasil Dihapus !']);
    }

    public function hapususer($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }

    public function editmhs($id, Request $request)
    {
        $mahasiswa = Admin::find($id);
        $mahasiswa->update($request->all());
        return redirect()->back()->with(['success' => 'Data Mahasiswa Berhasil Diedit !']);
    }

    public function getmhsId($id)
    {
        $mahasiswa = Admin::find($id);
        return json_encode($mahasiswa);
    }

    public function getukmId($id)
    {
        $ukm = Ukm::find($id);
        return json_encode($ukm);
    }

    public function editukm($id, Request $request)
    {
        $ukm = Ukm::find($id);
        $ukm->update($request->all());
        return redirect()->back()->with(['success' => 'Data Ukm Berhasil Diedit !']);
    }

    public function createuser(Request $request)
    {
        User::create([
            'id_mahasiswa' => $request->id_mahasiswa,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'id' => $request->id,
            'role' => '1'
        ]);
        return redirect()->back()->with(['success' => 'Data User Berhasil Disimpan !']);
    }

    public function getuserId($id)
    {
        $user = User::find($id);
        return json_encode($user);
    }

    public function edituser($id, Request $request)
    {
        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'nim' => $request->nim,
            'nama_mahasiswa' => $request->nama_mahasiswa
        ]);
        return redirect()->back()->with(['success' => 'Data User Berhasil Diedit !']);
    }

    public function resetpassword($id, Request $request)
    {
        $user = User::find($id);
        $user->update(['password' => sha1($request->password)]);
        return redirect()->back()->with(['success' => 'Password User Berhasil Diedit !']);
    }
}
