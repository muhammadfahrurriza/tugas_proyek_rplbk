<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Barber;
use Illuminate\Http\Request;

class DashboardBarberController extends Controller
{

    public function index()
    {
        $barbers = DB::table('barbers')->get();
        return view('dashboard.barber.index', compact('barbers'));
    }

    public function create()
    {
        return view('dashboard.barber.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_barber' => ['required', 'max:255'],
            'nohp_barber' => ['required', 'max:255'],
            'umur' => ['required']
        ]);

        DB::table('barbers')->insert($validatedData);

        return redirect('/dashboard/barbers');
    }

    public function edit($id)
    {
        $barber = DB::table('barbers')->where('id', $id)->first();
        return view('dashboard.barber.edit', compact('barber'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_barber' => ['required', 'max:255'],
            'nohp_barber' => ['required', 'max:255'],
            'umur' => ['required']
        ]);

        DB::table('barbers')->where('id', $id)->update($validatedData);
        return redirect('/dashboard/barbers');
    }

    public function destroy(Barber $barber)
    {
        Barber::find($barber->id)->delete();
        return redirect('/dashboard/barbers');
    }

    public function recycle(){
        return view('dashboard.barber.recycle', [
            'barbers' => Barber::onlyTrashed()->paginate(10)
        ]);
    }

    public function restore($barberID){
        Barber::onlyTrashed()->find($barberID)->restore();
        return redirect('/dashboard/barbers/recycle');
    }

    public function delete($barberID){
        Barber::onlyTrashed()->find($barberID)->forceDelete();
        return redirect('/dashboard/barbers/recycle');
    }
}
