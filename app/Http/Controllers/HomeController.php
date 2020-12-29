<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;
use App\Contracts\CardContract;

class HomeController extends Controller
{
    protected $cardRepository;

    public function __construct(CardContract $cardRepository)
    {
        $this->cardRepository = $cardRepository;
    }

    /**
     * Homepage
     */
    public function index()
    {
        return view('index');
    }

    /**
     * returns cards drawn
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function draw(Request $request)
    {
        $validator =  $this->cardRepository->cardValidation($request->all());

        if($validator->fails()) {
            return response()->json([
                'error'         =>  true,
                'response_code' => 400,
                'message'       => 'Input value does not exist or value is invalid',
            ]);
        }

        $cardsArr = Config::get('constants.cards');
        $draw = [];

        // shuffle the array then push the item into an array as long as the loop doesnt exceed the no of players
        // if no of players > 52, there will be no error, but it will draw only 52 cards
        shuffle($cardsArr);
        $element = 0;
        while($element < $request->player){
            array_push($draw, array_pop($cardsArr));
            $element++;
        }

        return response()->json([
            'error'         =>  false,
            'response_code' => 200,
            'message'       => 'value submitted successfully',
            'data'          =>  $draw
        ]);
    }
}
