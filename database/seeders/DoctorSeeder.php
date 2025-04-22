<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Specialization;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil ID specialization secara langsung
        $umum = Specialization::where('name', 'Dokter Umum')->first()->id ?? null;
        $gigi = Specialization::where('name', 'Dokter Gigi')->first()->id ?? null;
        $anak = Specialization::where('name', 'Spesialis Anak')->first()->id ?? null;

        Doctor::create([
            'name' => 'dr. Andi Wijaya',
            'specialization_id' => '1',
            'available_days' => json_encode(['Monday', 'Wednesday', 'Friday']),
            'available_time_start' => '09:00',
            'available_time_end' => '12:00',
        ]);

        Doctor::create([
            'name' => 'dr. Siti Hasanah',
            'specialization_id' => '2',
            'available_days' => json_encode(['Tuesday', 'Thursday']),
            'available_time_start' => '10:00',
            'available_time_end' => '13:00',
        ]);

        Doctor::create([
            'name' => 'dr. Budi Santoso',
            'specialization_id' => '3',
            'available_days' => json_encode(['Monday', 'Tuesday', 'Thursday']),
            'available_time_start' => '08:00',
            'available_time_end' => '11:00',
        ]);
    }
}
