<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Reservasi;

class DashboardFakturController extends Controller
{

    public function index()
    {
        return view('dashboard.faktur.index', [
            'fakturs' => Reservasi::where('isApprove', 1)->get()
        ]);
    }

    public function destroy(Reservasi $reservasi)
    {
        DB::table('reservasis')->where('id', $reservasi->id)->delete();
        return redirect('/dashboard/fakturs');
    }

    public function recycle()
    {
        $fakturs = DB::table('reservasis')->onlyTrashed()->where('isApprove', 1)->get();
        return view('dashboard.faktur.recycle', compact('fakturs'));
    }

    public function restore($reservasiId)
    {
        DB::table('reservasis')->onlyTrashed()->where('isApprove', 1)->where('id', $reservasiId)->restore();
        return redirect('/dashboard/fakturs/recycle');
    }

    public function delete($reservasiId)
    {
        DB::table('reservasis')->onlyTrashed()->where('isApprove', 1)->where('id', $reservasiId)->forceDelete();
        return redirect('/dashboard/fakturs/recycle');
    }
}
