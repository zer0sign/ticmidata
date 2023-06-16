<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Session;


class PelangganController extends Controller
{
public function index(){
    $pelanggans = Pelanggan::orderBy('id_pelanggan', 'asc')->paginate(10);
    return view('welcome')->with(compact('pelanggans'));;
}

public function destroy($id){
    $pelanggan = Pelanggan::where('id_pelanggan',$id)->first();
    if ($pelanggan) {
        $pelanggan->delete();
        Session::flash('success', 'Data has been deleted successfully.');
    } else {
        Session::flash('error', 'Data not found.');
    }
    return redirect()->back();
}

public function detail($id){
    $pelanggan = Pelanggan::where('id_pelanggan',$id)->get();
    $pelanggan = $pelanggan[0];
    return view('pelanggan.detail')->with(compact('pelanggan'));
}

public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'nama_pelanggan' => 'required'
        ]);

        $pelanggan = new Pelanggan();
        $pelanggan->id_kyc = $request->id_kyc;
        $pelanggan->id_perusahaan = $request->id_perusahaan;
        $pelanggan->username = $request->username;
        $pelanggan->password = bcrypt($request->password); // Mengenkripsi password
        $pelanggan->nama_pelanggan = $request->nama_pelanggan;
        $pelanggan->tempat_lahir = $request->tempat_lahir;
        $pelanggan->tanggal_lahir = $request->tanggal_lahir;
        $pelanggan->gender = $request->gender;
        $pelanggan->alamat_ktp = $request->alamat_ktp;
        $pelanggan->alamat_domisili = $request->alamat_domisili;
        $pelanggan->kota_domisili = $request->kota_domisili;
        $pelanggan->provinsi_domisili = $request->provinsi_domisili;
        $pelanggan->email = $request->email;
        $pelanggan->no_hp = $request->no_hp;
        $pelanggan->fb = $request->fb;
        $pelanggan->profil_photo = $request->profil_photo;
        $pelanggan->kyc = $request->kyc;
        $pelanggan->jabatan = $request->jabatan;
        $pelanggan->skor_kuesioner = $request->skor_kuesioner;
        $pelanggan->status_pelanggan = $request->status_pelanggan;
        $pelanggan->status_akun = $request->status_akun;
        $pelanggan->role_pelanggan = $request->role_pelanggan;
        $pelanggan->status_mitra = $request->status_mitra;

        $pelanggan->save();

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan.');
    }

}
