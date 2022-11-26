<?php

namespace Database\Seeders;

use App\Models\Bidang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BidangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bidang::create(
            [
                'nama' => 'Jaringan',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore ab iste obcaecati, eius ipsum rem culpa odio quam consequuntur nobis quis quos corrupti consequatur doloremque! Nemo voluptate iure beatae eligendi.',
        ]);

        Bidang::create(
            [
                'nama' => 'Multimedia',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore ab iste obcaecati, eius ipsum rem culpa odio quam consequuntur nobis quis quos corrupti consequatur doloremque! Nemo voluptate iure beatae eligendi.',
        ]);

        Bidang::create(
            [
                'nama' => 'Web Developer',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore ab iste obcaecati, eius ipsum rem culpa odio quam consequuntur nobis quis quos corrupti consequatur doloremque! Nemo voluptate iure beatae eligendi.',
        ]);

        Bidang::create(
            [
                'nama' => 'Software Developer',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore ab iste obcaecati, eius ipsum rem culpa odio quam consequuntur nobis quis quos corrupti consequatur doloremque! Nemo voluptate iure beatae eligendi.',
        ]);

        Bidang::create(
            [
                'nama' => 'UI/UX Designer',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore ab iste obcaecati, eius ipsum rem culpa odio quam consequuntur nobis quis quos corrupti consequatur doloremque! Nemo voluptate iure beatae eligendi.',
        ]);

        Bidang::create(
            [
                'nama' => 'Database Administrator',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore ab iste obcaecati, eius ipsum rem culpa odio quam consequuntur nobis quis quos corrupti consequatur doloremque! Nemo voluptate iure beatae eligendi.',
        ]);
    }
}
