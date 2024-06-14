<?php

namespace Database\Seeders;

use App\Models\Criteria;
use App\Models\SubCriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kriteriaNilaiRaport = Criteria::where('name', 'Nilai Raport Kelas X')->first();
        $kriteriaNilaiAkademik = Criteria::where('name', 'Nilai Tes Akademik')->first();
        $kriteriaNilaiPraktek = Criteria::where('name', 'Nilai Tes Praktek')->first();

        SubCriteria::create(['criteria_id' => $kriteriaNilaiRaport->id, 'name' => 'Nilai Raport IPA', 'bobot' => 0.3]);
        SubCriteria::create(['criteria_id' => $kriteriaNilaiRaport->id, 'name' => 'Nilai Raport IPS', 'bobot' => 0.3]);
        SubCriteria::create(['criteria_id' => $kriteriaNilaiRaport->id, 'name' => 'Nilai Raport Agama', 'bobot' => 0.4]);

        SubCriteria::create(['criteria_id' => $kriteriaNilaiAkademik->id, 'name' => 'Nilai Tes Akademik IPA', 'bobot' => 0.25]);
        SubCriteria::create(['criteria_id' => $kriteriaNilaiAkademik->id, 'name' => 'Nilai Tes Akademik IPS', 'bobot' => 0.25]);
        SubCriteria::create(['criteria_id' => $kriteriaNilaiAkademik->id, 'name' => 'Nilai Tes Akademik Agama', 'bobot' => 0.15]);
        SubCriteria::create(['criteria_id' => $kriteriaNilaiAkademik->id, 'name' => 'Nilai Tes Akademik B. Inggris', 'bobot' => 0.15]);
        SubCriteria::create(['criteria_id' => $kriteriaNilaiAkademik->id, 'name' => 'Nilai Tes Akademik B. Indonesia', 'bobot' => 0.2]);
        
        SubCriteria::create(['criteria_id' => $kriteriaNilaiPraktek->id, 'name' => 'Nilai Praktek Sholat', 'bobot' => 0.4]);
        SubCriteria::create(['criteria_id' => $kriteriaNilaiPraktek->id, 'name' => 'Nilai Praktek Baca Quran', 'bobot' => 0.3]);
        SubCriteria::create(['criteria_id' => $kriteriaNilaiPraktek->id, 'name' => 'Nilai Praktek Hafalan Surat Pendek', 'bobot' => 0.3]);
    }
}