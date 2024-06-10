<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Paket;
use Illuminate\Http\Request;

class DashboardPaketController extends Controller
{

    public function index()
    {
        return view('dashboard.paket.index', [
            'pakets' => Paket::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.paket.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_paket' => ['required', 'max:255'],
            'keterangan_paket' => ['required', 'max:255'],
            'harga' => ['required']
        ]);

        DB::table('pakets')->insert($validatedData);

        return redirect('/dashboard/pakets');
    }

    public function edit($id)
    {
        $paket = DB::table('pakets')->where('id', $id)->first();
        return view('dashboard.paket.edit', compact('paket'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_paket' => ['required', 'max:255'],
            'keterangan_paket' => ['required', 'max:255'],
            'harga' => ['required']
        ]);

        DB::table('pakets')->where('id', $id)->update($validatedData);
        return redirect('/dashboard/pakets');
    }

    public function destroy(Paket $paket)
    {
        Paket::find($paket->id)->delete();
        return redirect('/dashboard/pakets');
    }

    public function recycle(){
        return view('dashboard.paket.recycle', [
            'pakets' => Paket::onlyTrashed()->paginate(10)
        ]);
    }

    public function restore($paketID){
        Paket::onlyTrashed()->find($paketID)->restore();
        return redirect('/dashboard/pakets/recycle');
    }

    public function delete($paketID){
        Paket::onlyTrashed()->find($paketID)->forceDelete();
        return redirect('/dashboard/pakets/recycle');
    }
}
