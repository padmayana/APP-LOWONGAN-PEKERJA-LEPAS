<?php

namespace Database\Seeders;

use App\Models\Daerah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DaerahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Daerah::create(
            [
                'nama' => 'Badung',
        ]);
        Daerah::create(
            [
                'nama' => 'Tabanan',
        ]);
        Daerah::create(
            [
                'nama' => 'Buleleng',
        ]);
        Daerah::create(
            [
                'nama' => 'Karangasem',
        ]);
        Daerah::create(
            [
                'nama' => 'Gianyar',
        ]);
        Daerah::create(
            [
                'nama' => 'Denpasar',
        ]);
        Daerah::create(
            [
                'nama' => 'Jembrana',
        ]);
        Daerah::create(
            [
                'nama' => 'Klungkung',
        ]);
    }
}
