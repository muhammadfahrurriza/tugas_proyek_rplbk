<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Paket;
use App\Models\Toko;
use App\Models\Admin;
use App\Models\Barber;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

         Toko::factory()->create([
            'nama_toko' => 'Barbershop_kelompok1',
            'alamat_toko' => 'jl Banjarsari selatan no 1',
            'nohp_toko' => '081183629735'
        ]);

        Admin::factory()->create([
            'nama_admin' => 'Muhammad Fahrur Riza',
            'nohp_admin' => '08123456789',
            'password' => bcrypt('12345')
        ]);

        Admin::factory()->create([
            'nama_admin' => 'Rizaza',
            'nohp_admin' => '123456789',
            'password' => bcrypt('12345')
        ]);

        Paket::factory()->create([
            'nama_paket' => 'Paket Dasar',
            'keterangan_paket' => 'Potong rambut standar dengan gaya pilihan, cuci rambut, dan pengeringan.',
            'harga' => '50.000'
        ]);

        Paket::factory()->create([
            'nama_paket' => 'Paket Premium',
            'keterangan_paket' => 'Potong rambut dengan gaya pilihan, cuci rambut, pengeringan, pijat kepala singkat, dan styling rambut.',
            'harga' => '100.000'
        ]);

        Paket::factory()->create([
            'nama_paket' => 'Paket Deluxe',
            'keterangan_paket' => 'Potong rambut dengan gaya pilihan, cuci rambut, pengeringan, pijat kepala dan leher, styling rambut, dan perawatan kulit kepala.',
            'harga' => '150.000'
        ]);

        Paket::factory()->create([
            'nama_paket' => 'Paket Grooming',
            'keterangan_paket' => 'Potong rambut, cuci rambut, pengeringan, pijat kepala dan leher, perawatan wajah (facial), serta styling rambut.',
            'harga' => '200.000'
        ]);

        Paket::factory()->create([
            'nama_paket' => 'Paket Anak',
            'keterangan_paket' => 'Potong rambut anak dengan gaya pilihan, cuci rambut, dan pengeringan.',
            'harga' => '40.000'
        ]);

        Paket::factory()->create([
            'nama_paket' => 'Paket Clipper',
            'keterangan_paket' => 'Potong rambut menggunakan clipper dengan gaya buzz cut, cuci rambut, dan pengeringan.',
            'harga' => '45.000'
        ]);

        Paket::factory()->create([
            'nama_paket' => 'Paket Luxury',
            'keterangan_paket' => 'Potong rambut dengan gaya pilihan, cuci rambut, pengeringan, pijat kepala dan leher, styling rambut, perawatan wajah, perawatan kulit kepala, serta minuman spesial (kopi/teh).',
            'harga' => '300.000'
        ]);

        Paket::factory()->create([
            'nama_paket' => 'Paket Klasik',
            'keterangan_paket' => 'Potong rambut dengan gaya klasik, cuci rambut, pengeringan, dan styling rambut.',
            'harga' => '70.000'
        ]);

         // Menggunakan factory untuk membuat data barber
         Barber::factory()->create([
            'nama_barber' => 'Aya',
            'nohp_barber' => '085329983009',
            'umur' => 21
        ]);

        Barber::factory()->create([
            'nama_barber' => 'Azzam',
            'nohp_barber' => '087892444508',
            'umur' => 22
        ]);

        Barber::factory()->create([
            'nama_barber' => 'Vivian',
            'nohp_barber' => '082261908382',
            'umur' => 20
        ]);

        Barber::factory()->create([
            'nama_barber' => 'Diana',
            'nohp_barber' => '08161149846',
            'umur' => 20
        ]);

        Barber::factory()->create([
            'nama_barber' => 'Fahrur',
            'nohp_barber' => '081295384632',
            'umur' => 20
        ]);

    }
}
