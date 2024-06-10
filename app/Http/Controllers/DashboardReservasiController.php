<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Reservasi;
use Illuminate\Http\Request;

class DashboardReservasiController extends Controller
{

    public function index()
    {
        return view('dashboard.reservasi.index',[
            'reservasis' => Reservasi::where('isApprove', 0)->get()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_paket' => ['required', 'max:255'],
            'keterangan_paket' => ['required', 'max:255'],
            'nama_pelanggan' => ['required', 'max:255'],
            'no_pelanggan' => ['required', 'max:255'],
            'nama_barber' => ['required', 'max:255'],
            'jam_potong' => ['required', 'max:255'],
            'harga' => ['required']
        ]);

        // Misalnya Anda ingin menambahkan data dari tabel lain, Anda bisa melakukan query secara terpisah
        // lalu menggabungkannya ke dalam $validatedData sebelum menyimpan ke database.

        // Contoh:
        // $paket = DB::table('pakets')->where('id', $request->input('paket_id'))->first();
        // $validatedData['nama_paket'] = $paket->nama_paket;
        
        Reservasi::create($validatedData);
        return redirect('/product');
    }

    public function update(Request $request, Reservasi $reservasi)
    {
        $validatedData = $request->validate([
            'persetujuan' => ['required'],
            'nama_paket' => ['required', 'max:255'],
            'keterangan_paket' => ['required', 'max:255'],
            'nama_pelanggan' => ['required', 'max:255'],
            'nohp_pelanggan' => ['required', 'max:255'],
            'nama_barber' => ['required', 'max:255'],
            'jam_potong' => ['required', 'max:255'],
            'harga' => ['required'],
            'isApprove' => ['required']
        ]);

        $reservasi->update($validatedData);
        return redirect('/dashboard/reservasis');
    }

    public function destroy(Reservasi $reservasi)
    {
        $reservasi->delete();
        return redirect('/dashboard/reservasis');
    }

    public function recycle()
    {
        return view('dashboard.reservasi.recycle', [
            'reservasis' => Reservasi::onlyTrashed()->where('isApprove', 0)->get()
        ]);
    }

    public function restore($reservasiId)
    {
        Reservasi::onlyTrashed()->where('isApprove', 0)->find($reservasiId)->restore();
        return redirect('/dashboard/reservasis/recycle');
    }

    public function delete($reservasiId)
    {
        Reservasi::onlyTrashed()->where('isApprove', 0)->find($reservasiId)->forceDelete();
        return redirect('/dashboard/reservasis/recycle');
    }
}
