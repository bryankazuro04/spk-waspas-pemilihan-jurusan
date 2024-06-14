<?php

namespace Database\Seeders;

use App\Models\Criteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Criteria::create(['name' => 'Nilai Raport Kelas X', 'bobot' => 0.4]);
        Criteria::create(['name' => 'Nilai Tes Akademik', 'bobot' => 0.4]);
        Criteria::create(['name' => 'Nilai Tes Praktek', 'bobot' => 0.2]);
    }
}