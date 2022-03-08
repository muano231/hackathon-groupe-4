<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Product;
use App\Models\Question;
use App\Models\Session;
use App\Models\Study;
use Illuminate\Database\Seeder;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $product = Product::create([
            'name' => 'Product 1',
        ]);
       $study = Study::create([
           'product_id' => $product->id,
        ]);

        $session = Session::create([
           'study_id' => $study->id,
            'description' => 'Session 1',
            'availability_start' => '2019-01-01',
            'availability_end' => '2022-12-31',
        ]);
        $session2 = Session::create([
            'study_id' => $study->id,
            'description' => 'Session 2',
            'availability_start' => '2019-01-01',
            'availability_end' => '2022-12-31',
        ]);

        $question = Question::create([
            'question' => 'What is the capital of India?',
            'session_id' => $session->id,
        ]);
        Answer::create([
            'answer' => 'Delhi',
            'value' => 1,
            'question_id' => $question->id,
        ]);
        Answer::create([
            'answer' => 'Mumbai',
            'value' => 2,
            'question_id' => $question->id,
        ]);
        Answer::create([
            'answer' => 'Chennai',
            'value' => 3,
            'question_id' => $question->id,
        ]);

    }
}
