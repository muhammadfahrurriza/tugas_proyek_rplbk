<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Paket;
use App\Models\Invoice;
use Illuminate\Http\Request;

class FrontpageController extends Controller
{
    public function index()
    {
        return view('frontpage.pages.index');
    }

    public function product(Request $request)
    {
    $query = DB::table('pakets')
        ->when($request->input('nama_paket'), function ($query) use ($request) {
            return $query->where('nama_paket', $request->input('nama_paket'));
        })
        ->when($request->input('keterangan_paket'), function ($query) use ($request) {
            return $query->where('keterangan_paket', $request->input('keterangan_paket'));
        })
        ->when($request->input('search'), function ($query) use ($request) {
            $searchTerm = $request->input('search');
            return $query->where('nama_paket', 'LIKE', "%$searchTerm%")
                ->orWhere('keterangan_paket', 'LIKE', "%$searchTerm%");
        })
        ->latest()
        ->paginate(8)
        ->withQueryString();

    return view("frontpage.pages.product", ['pakets' => $query]);
    }

    public function showProduct(Request $request)
    {
        $pakets = DB::table('pakets');

        if ($request->keyword != '') {
            $pakets = $pakets->where('keterangan_paket', 'LIKE', '%' . $request->keyword . '%');
        }

        $pakets = $pakets->get();

        return response()->json([
            'pakets' => $pakets
        ]);
    }

    public function beliProduk(Request $request)
    {
        $validatedData = $request->validate([
            'nama_paket' => ['required'],
            'keterangan_paket' => ['required'],
            'nama_pelanggan' => ['required'],
            'no_pelanggan' => ['required'],
            'nama_barber' => ['required', 'max:255'],
            'jam_potong' => ['required', 'max:255'],
            'harga' => ['required']
        ]);

        DB::table('invoices')->insert($validatedData);
        return redirect('/');
    }

    public function about()
    {
        return view('frontpage.pages.about');
    }
}
