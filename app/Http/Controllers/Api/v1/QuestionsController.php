<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Answers;
use App\Models\Questions;
use App\Models\Tests;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    /**
     * Получение списка вопросов в определенном тесте по его id
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */

    public function getQuestions($id){

        /*
         * Поиск вопросов, связанных с определнным тестом
         */

        $test = Tests::with('questions')->findOrFail($id);

        /*
         * Возвращение списка вопросов теста
         */

        return response()
            ->json($test->questions)
            ->setStatusCode(200, 'Questions list');
    }

    /**
     *  Получение списка ответов по определенному id вопроса
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */

    public function getAnswers($id){

        /*
         * Поиск списка ответов на вопрос
         */

        $answers = Questions::with('answers')->findOrFail($id);

        /*
         * Возвращение списка ответов на вопрос
         */

        return response()
            ->json($answers->answers)
            ->setStatusCode(200, 'Tests list');
    }
}
