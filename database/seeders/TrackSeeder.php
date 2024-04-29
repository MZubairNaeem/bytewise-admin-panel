<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrackSeeder extends Seeder
{
    public function run()
    {
        DB::table('tracks')->insert([
            ['name' => 'Laravel'],
            ['name' => 'UI/UX'],
            ['name' => 'Django'],
            ['name' => 'Flask'],
            ['name' => 'Frontend'],
            ['name' => 'MERN'],
            ['name' => 'Flutter'],
            ['name' => 'Data Engg'],
            ['name' => 'Cyber Security'],
            ['name' => 'C# .NET'],
            ['name' => 'Data Science'],
            ['name' => 'NLP'],
            ['name' => 'AWS'],
            ['name' => 'Machine Learning/Deep Learning'],
            ['name' => 'DevOps'],
            ['name' => 'Product Management'],
            ['name' => 'Game Dev'],
            ['name' => 'SEO'],
            ['name' => 'React/Next'],
            ['name' => 'Android(Kotlin)'],
            ['name' => 'Project Management'],
            ['name' => 'Azure'],
            ['name' => 'iOS Dev'],
            ['name' => 'Blockchain'],
            ['name' => 'Personal & Profession Dev'],
        ]);
    }
}
