<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([
            ['question' => 'Why do you want to join Bytewise Limited Fellowship program?'],
            ['question' => 'Why should we choose you for this fellowship? What perspective or experience will you bring to the fellowship to strengthen our community?'],
            ['question' => 'Anything else we should know about you?'],
            ['question' => 'Which Fellowship are you interested in?'],
            ['question' => 'Any Question For Us?'],
        ]);
    }
}
