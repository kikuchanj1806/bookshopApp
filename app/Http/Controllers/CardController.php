<?php

namespace App\Http\Controllers;

class CardController extends Controller
{
    public function cardAction()
    {
        return view('Website.card');
    }

    public function carddoneAction()
    {
        return view('Website.carddone');
    }
}
