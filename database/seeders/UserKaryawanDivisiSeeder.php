<?php

namespace Database\Seeders;

use App\Models\Divisi;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserKaryawanDivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sim = Divisi::create([
            'nama' => 'sim',
            'active' => 1,
        ]);
        $umum = Divisi::create([
            'nama' => 'umum',
            'active' => 1,
        ]);
        $kepegawaian = Divisi::create([
            'nama' => 'kepegawaian',
            'active' => 1,
        ]);

        $staff_sim = User::factory()->create([
            'nama' => 'staff_sim',
            'email' => 'staff_sim@example.com',
        ]);

        $kabag_sim = User::factory()->create([
            'nama' => 'kabag_sim',
            'email' => 'kabag_sim@example.com',
        ]);

        $kabag_sim->karyawan()->create([
            'nama' => $kabag_sim->nama,
            'divisi_id' => $sim->id,
            'nama_divisi' => $sim->nama,
            'status_karyawan' => 'tetap',
            'tanggal_masuk' => now(),
            'jenis_kelamin' => 'L'
        ]);

        $kasubag_umum = User::factory()->create([
            'nama' => 'kasubag_umum',
            'email' => 'kasubag_umum@example.com',
        ]);

        $kasubag_umum->karyawan()->create([
            'nama' => $kasubag_umum->nama,
            'divisi_id' => $sim->id,
            'nama_divisi' => $sim->nama,
            'status_karyawan' => 'tetap',
            'tanggal_masuk' => now(),
            'jenis_kelamin' => 'L'
        ]);

        $staff_sim->atasan()->attach([
            $kabag_sim->id => ['level' => 1],
            $kasubag_umum->id => ['level' => 2]
        ]);
        
        $staff_sim->karyawan()->create([
            'nama' => $staff_sim->nama,
            'divisi_id' => $sim->id,
            'nama_divisi' => $sim->nama,
            'status_karyawan' => 'tetap',
            'tanggal_masuk' => now(),
            'jenis_kelamin' => 'L'
        ]);
    }
}
