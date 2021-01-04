<?php
namespace App\Repositories;

use App\Contracts\CardContract;
use Illuminate\Support\Facades\Validator;

class CardRepository implements CardContract
{
    public function cardValidation(array $input)
    {
        return Validator::make($input, [
            'player' => 'required|integer|min:0'
        ]);

    }
}
