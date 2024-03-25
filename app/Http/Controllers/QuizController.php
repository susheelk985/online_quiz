<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class QuizController extends Controller
{
    public function category_questions(Request $request)
    {
        // return $request->id;
        $data = Http::get('https://the-trivia-api.com/api/questions?categories='.$request->id.'&limit=5');
        $data = json_decode($data, TRUE);
        // return $data[0];
        foreach($data as $key => $row)
        {
            $options = array();
            array_push($options,$row['correctAnswer']);
            // return $options;
            $incorrect_ans = $row['incorrectAnswers'];
            foreach($incorrect_ans as $ins_data)
            {
                array_push($options,$ins_data);
            }
            shuffle($options);

            $questions []= array(
                'numb' => $key+1,
               'question' => $row['question'],
               'answer'  => $row['correctAnswer'],
               'options' => $options

            );
        }
        // $questions = json_encode($questions);
        // return $questions;
        return view('quiz.index',compact('questions'));
    }

}
