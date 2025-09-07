<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Warga;

class WargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $wargas = [
            ['blok' => 'A01', 'nama' => 'B. Lis', 'jadwal_ronda' => null],
            ['blok' => 'A03', 'nama' => '-', 'jadwal_ronda' => null],
            ['blok' => 'A04', 'nama' => 'B. Ribut', 'jadwal_ronda' => null],
            ['blok' => 'A05', 'nama' => '-', 'jadwal_ronda' => null],
            ['blok' => 'A06', 'nama' => 'Koperasi', 'jadwal_ronda' => null],
            ['blok' => 'B01', 'nama' => 'P. Bambang', 'jadwal_ronda' => 'sunday'],
            ['blok' => 'B02', 'nama' => 'Kos', 'jadwal_ronda' => null],
            ['blok' => 'B03', 'nama' => 'P. Rhandy', 'jadwal_ronda' => 'tuesday'],
            ['blok' => 'B04', 'nama' => 'P. Miftah', 'jadwal_ronda' => null],
            ['blok' => 'B05', 'nama' => 'P. Sutrisno', 'jadwal_ronda' => 'sunday'],
            ['blok' => 'B06', 'nama' => 'P. Subahan', 'jadwal_ronda' => 'saturday'],
            ['blok' => 'B07', 'nama' => '-', 'jadwal_ronda' => null],
            ['blok' => 'B08', 'nama' => 'P. Saiful', 'jadwal_ronda' => 'monday'],
            ['blok' => 'B09', 'nama' => 'P. Faris', 'jadwal_ronda' => 'monday'],
            ['blok' => 'B10', 'nama' => 'P. Anton', 'jadwal_ronda' => 'thursday'],
            ['blok' => 'B11', 'nama' => 'Kos', 'jadwal_ronda' => 'monday'],
            ['blok' => 'B12', 'nama' => 'P. Andre', 'jadwal_ronda' => 'wednesday'],
            ['blok' => 'B13', 'nama' => 'P. Wahyu', 'jadwal_ronda' => null],
            ['blok' => 'C01', 'nama' => '-', 'jadwal_ronda' => null],
            ['blok' => 'C03', 'nama' => 'P. Andi', 'jadwal_ronda' => 'tuesday'],
            ['blok' => 'C05', 'nama' => 'P. Mawarid', 'jadwal_ronda' => 'tuesday'],
            ['blok' => 'C06', 'nama' => 'P. Ipunk', 'jadwal_ronda' => 'wednesday'],
            ['blok' => 'C07', 'nama' => '-', 'jadwal_ronda' => null],
            ['blok' => 'C08', 'nama' => 'P. Susilo', 'jadwal_ronda' => 'thursday'],
            ['blok' => 'C09', 'nama' => 'Kos', 'jadwal_ronda' => null],
            ['blok' => 'C10', 'nama' => 'P. Muhajir', 'jadwal_ronda' => 'friday'],
            ['blok' => 'C11', 'nama' => 'P. Qodir', 'jadwal_ronda' => 'wednesday'],
            ['blok' => 'C12', 'nama' => 'Kos', 'jadwal_ronda' => null],
            ['blok' => 'C13', 'nama' => '-', 'jadwal_ronda' => null],
            ['blok' => 'D01', 'nama' => '-', 'jadwal_ronda' => null],
            ['blok' => 'D02', 'nama' => 'P. Pras', 'jadwal_ronda' => 'sunday'],
            ['blok' => 'D03', 'nama' => '-', 'jadwal_ronda' => null],
            ['blok' => 'D04', 'nama' => 'P. Rahmat', 'jadwal_ronda' => 'friday'],
            ['blok' => 'D05', 'nama' => 'P. Eko', 'jadwal_ronda' => 'saturday'],
            ['blok' => 'D06', 'nama' => 'P. Rohim', 'jadwal_ronda' => 'thursday'],
            ['blok' => 'D07', 'nama' => 'P. Alvin', 'jadwal_ronda' => 'monday'],
            ['blok' => 'D08', 'nama' => 'Kos', 'jadwal_ronda' => 'sunday'],
            ['blok' => 'D09', 'nama' => 'P. Imam', 'jadwal_ronda' => 'sunday'],
            ['blok' => 'D10', 'nama' => 'B. Desi', 'jadwal_ronda' => 'sunday'],
            ['blok' => 'D11', 'nama' => 'P. Rony', 'jadwal_ronda' => 'sunday'],
            ['blok' => 'D12', 'nama' => 'P. Herman', 'jadwal_ronda' => 'sunday'],
            ['blok' => 'D13', 'nama' => 'P. Oki', 'jadwal_ronda' => 'sunday'],
            ['blok' => 'D14', 'nama' => 'P. Ari', 'jadwal_ronda' => 'sunday'],
            ['blok' => 'E01', 'nama' => '-', 'jadwal_ronda' => null],
            ['blok' => 'E02', 'nama' => 'P. Irsad', 'jadwal_ronda' => 'sunday'],
            ['blok' => 'E03', 'nama' => '-', 'jadwal_ronda' => null],
            ['blok' => 'E04', 'nama' => 'P. Riko', 'jadwal_ronda' => 'sunday'],
            ['blok' => 'E05', 'nama' => '-', 'jadwal_ronda' => null],
            ['blok' => 'E06', 'nama' => '-', 'jadwal_ronda' => null],
            ['blok' => 'E07', 'nama' => '-', 'jadwal_ronda' => null],
            ['blok' => 'E08', 'nama' => 'P. Didik', 'jadwal_ronda' => 'sunday'],
            ['blok' => 'E10', 'nama' => 'P. Kris', 'jadwal_ronda' => 'sunday'],
            ['blok' => 'E11', 'nama' => 'P. Hasan', 'jadwal_ronda' => 'sunday'],
            ['blok' => 'E12', 'nama' => 'P. Wawan', 'jadwal_ronda' => 'sunday'],
            ['blok' => 'E13', 'nama' => '-', 'jadwal_ronda' => null],  
        ];

        foreach ($wargas as $warga) {
            Warga::create($warga);
        }
    }
}