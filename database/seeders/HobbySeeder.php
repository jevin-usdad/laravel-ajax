<?php

namespace Database\Seeders;

use App\Models\Hobby;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HobbySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hobbies = [
            'Programming',
            'Games',
            'Reading',
            'Photography',
            'Music',
            'Football'
        ];


        foreach ($hobbies as $hobby) {
            Hobby::firstOrCreate([
                'name' => $hobby
            ]);
        }
    }
}
