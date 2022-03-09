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

        $sessions = [];

        $sessions[] = Session::create([
           'study_id' => $study->id,
            'description' => 'Session 1',
            'availability_start' => '2019-01-01',
            'availability_end' => '2022-12-31',
        ]);
        $sessions[] = Session::create([
            'study_id' => $study->id,
            'description' => 'Session 2',
            'availability_start' => '2019-01-01',
            'availability_end' => '2022-12-31',
        ]);
        $sessions[] = Session::create([
            'study_id' => $study->id,
            'description' => 'Session 3',
            'availability_start' => '2019-01-01',
            'availability_end' => '2022-12-31',
        ]);
        $sessions[] = Session::create([
            'study_id' => $study->id,
            'description' => 'Session 3',
            'availability_start' => '2019-01-01',
            'availability_end' => '2022-12-31',
        ]);

        foreach ($sessions as $session){
            for ($i = 1; $i <= 5; $i++){
                $question = Question::create([
                    'session_id' => $session->id,
                    'question' => 'Question '.$i,
                ]);
                Answer::create([
                    'answer' => 'Lyon',
                    'value' => 1,
                    'question_id' => $question->id,
                ]);
                Answer::create([
                    'answer' => 'Paris',
                    'value' => 2,
                    'question_id' => $question->id,
                ]);
                Answer::create([
                    'answer' => 'Lyon',
                    'value' => 3,
                    'question_id' => $question->id,
                ]);
            }
        }


    }
}
