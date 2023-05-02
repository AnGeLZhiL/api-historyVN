<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Tests;
use Illuminate\Http\Request;

class TestsController extends Controller
{
    /**
     * Получение всех тестов определенной категории по ее id
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */

    public function getTests($id){

        /*
         * Поиск тестов по id категории
         */

        $tests = Tests::where('id_test', $id)->get();

        /*
         * Возвращение списка тестов определенной категории
         */

        return response()
            ->json($tests)
            ->setStatusCode(200, 'Tests list');
    }

//    public function testsObject(){
//        $tests = Tests::with('objects')->get();
//
//        return response()
//            ->json($tests)
//            ->setStatusCode(200, 'Tests list');
//    }

    /**
     * Получение информации о выбранном тесте
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */

    public function getTest($id){

        /*
         * Поиск теста по его id
         */

        $test = Tests::where('id_test', $id)->get();

        /*
         * Возвращение информации о найденном тесте
         */

        return response()
            ->json($test)
            ->setStatusCode(200, 'Test Information');
    }
}
