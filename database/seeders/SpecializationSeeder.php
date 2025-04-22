<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specializations = [
            'Dokter Umum',
            'Dokter Gigi',
            'Spesialis Anak',
            'Spesialis Kandungan',
            'Spesialis Bedah',
            'Spesialis Jantung',
            'Spesialis Kulit',
            'Psikiater',
        ];

        foreach ($specializations as $name) {
            Specialization::firstOrCreate(['name' => $name]);
        }
    }
}
