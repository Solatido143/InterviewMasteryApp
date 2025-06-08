<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                'question_text' => 'What does DNS stand for?',
                'option_a' => 'Dynamic Network System',
                'option_b' => 'Domain Name System',
                'option_c' => 'Digital Network Service',
                'option_d' => 'Data Name Server',
                'correct_option' => 'B',
            ],
            [
                'question_text' => 'Which layer of the OSI model does the IP protocol belong to?',
                'option_a' => 'Transport',
                'option_b' => 'Network',
                'option_c' => 'Data Link',
                'option_d' => 'Application',
                'correct_option' => 'B',
            ],
        ];

        foreach ($questions as $question) {
            Question::create($question);
        }
    }
}
